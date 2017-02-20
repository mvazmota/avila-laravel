<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use QrCode;

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
                'string' => 'The title field is too long',
                'name' => 'The name field is too long',

            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        $qrcode = QrCode::format('png')->generate($data['string'], '../public/qrcodes/'.$data['name'].'.png');

        return $this->_result($qrcode);
    }
}
