<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
// use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        //$result = Admin::where(['email'=>$email,'password'=>$password])->get();
        //echo "$password";
        $result = Admin::where(['email'=>$email])->first();
        if($result){
            if(($request->post('password'))==($result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error','Please enter valid password');
                return redirect('admin');
            }
            
        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    // to mask password
    // public function updatepassword()
    // {
    //     $r=Admin::find(1);
    //     $r->password=Hash::make('user');
    //     $r->save();
    //     return redirect('admin/auth');
    // }
}