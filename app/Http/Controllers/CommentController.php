<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;


class CommentController extends Controller
{
    // public function store(Post $post) 
    // {
    //     $comment = new Comment();
    //     $comment->post_id = $post->id;
    //     $comment->content = request()->get('content');
    //     $comment->save();

    //     return redirect()->route('blog.show', $post->id)->with('success', "Comment was posted!");
    // }

    public function addComment(Request $request, $id) {
        // Comment::create([
        //     'post_id' => $id,
        //     'content' => $request->content,
        // ]);
        
        $comment = new Comment;
        $comment->post_id = $id;
        $comment->content = $request->content;
        $comment->user_id = Auth::id();;
        $comment->save();

        return redirect()->route('blog.show', $id)->with('success', "Comment was posted!");
    }

    public function destory(Request $request) 
    {
        if(Auth::check()) {
            $comment = Comment::where('id', $request->id)
                ->where('user_id', Auth::user)->first();

            $comment->delete();
            
            return reponse()->json([
            'status' => 200,
            'message' => 'Comment Deleted Succesfully'
            ]);
            
        } else {
            
            return reponse()->json([
                'status' => 401,
                'message' => 'Login to delete this comment'
            ]);
        } 
    }
    
}
