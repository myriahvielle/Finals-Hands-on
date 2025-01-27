<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function UserPosts(User $user,Request $request){
        
    $userPosts = $user->userPosts()->latest()->paginate(10); // Add pagination if needed
    return view('users.post', ['userPosts' => $userPosts]);
    }
    public function showCreate(){
        return view('showCreate');
    }
    
    public function Read(Post $post,Request $request){
        return view('user.post',['post'=>$post]);
    }

    public function Create(Request $request){
        $data=$request->validate([
            
            'body'=>'required|string|max:255',
            'title'=>'required|string',
        ]);

        $data['user_id'] = Auth::id();

        Post::create($data);

        return redirect('/');
    }

    public function Edit(Post $post,Request $request){
        return view('posts.Update',['post'=>$post]);
    }

    public function Update(Post $post,Request $request){
        $data=$request->validate([
            'body'=>'required|string|max:255',
            'title'=>'required|string',
        ]);

        $data['user_id'] = Auth::id();

        $post->update($data);
        return redirect('/');
    }

    public function Delete(Post $post,Request $request){
        $post->delete();
        return redirect('/');
    }

    public function Home(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        $allUsers = User::orderBy('created_at', 'desc')->get();

        return view('Home',['posts'=>$posts,'allUsers'=>$allUsers]);
    }
    

}
