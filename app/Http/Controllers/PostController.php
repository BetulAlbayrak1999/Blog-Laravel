<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){
        //\Illuminate\Support\Facades\DB::listen(function ($query){
        // //\Illuminate\Support\Facades\Log::info('foo');
        // logger($query->sql, $query->bindings);
        //});

        return view('posts.index', [
            'posts'=>
                Post::filter(
                    request(['search', 'category', 'author']))
                    ->paginate(5)->withQueryString()
        ]);
    }

}

//index, show, create, store, edit, update, destroy
