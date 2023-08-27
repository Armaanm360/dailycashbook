<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailVerify;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserRegistrationController extends Controller
{

    function sendEmailCode(Request $request)
    {


        $status_count =   User::where('email', $request->user)->where('verification_status', true)->first();

        if ($status_count) {
            return response()->json(['success' => true, 'message' => 'You Have Already Registerd']);
        } else {
            $code = mt_rand(100000, 999999);


            $details = [
                'title' => 'Your Email Verification Code Is' . ' ' . $code,
                'body' => 'Thanks For Your Time',
            ];

            \Mail::to($request->user)->send(new \App\Mail\VerifiedEmailTester($details));
            $email_verify = new EmailVerify();
            $email_verify->verifying_email = $request->user;
            $email_verify->verifying_code = $code;
            $email_verify->save();
            return response()->json(['success' => true, 'message' => 'We Have A sent a verification Code']);
        }
    }


    public function resenOtp(Request $request)
    {
        $status_count =   User::where('email', $request->user)->where('verification_status', true)->first();

        if ($status_count) {
            return response()->json(['success' => true, 'message' => 'You Have Already Registerd']);
        } else {

            $status = EmailVerify::where('verifying_email', $request->user)->first();


            $code = mt_rand(100000, 999999);




            if ($status) {

                $details = [
                    'title' => 'Your Email Verification Code Is' . ' ' . $code,
                    'body' => 'Thanks For Your Time',
                ];

                \Mail::to($request->user)->send(new \App\Mail\VerifiedEmailTester($details));
                $status = EmailVerify::where('verifying_email', $request->user)->update([
                    'verifying_code' => $code
                ]);
            }
            return response()->json(['success' => true, 'message' => 'We Have A sent a new verification Code']);
        }
    }


    function deletEmailWithCode($email)
    {

        $newuser = EmailVerify::where('verifying_email', $email);
        $newuser->delete();
    }


    function mailConfirmation(Request $request)
    {

        $getemail =  EmailVerify::where('verifying_email', $request->verifying_email)->first();

        $verify_code = $getemail['verifying_code'];



        if ($verify_code == $request->verifying_code) {
            return response()->json(['success' => true, 'message' => 'Thanks For Verification']);
        } else {
            return response()->json(['success' => false, 'message' => 'The Code You Have Entered Is Wrong']);
        }
    }



    public function userRegisterController(Request $request)
    {


        if ($request->ismethod('post')) {
            $data = $request->all();
            $rules = [
                'phone' => 'required|unique:users',
                'email' => 'required|unique:users',
                'name' => 'required',
                'password' => 'required|min:6'
            ];

            $validator =  Validator::make($data, $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->getMessages() as $key => $value) {
                    $a = array();
                    $a = [
                        'success' => false,
                        'message' => $value[0]
                    ];

                    return response()->json($a);
                    // die;
                }
            }

            function generateRandomString($length = 6)
            {
                $characters = 'abcdefghijklmnopqrstuvwxyz';
                $randomString = '';

                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }

                return $randomString;
            }








            $user = new User();
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->name = $data['name'];
            $user->phone = $data['phone'];
            $user->user_type = 'PERSONAL';
            $user->payment_status = 'UNPAID';
            $user->user_level = 'FREE';
            $user->unique_user_id = Str::substr($data['email'], 0, 3) . generateRandomString() . rand(9, 9999);
            $user->password = bcrypt($data['password']);
            $user->save();






            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                $user = User::where('email', $data['email'])->first();
                $access_token = $user->createToken($data['email'])->accessToken;
                User::where('email', $data['email'])->update(['access_token' => $access_token, 'verification_status' => true]);
                DB::table('email_verification_table')->where('verifying_email', $data['email'])->delete();
                $message = 'User Successfully Registerd';
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'user_id' => $user->id,
                    'name' =>  $user->name,
                    'unique_user_id' => $user->unique_user_id,
                    'user_type' => $user->user_type,
                    'phone' => $user->phone,
                    'payment_status' => $user->payment_status,
                    'access_token' => $access_token,

                ], 201);
            } else {
                $message = 'Oppss Something Went Wrong';
                return response()->json(['message' => $message, 'success' => false], 422);
            }
        }
    }

    public function userLoginController(Request $request)
    {
        if ($request->ismethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|exists:users',
                'password' => 'required'
            ];

            $validator =  Validator::make($data, $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->getMessages() as $key => $value) {
                    $a = array();
                    $a = [
                        'success' => false,
                        'message' => $value[0],
                    ];
                    return response()->json($a);
                }
            }
            // User::where('email', $data['email'])->update(['user_device_id' => $data['user_device_id']]);

            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                $user = User::where('email', $data['email'])->first();
                $access_token = $user->createToken($data['email'])->accessToken;
                User::where('email', $data['email'])->update(['access_token' => $access_token]);
                $message = 'User Successfully Login';
                return response()->json([
                    'success' => true,
                    'data' =>  $user,
                ], 201);
            } else {
                $message = 'Ooops Something Went Wrong';
                return response()->json(['message' => $message, 'success' => false], 422);
            }
        }
    }
}
