<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::select('posts.*', 'users.name as author')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(4);
        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::select('posts.*', 'users.name as author')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->find($id);
        return view('posts.show', compact('post'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    public function search(Request $request) {
        $search = $request->input('search', '');
        // образаем слишком длинный запрос
        $search = iconv_substr($search, 0, 64);
        // удаляем все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        // сжимаем двойные пробелы
        $search = preg_replace('#\s+#u', ' ', $search);
        if (empty($search)) {
            return view('posts.search');
        }
        $posts = Post::select('posts.*', 'users.name as author')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->where('posts.title', 'like', '%'.$search.'%') // поиск по заголовку поста
            ->orWhere('posts.body', 'like', '%'.$search.'%') // поиск по тексту поста
            ->orWhere('users.name', 'like', '%'.$search.'%') // поиск по автору поста
            ->orderBy('posts.created_at', 'desc')
            ->paginate(4)
            ->appends(['search' => $request->input('search')]);;
        return view('posts.search', compact('posts'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $post = new Post();
        $post->author_id = \Illuminate\Support\Facades\Auth::id();
        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->body = $request->input('body');
        $post->save();
        return redirect()
            ->route('post.index')
            ->with('success', 'Новый пост успешно создан');
    }
    /* ... */
    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->body = $request->input('body');
        $post->update();
        return redirect()
            ->route('post.show', compact('id'))
            ->with('success', 'Пост успешно отредактирован');
    }



    public function edit($id) {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /* ... */
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()
            ->route('post.index')
            ->with('success', 'Пост был успешно удален');
    }
    /* ... */
}

