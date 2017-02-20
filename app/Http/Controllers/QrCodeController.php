<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use QrCode;
use App\User;
use DB;

class QrCodeController extends Controller
{
    public function generateCode(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'string' => 'required',
            'name' => 'required',
        ],
            [
                'string' => 'The title field is required',
                'name' => 'The name field is required',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        $qrcode = QrCode::format('png')->generate($data['string'], '../public/qrcodes/'.$data['name'].'.png');

        return $this->_result($qrcode);
    }

    public function scanCode(Request $request, $id)
    {
        $data = $request->all();

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

        $user = User::whereId($id)->first();

        $array = $data['code'];
        $newarray = explode(',', $array);

        foreach ($newarray as $value) {

            if (0 === strpos($value, 'pontos')){

                $number = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

                $userscore = User::whereId($id)->where('id', '=', $id)->select('score')->get();
                $userscore = $userscore->toArray();

                $userscore[0]['score'] += $number;

                $user->score = $userscore[0]['score'];
                $user->save();

                $this->checkLevel($userscore, $user);

            } else {

                $number = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

                $hasbadge = $user->badges()->where('id', $number)->exists();

                if($hasbadge != 1){
                    $user->badges()->attach($number);
                } else {
                    print_r('erro');
                }
            }
        }

        return $this->_result($user);
    }

//    public function checkTitle($userscore, $user)
//    {
//        $score = $userscore[0]['score'];
//
//        switch ($score) {
//            case ($score < 100):
//                $user->title_id = 1;
//                $user->save();
//                break;
//            case ($score < 200):
//                $user->title_id = 2;
//                $user->save();
//                break;
//            case ($score < 300):
//                $user->title_id = 3;
//                $user->save();
//                break;
//        }
//    }

    public function checkLevel($userscore, $user)
    {
        $score = $userscore[0]['score'];

        switch ($score) {
            case ($score < 1000):
                $user->level = 1;
                $user->title_id = 1;
                $user->save();
                break;
            case ($score < 3000):
                $user->level = 2;
                $user->title_id = 2;
                $user->save();
                break;
            case ($score < 6000):
                $user->level = 3;
                $user->title_id = 3;
                $user->save();
                break;
            case ($score < 10000):
                $user->level = 4;
                $user->title_id = 4;
                $user->save();
                break;
            case ($score < 15000):
                $user->level = 5;
                $user->title_id = 5;
                $user->save();
                break;
        }
    }
}
