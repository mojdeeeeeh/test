<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->except(['show', 'addComment']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (! \Auth::check())
//        {
//            return redirect('/home');
//        }

        $posts = \App\Post::orderBy('created_at', 'desc')
        ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = \App\Tag::pluck('value')
                            ->toArray();

        $tags = implode(',', $tags);

        return view('posts.create', compact(['post','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:255',
            'brief' => 'required|min:6',
            'body' => 'required|min:6'
        ]);

        $tagsData = [];
        $tags = explode (',', $request->input('tags'));

        foreach ($tags as $tag)
        {
            $tag = \App\Tag::readOrInsert ($tag);
            $tagsData[] = $tag->id;
        }

        // return $tagsData;

        $user = \Auth::user();

        $post = Post::create ([
            'title'  => $request->title,
            'brief'   => $request->brief,
            'body'   => $request->body,
            'user_id' => $user->id,
        ]);

        if (! empty($tagsData))
        {
            $post->tags()->sync($tagsData);
        }
        
        return redirect()->route('posts.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('comments');

        return view('comments.create', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = $post->tags->pluck('value')
        ->toArray();
        $tags = implode(',', $tags);

        return view('posts.edit', compact(['post','tags']));
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
     $this->validate($request, [
        'title' => 'required|min:2|max:255',
        'brief' => 'required|min:6',
        'body' => 'required|min:6'
    ]);

     $tagsData = [];
    if (! is_null ($request->input('tags')))
    {
        $tags = explode (',', $request->input('tags'));

        foreach ($tags as $tag)
        {
            $tag = \App\Tag::readOrInsert ($tag);

            $tagsData[] = $tag->id;
        }
    }

        // return $tagsData;

    // $post->update($request->all());

    $post->update ([
        'title' => $request->title,
        'brief' => $request->brief,
        'body'  => $request->body,
    ]);

    if (! empty($tagsData))
    {
       $post->tags()->sync($tagsData);
    }

    return redirect()->route('posts.index');
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
    }

    public function addComment(Request $request, Post $post)
    {
        $post->comments()->create([
            'cmBody' => $request->cmBody,
            'cmName' => $request->cmName,
            'cmEmail' => $request->cmEmail
        ]);

        return back()->withInput();
    }
}
