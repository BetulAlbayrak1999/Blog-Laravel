<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index', [
            'posts'=>Post::paginate(50)
        ]);
    }

    public function create(){

        return view('admin.posts.create');
    }

    public function store(){
       $attributes = $this->validatePost(new Post);
       $attributes = array_merge($this->validatePost(), [
           'user_id' => auth()->id(),
           'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
       ]);
        Post::create($attributes);

        return redirect('/');
    }

    public function show(Post $post){
        return view('posts.show',[
            'post'=>$post
        ]);
    }

    public function edit(Post $post){
        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function update(Post $post){
        $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);
        return back()->with('success', 'Post Updated');
    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('success', 'Post Deleted');
    }

    protected function validatePost(?Post $post= null):array
    {
        $post ??=new Post();
        $attributes = request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'thumbnail'=>$post->exists ? ['image']: ['required|image'],
            'slug'=>['required',Rule::unique('posts','slug')->ignore($post)],
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories', 'id')],
            'published_at'=>'required'
        ]);
    }
}
