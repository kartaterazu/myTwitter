<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Model\Users as Users;

class ProfileController extends Controller
{
    /**
     * Display a form input of the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session('id') == NULL)
        {
            return redirect('/')->with('failed','Please login to access twitter');
        }

        $users['user'] = Users::where('id',Session('id'))->first();

        return view('profile.index', $users);
    }

    /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'image' => 'dimensions:width=150,height=150'
        ]);

        $users          = Users::find(Session('id'));
        $users->name    = $request->name;
        $users->email   = $request->email;

        if(!empty($request->password))
        {
            $users->password = md5($request->password);
        }

        if($users->save())
        {
            return redirect('profile')->with('success','Your profile updated successfully.');
        }
        else
        {
            return redirect('profile')->with('failed','Failed to update your profile.');
        }
    }

    public function upload(Request $request)
    {
        $messages = [
            "image.dimensions" => "Image dimension should be 150x150",
            "image.mimes" => "Image type should be jpeg,png,jpg",
            "image.max" => "Maximum image size is 1MB"
        ];

        $this->validate($request, [
                'image' => 'required|image|dimensions:width=150,height=150|mimes:jpeg,png,jpg|max:1024'
        ],$messages);

        if($request->hasFile('image'))
        {
            $file           = $request->file('image');
            $users          = Users::find(Session('id'));
            $fileName       = $users->id.'-'.date('YmdHis').$file->getClientOriginalExtension();
            $users->image   = $fileName;
            $file->move(public_path('/img/profile'), $fileName);

            if($users->save())
            {
                return redirect('profile')->with('success','Your profile picture updated successfully.');
            }
            else
            {
                return redirect('profile')->with('failed','Failed to update your profile picture.');
            }
        }
    }
}
