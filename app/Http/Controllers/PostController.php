<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Http\Model\Post as Post;

use App\Http\Model\Users as Users;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session('id') == NULL)
        {
            return redirect('/')->with('failed','Please login to access twitter');
        }

        date_default_timezone_set('Asia/Jakarta');

        $post['posts'] = Post::orderBy('id','desc')->get();

        return view('post.index', $post);
    }

    /**
     * Store a new post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session('id') == NULL)
        {
            return redirect('/')->with('failed','Please login to access twitter');
        }

        date_default_timezone_set('Asia/Jakarta');

        $post           = new Post;
        $post->user_id  = Session('id');
        $post->post     = $request->posting;
        $post->save();

        $user = $post->getUser(Session('id'));
        $firstName = $post->firstName($user->name);

        $data = array(
                        'name' => $firstName,
                        'post' => $request->posting,
                        'time' => $post->created_at->diffForHumans(),
                        'image' => $user->image,
        );

        $return = json_encode($data);

        return $return;
    }
}
