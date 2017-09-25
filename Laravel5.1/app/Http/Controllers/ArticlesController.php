<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;

use App\Http\Requests\ArticleRequest;



class ArticlesController extends Controller
{
    public function index() {
    // $articles = Article::all();
    $articles = Article::latest('published_at')->published()->get();

    return view('articles.index', compact('articles'));
    }
    public function show($id) {
      $article = Article::findOrFail($id);
    return view('articles.show', compact('article'));
    }
    public function create()
    {
    $tags = Tag::lists('name', 'id');

    return view('articles.create' , compact('tags'));
    }
    public function store(ArticleRequest $request) {

        // Article::create($request->all());
        $article = \Auth::user()->articles()->create($request->all());
        $article->tags()->attach($request->input('tag_list'));

        \Session::flash('flash_message', '記事を追加しました。');

        // return redirect('articles');
        return redirect()->route('articles.index');

    }
    public function edit($id) {
      $article = Article::findOrFail($id);
    $tags = Tag::lists('name', 'id');
    return view('articles.edit', compact('article','tags'));
    }
    public function update($id,ArticleRequest $request) {
      $article = Article::findOrFail($id);
    $article->update($request->all());
    $article->tags()->sync($request->input('tag_list', []));
    \Session::flash('flash_message', '記事を更新しました。');
    // return redirect(url('articles', [$article->id]));
    return redirect()->route('articles.show', [$article->id]);
  }
    public function destroy($id) {
    $article = Article::findOrFail($id);
    $article->delete();
    \Session::flash('flash_message', '記事を削除しました。');

    return redirect('articles.index');
  }
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['index', 'show']]);
  }
}
