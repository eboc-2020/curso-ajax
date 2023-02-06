<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\User;

class PostController extends Controller
{
    public function __construct()
    {
        //La forma de autenticarse se utilizar auth:api ya que se quiere autenticar para api's
        //para proteger todas las rutas excepto las que se ingresan acá
        $this->middleware('auth:api')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* dd(bcrypt('12345678')); */
        $posts=Post::included()
                    ->filter()
                    ->get();
        //el metodo collection transforma la coleccion en un json
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\Auth::user());
        $request->validate([
            'name' =>'required|max:255',
            'slug' =>'required|max:255|unique:posts',
            'extract' => 'required',
            'body' => 'required',
            'id_user'=> 'required|exists:users,id',
            'category_id'=> 'required|exists:categories,id_category'
        ]);
        $post = Post::create($request->all());

        return PostResource::make($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show(Post $post) cuando se manda la instancia post como parametro solo se retorna segun el id encontrado
        //return $post;

        $post = Post::included()->findOrFail($id);

        return PostResource::make($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' =>'required|max:255',
            'slug' =>'required|max:255|unique:posts',
            'extract' => 'required',
            'body' => 'required',
            'id_user'=> 'required|exists:users,id',
            'category_id'=> 'required|exists:categories,id_category'
        ]);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $post;
    }
}
