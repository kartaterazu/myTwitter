<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Http\Model\Users as Users;

use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session('id') != NULL)
        {
            return redirect('/post');
        }

        return view('index');
    }

    /**
     * Validate login users
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
        ]);

        //insert new log into table
        $Users = Users::where('email',$request->email)->where('password',md5($request->password));

        if ($Users->count() <= 0)
        {
            return redirect('/')->with('failed','Email or Password is not match with our database');
        }
        else
        {
            $user = $Users->first();
            Session(['id'=>$user->id, 'name'=>$user->name]);

            return redirect('post')->with('success','Login successfully');
        }
    }

    /**
     * Register users data
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validate($request, [
                'email' => 'required|email|unique:users',
                'name' => 'required',
                'password' => 'required'
        ]);

        date_default_timezone_set('Asia/Jakarta');

        $users = new Users;

        $users->email       = $request->email;
        $users->name        = $request->name;
        $users->password    = md5($request->password);

        $users->save();

        Session(['id'=>$user->id, 'name'=>$user->name]);

        return redirect('/post')->with('success',"Congratulation!! You're registered successfully");
    }

    public function logout()
    {
        Session::flush();

        return redirect('/')->with('success',"You're logout successfully");
    }
}
