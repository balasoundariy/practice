<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $name = $request->name;
        $mobile_no = $request->mobile_no;
        $city = $request->city;
        $state = $request->state;
        $password = $request->password;
        $data = array(
            'name' => $name,
            'mobile_no' => $mobile_no,
            'city' => $city,
            'state' => $state ,
            'password' => $password,
        );
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required','min:10','max:10',Rule::unique('users')->where(function ($query) use ($request) {
                return $query->where('mobile_no',$request->mobile_no);
            })],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'password' => ['required', Password::min(5)->letters()->mixedCase()->numbers()->symbols()]
        ]);

        if ($validator->fails()) {
            return Response()->json([
                'status'=>201,
                'message'=>$validator->errors()->first()
            ]);
        }
        $user = new User();
        $user->name = $request->name;
        $user->mobile_no = $request->mobile_no;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::loginUsingId($user->id);
        return Response()->json([
            'status' => 200,
            'message'=>'User registered successfully!'
        ]);
    }

    public function login(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'mobile_no' => ['required'],
//            'password' => ['required']
//        ]);
//
//        if ($validator->fails()) {
//            return Response()->json([
//                'status'=>201,
//                'message'=>$validator->errors()->first()
//            ]);
//        }

        $user = User::where('mobile_no',$request->mobile)->first();
        if($user){
            if(Hash::check($request->sign_in_password, $user->password)){
                Auth::loginUsingId($user->id);
                return Response()->json([
                    'status' => 200,
                    'message'=>'Login Success!'
                ]);
            }else{
                return Response()->json([
                    'status' => 201,
                    'message'=>'Invalid Username or Password.'
                ]);
            }
        }else{
            return Response()->json(['status' => 202, 'message' => trans("User not found.")]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
