<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Jobs\ChangePost;
use App\Jobs\UploadBigFill;
use App\Models\category;
use App\Models\Post;
use App\Models\role;
use App\Models\Teg;
use Brick\Math\Exception\DivisionByZeroException;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Policies\PostPolicy;


class PostController extends Controller
{
       public function __construct(){
           $this->middleware('auth')->except(['index','show']);
           $this->authorizeResource(Post::class, 'post');
       }


    public function index()
    {
//       $posts= Post::latest()->paginate(6);
         $posts = Cache::remember('posts',now()->addSeconds(30),function (){
             return Post::latest()->paginate(6);
         });

        return view('posts.index')->with('posts',$posts);

//        $newPost= new Post();
//        $newPost->title= ' new post';
//        $newPost->short_content= ' new post short';
//        $newPost->content= ' new post content';
//        $newPost->photo= ' /storaga/new_post.png';

//        $newPost = Post::create([
//            'title'=>'5',
//            'short_content'=>'short',
//            'content'=>'content11',
//            'photo'=>'photo.jpg',
//        ]);
//

//        $post = Post::find(3)->update(['title'=>'yangi']);
//        $post->save();
//
//        $newPost->save();


//        Malumotlar Bazasiga Malumot qo'shish
//          $post=DB::table('posts')->insert([
//              'title'=>'522',
//              'short_content'=>'short232',
//              'content'=>'content1144',
//              'photo'=>'photo.jpg4',
//          ]);

//            bu xamasini olib keladi
//           $post=DB::table('posts')->get();
//            bitasini olib keladi
//           $post=DB::table('posts')->find(2);
//           dd($post);

////        Post::destroy(3);
//        $post = Post::all();
//        dd($post);


//        return "yaratidi";


    }


    public function create()
    {
        Gate::authorize('create-post', role::where('name','admin')->first());

        return view('posts.create')->with([
            'categories'=>category::all(),
            'tags'=>Teg::all(),
        ]);
    }


    public function store(StorePostRequest $request)
    {

        if($request->hasFile('photo')){
            $name=$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos',$name);
        }



        $post = Post::create([
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'short_content'=>$request->short_content,
            'contents'=>$request->contents,
            'photo'=>$path ?? null,
        ]);

        if (isset($request->tag)){
            foreach ($request->tags as $tag){
                $post->tags()->attach($tag);
            }
        }

        PostCreated::dispatch($post);


        ChangePost::dispatch($post)->onQueue('Uploading');

        Mail::to($request->user())->send(new \App\Mail\PostCreated($post));

        Notification::send(auth()->user(), new \App\Notifications\postcreated($post));

        return redirect()->route('posts.index');
//        dd($request);
    }


    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post'=>$post,
            'recent_posts'=>Post::latest()->get()->except($post->id)->take(5)
        ]);
    }


    public function edit(Post $post)
    {
//        if(! Gate::allows('update-post',$post)){
//            abort(403);
//        }

//        Gate::authorize('update-post',$post);
//        Gate::authorize('update', $post);

        return view('posts.edit')->with(['post'=>$post]);
    }


    public function update(StorePostRequest $request, Post $post)
    {
//        Gate::authorize('update-post',$post);
//        Gate::authorize('update', $post);

        if($request->hasFile('photo')){
            if(isset($post->photo)){
                Storage::delete($post->photo);
            }

            $name=$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos',$name);
        }

        $post->update([
            'title'=>$request->title,
            'short_content'=>$request->short_content,
            'contents'=>$request->contents,
            'photo'=>$path ?? $post->photo,
        ]);
        return redirect()->route('posts.show',['post'=>$post->id]);
    }


    public function destroy(Post $post)
    {
//        Gate::authorize('update-post',$post);
        if(isset($post->photo)){
            Storage::delete($post->photo);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
