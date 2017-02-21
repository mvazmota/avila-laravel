<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use QrCode;
use Auth;
use DB;
use App\User;
use App\Qrcodes;

class QrCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function generateCode(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'points' => 'required',
            'badge' => 'required',
        ],
            [
                'name' => 'The name field is required',
                'points' => 'The points field is required',
                'badge' => 'The badge field is required',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        $qrcode = QrCode::format('png')->size(200)->generate(\GuzzleHttp\json_encode($data), '../public/qrcodes/'.$data['name'].'.png');

        print_r(\GuzzleHttp\json_encode($data));

        $qrcodes = Qrcodes::create([
            'name' => $data['name'],
            'image' => '../public/qrcodes/'.$data['name'].'.png',
        ]);

        return $this->_result($qrcodes);
    }

    public function scanCode(Request $request)
    {
        $data = $request->all();

        $result = \GuzzleHttp\json_decode($data['code']);

        $validator = Validator::make($data, [
            'code' => 'required',
        ],
            [
                'code' => 'The code field is too long',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        $qrName = $result->name;
        $qrPoints = $result->points;
        $qrBadge = $result->badge;

        $user = Auth::user();
        $userID = Auth::user()->id;


        $qrcode = DB::table('qrcodes')->where('name', $qrName)->first();
        $qrcodeID = $qrcode->id;

        // Check if code was scanned by the user
        $hasqr = $user->qrcodes()->where('id', $qrcodeID)->exists();
        if($hasqr == 1){
            return $this->_result('User already scanned the code', 400, "NOK");
        }

        // Update Score
        $userscore = Auth::user()->score;
        $userscore += $qrPoints;
        $user->score = $userscore;
        $user->save();
        $this->checkLevel($userscore, $user);

        // Update Badges
        $hasbadge = $user->badges()->where('id', $qrBadge)->exists();
        if($hasbadge != 1){
            $user->badges()->attach($qrBadge);
        }

        // Add user to scanned QR code
        $user->qrcodes()->attach($qrcodeID);

        return $this->_result($user);
    }

    public function checkLevel($userscore, $user)
    {
        switch ($userscore) {
            case ($userscore < 1000):
                $user->level = 1;
                $user->title_id = 1;
                $user->save();
                break;
            case ($userscore < 3000):
                $user->level = 2;
                $user->title_id = 2;
                $user->save();
                break;
            case ($userscore < 6000):
                $user->level = 3;
                $user->title_id = 3;
                $user->save();
                break;
            case ($userscore < 10000):
                $user->level = 4;
                $user->title_id = 4;
                $user->save();
                break;
            case ($userscore < 15000):
                $user->level = 5;
                $user->title_id = 5;
                $user->save();
                break;
        }
    }
}
