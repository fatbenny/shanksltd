<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Star;

use App\Models\User;

use Auth;

use Hash;

class starsController extends Controller
{
    //
    public function index(){
        
        $date = date("Y-m-d");

        $Star = Star::where('Date',$date)->get();

        return view('daily',['Star'=>$Star,'date'=>$date]);
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
    public function login_in(Request $data)
    {
        try {
            $AccountID = $data->input('Input');
            $Password = $data->input('Password');

            $member = User::where('email',$AccountID)->first();

            if((Hash::check($Password, $member->password))){
                Auth::login($member);        
            }else{
                return ['status'=>0,'message'=>'密碼錯誤'];
            }
            
            return ['status'=>1,'message'=>'登入成功'];
        } catch (\Exception $e) {
            return ['status'=>0,'message'=>'登入失敗'];
        }
        
    }
    public function register_in(Request $data)
    {
        try {
            $name = $data->input('Name');
            $email = $data->input('Email');
            $password = $data->input('Password');


            if($name == ''){
                return ['status'=>0,'message'=>'請填寫姓名'];  
            }
            if($email == ''){
                return ['status'=>0,'message'=>'請填寫信箱'];  
            }
            if($password == ''){
                return ['status'=>0,'message'=>'請填寫密碼'];  
            }
            
            $member = User::where('Email',$email)->count();

            if($member > 0 ){
                return ['status'=>0,'message'=>'已經有人註冊'];        
            }else{
                User::create([
                    'name'=>$name,
                    'email'=>$email,
                    'password'=>bcrypt($password),
                ]);
            }
            
            return ['status'=>1,'message'=>'註冊成功'];
        } catch (\Exception $e) {
            return ['status'=>0,'message'=>'註冊失敗'];
        }
        
    }
}
