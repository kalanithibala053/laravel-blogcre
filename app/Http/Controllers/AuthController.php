<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public function login(Request $request) {



        $request-> validate([
            'username'=>'required|min:5',
            'password'=>'required|min:8'
        ]);
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('users')->where('username', $username)->first();

        if ($user && $user->password === $password) {
            
           $request -> session()->put('username',$username);

            return redirect('/vie');
        } else {
            
            return view('/login',['success' => 'Invalid user or password!']);

        }
    }
   



    public function forget(Request $request){
        $username=$request->input('username');
        $DOB=$request->input('DOB');
        $password= $request->input('password');
        $request-> validate([
            'username'=>'required|min:5',
            'password'=>'required|min:8',
            'DOB'=>'required'
            ]);
        $user = DB::table('users')->where('username', $username)->first();

        if ($user && $user->DOB === $DOB) {
            
            DB::table('users')
            ->where('username', '=', $username)
            ->update(['password'=>$password]);
            return view('/login',['username'=>$username]);
        } else {
            
            return view('/forgetpass',['success' => 'Invalid user or DOB!']);

        }
    }
    public function register(Request $request){
        $username= $request->input('username');
        $name= $request->input('name');
        $email= $request->input('email');
        $password= $request->input('password');
        $gender=$request->input('gender');
        $DOB=$request->input('DOB');
        $request-> validate([
            'username'=>'required|min:5|unique:users',
            'password'=>'required|min:8',
            'name'=>'required',
            'email'=>'required|email',
            'DOB'=>'required'
            ]);
        if($gender ==='m'){
        DB::table('users')->insert([
            'username' => $username,
            'name' => $name,
          'email' => $email,
          'gender'=>$gender,
          'password' => $password,
          'DOB'=>$DOB,
        'img' =>"male.png" ,]);
        return view('register', ['success' => 'Registration successful! You can now log in.']);
        }else if($gender ==='f'){
            DB::table('users')->insert([
                'username' => $username,
                'name' => $name,
              'email' => $email,
              'password' => $password,
              'gender'=>$gender,
            'img' =>"female.png" ,]);
            return view('register', ['success' => 'Registration successful! You can now log in.']);
        }
    
    
    }
    public function Profile(){
        $username=session('username');
        $data = DB::table('users')->where('username', $username)->get();
        return view('profile',['data' => $data]);
    }
    public function editprofile(Request $request){
        $id=$request->input('id');
        $username= $request->input('username');
        $name= $request->input('name');
        $email= $request->input('email');
        $mobile=$request->input('mob');
        $DOB=$request->input('DOB');
        if($username===session('username')){
            $request-> validate([
               
                'mob'=>'required|min:10',
                'name'=>'required',
                'email'=>'required|email',
                'DOB'=>'required',
                'DOB'=>'required'
                ]);
            
            $affected = DB::table('users')
                ->where('id', $id)
                ->update(['name'=>$name,'mobile'=>$mobile,'DOB'=>$DOB,'email'=>$email]);
           
            $data = DB::table('users')->where('username', $username)->get();
            return view('profile',['data'=>$data]);
            
        }else{
        $affected = DB::table('users')
            ->where('id', $id)
            ->update(['username' => $username,'name'=>$name,'mobile'=>$mobile,'DOB'=>$DOB,'email'=>$email]);
       
            $old=session('username');
            session()->pull('username');
            session()->put('username',$username);

            DB::table('Blogs')
            ->where('username', '=', $old)
            ->update(['username'=>$username]);
            $data = DB::table('users')->where('username', $username)->get();
        return view('profile',['data'=>$data]);
        
    }
    }
    

    public function changepass(Request $request){
        $username=$request->input('username');
        $currpass=$request->input('curr');
        $change=$request->input('change');
        
        DB::table('users')
        ->where('username','=',$username)
        ->update(['password'=>$change]);
        $data = DB::table('users')->where('username', $username)->get();
        return view('profile',['data'=>$data]);
        

    }

}
