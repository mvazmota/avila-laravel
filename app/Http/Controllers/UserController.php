<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use phpDocumentor\Reflection\Types\Array_;
use Validator;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $users = User::get();

        if ($users->isEmpty()){
            return $this->_result('No users on the database', 404, "NOK");
        } else {
            return $this->_result($users);
        }
    }

    public function authUser()
    {
        $user = Auth::user();
        $badges =  Auth::user()->badges()->orderBy('id')->get();
        $result = [];

        foreach ($badges as $badge){
            $result[] = $badge;
        }

        $user['badges'] = $result;

        return $this->_result($user);
    }

    public function updateUser(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'max:20',
            'image' => 'image',
        ],
            [
                'name' => 'The title field is too long',
                'image' => 'The image field must be an image',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        if ( !empty($data['image']))
        {
            // generate filename from random string
            $path = $request->file('image')->hashName();
            // upload process
            $request->file('image')->move(public_path('images'), $path);

            $users = User::find($id);
            $users->name = $data['name'];
            $users->image = $path;
            $users->save();

            return $this->_result($users);

        } else {
            $users = User::whereId($id)->first();
            $users->name = $data['name'];
            $users->save();

            return $this->_result($users);
        }
    }


    public function getBadges($id)
    {
        $badges = User::find($id)->badges()->orderBy('id')->get();

        if ($badges->isEmpty()){
            return $this->_result('User doesn\'t have badges', 404, "NOK");
        } else {
            return $this->_result($badges);
        }
    }


}
