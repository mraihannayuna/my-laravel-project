<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // "SELECT title, content FROM posts"
        // $posts = Post::where('active', true)->
                // $posts = Post::active()
                //                  ->withTrashed()
                //                 ->get();
                     // ->select('id', 'title', 'content', 'created_at')

        // dd($posts);

        // $posts = Post::active()->get();
        // $total_active = $posts->count();
        // $total_nonActive = Post::nonActive()->count();

        if(!Auth::check()){
            return redirect('logout');
        }

        $posts = Post::Status(true)->get();
        $total_active = $posts->count();
        $total_nonActive = Post::Status(false)->count();
        $total_deleted = Post::onlyTrashed()->count();

        $data = [
            'posts' => $posts,
            'total_active' => $total_active,
            'total_nonactive' => $total_nonActive,
            'total_deleted' => $total_deleted,
        ];
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

                if(!Auth::check()){
            return redirect('logout');
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

                if(!Auth::check()){
            return redirect('logout');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        // $posts = Storage::get('posts.txt');

        // $posts = explode("\n", $posts);

        // $new_post = [
        //     count($posts) + 1,
        //     $title,
        //     $content,
        //     date("Y-m-d H:i;s")
        // ];

        // $new_post = implode(",", $new_post);

        // array_push($posts, $new_post);

        // $posts = implode("\n", $posts);

        // Storage::put('posts.txt', $posts);

        Post::create([
            'title' => $title,
            'content' => $content,
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

                if(!Auth::check()){
            return redirect('logout');
        }

        // $posts = Storage::get('posts.txt');
        // $posts = explode("\n", $posts);
        // $selected_post = array();
        // foreach($posts as $p) {
        //     $p = explode(",", $p);
        //     if ($p[0] == $id) {
        //         $selected_post = $p;
        //     }
        // }\\

            // ? SELECT * FROM posts WHERE id = $id
        // $selected_post = Post::selectedById($id)->first();
        $selected_post = Post::where('slug', $slug)->first();
        $comments = $selected_post->comments()->get();
        $total_comments = $selected_post->comments()->count();
                // $selected_post = Post::findOrfail($id)->first();

        // $selected_post = DB::table('posts')
            // ->select('id', 'title', 'content', 'created_at')
            // ->where('id', $id)
            // ->first();

        $view_data = [
            'posts' => $selected_post,
            'comments' => $comments,
            'total_comments' => $total_comments
        ];
        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

                if(!Auth::check()){
            return redirect('logout');
        }

        $posts = Post::where('slug',$slug)->first();
                    // ->select('id','title','content','created_at')
                    // ->where('id', $id)
                    // ->first();
        $view_data = [
            'posts' => $posts,
        ];
        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

                if(!Auth::check()){
            return redirect('logout');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        // "UPDATE ...   WHERE id = $id"
        Post::where('slug',$slug)
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return redirect("posts/$slug");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

                if(!Auth::check()){
            return redirect('logout');
        }

                Post::selectedById($id)->delete();
        // Post::where('id', $id)
        //     ->where('id', $id)
        //     ->delete();

        return redirect('posts');

    }

    public function trash() {

                if(!Auth::check()){
            return redirect('logout');
        }

        $trash_item = Post::onlyTrashed()->get();


        $data = [
            'posts' => $trash_item,
        ];

        return view('posts.recylebin', $data);

    }

}
