<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createComment($productId)
    {        
        return view('admin.comments.create', compact('productId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentFormRequest $request)
    {
        Comment::create($request->all());
        $product = Product::findOrFail($request->product_id);
        $comments = $product->comments()->with(['user', 'replies.user'])->paginate(config('app.records_per_page'));
        
        return compact('comments');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect(route('products.view_details', $comment->product_id))->with('success', __('comment_deleted'));
    }
}
