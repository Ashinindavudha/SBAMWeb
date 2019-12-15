<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\Post;
use App\Model\user\Tag;
use App\Model\user\Category;

class PostController extends Controller
{
    public function index()
    {
       $posts = Post::all();
       return view('admin.posts.show', compact('posts'));
    }
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.post', compact('tags', 'categories'));
    }
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect(route('post.index'));
        //return $request->all();
    }
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //$post = Post::where('id',$id)->get(); return $post;
        $post = Post::with('tags','categories')->where('id',$id)->first();//return $post;
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('tags', 'categories','post'));

        //return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        //return $request->all();
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));
        
        //return $request->all();
    }
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->back();
        //return $id;
    }
}
