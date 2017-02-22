<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\User;
//use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Auth;
//use Illuminate\HttpResponse;
//use Session;
//use Flash;
// use Carbon\Carbon;
// use Request;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only' => 'create']); //except
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = Article::order_by('published_at', 'desc')->get();
        $user = Auth::user();
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles','user'));
    }

    /**
     * Show the form for creating a new article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guest()){
            return redirect('articles');
        }
        return view('articles.create');
    }

    /**
     * Store a new article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request) //public function store(CreateArticleRequest $request)
    {
        // $input = Request::all();
        // $input['published_at'] = Carbon::now();

        // $article = new Article;
        // $article->title = $input['title'];

        // $request = $request->all();
        // $request['user_id'] = Auth::id();

//        $article = new Article($request->all());
//        Auth::user()->articles()->save($article);
        
        Auth::user()->articles()->create($request->all());
        
//        flash()->success('Your article has been created!');
        flash()->overlay('Your article has been created!', 'Good Job');
        
//        \Session::flash('flash_message', 'Your article has been created!');
//        session()->flash('flash_message', 'Your article has been created!');

        //$this->validate($request, ['title' => 'required|min:3', 'body' => 'required', 'published_at' => 'required|date']);

        // Article::create($request->all());

        return redirect('articles');
    }

    /**
     * Display the specified article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $article = Article::findOrFail($id);

        // dd($article);
        // if(is_null($article)){
        //     abort(404);
        // }

        return view('articles.show', compact('article'));
    }

    public function getList($uname)
    {
        $user = User::where('username', $uname)->first();

        if($user){
            $articles = Article::where('user_id', $user->id)->get()->all();
            return view('articles.index', compact('articles','user'));
        }

        return redirect('articles');

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
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
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
}
