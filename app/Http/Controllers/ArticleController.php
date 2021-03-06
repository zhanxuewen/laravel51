<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Markdown\Markdown;
use App\Tag;
use Carbon\Carbon;
use Request;

class ArticleController extends Controller
{
    private $markdown;

    /**
     * ArticleController constructor.
     * @param $markdown
     */
    public function __construct(Markdown $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->published()->paginate(10);
//        dd($articles);
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
//        dd($tags);
        return view('articles.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $input = $request->all();
        $input['intro'] = mb_substr(Request::get('content'),0,64);
        $article = Article::create(array_merge($input, ['user_id'=>\Auth::user()->id]));
        $article->tags()->attach($request->input('tag_list'));
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
//        dd($article->published_at->diffForHumans());

        $content = $this->markdown->markdown($article->content);
        return view('articles.show',compact('article','content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, $id)
    {
//        dd($request->all());
        $article = Article::findOrFail($id);
//        $article->update($request->all());
        $article->update($request->except('id'));

        $article->tags()->sync($request->get('tag_list'));
        return redirect('/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function store_demo(Request $request)
    {
        $input = $request->all();
        $validator = \Validator::make($input, [
            'title' => 'required|min:3',
            'body'  => 'required',
        ]);
        if ($validator->failed()){
            dd('验证没有通过');
        }
        return redirect('/article');
    }

}
