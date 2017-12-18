<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comments;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\elementType;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->published()->paginate(5);
        //$articles = Article::paginate(5)->published()->get();
        $recentArticles = Article::orderby('hits','desc')->take(6)->get();
        //获取所有文章的标签
        $articleTags = Article::latest()->published()->get();
        //返回属于哪个模块
        $moduleIndex = 'index';
        return view('articles.index',compact('articles','recentArticles','moduleIndex','articleTags'));
    }

    /**
     * Display a listing of the resource by category
     * @param $category
     */
    public  function search($column,$condition,$character)
    {
        $articles = Article::latest()->searchColumn($column,$condition,$character)->paginate(5);
        $recentArticles = Article::orderby('hits','desc')->take(6)->get();
        //获取所有文章的标签
        $articleTags = Article::latest()->published()->get();
        //返回属于哪个模块
        if ($condition=='N')
            $moduleIndex = 'live';
        else if ($condition=='T')
            $moduleIndex = 'tc';

        return view('articles.index',compact('articles','recentArticles','moduleIndex','articleTags'));
    }

    /**
     * @param Request $request
     */
    public  function  postSearch(Request $request)
    {
        $condition = $request->all();
        $articles = Article::latest()->condition($condition['condition'])->paginate(5);
        //获取所有文章的标签
        $articleTags = Article::latest()->published()->get();
        $recentArticles = Article::orderby('hits','desc')->take(6)->get();
        //返回属于哪个模块
        $moduleIndex = 'index';
        return view('articles.index',compact('articles','condition','moduleIndex','articleTags','recentArticles'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        //返回属于哪个模块
        $moduleIndex = 'about';
        return view('articles.about',compact('moduleIndex'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moduleIndex = 'create';
        if (\Auth::check()) {
            return view('articles.create',compact('moduleIndex'));
        }else
        {
            return view('auth.login',compact('moduleIndex'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateArticleRequest $request)
    {
        $input = array_merge(['user_id'=>Auth::user()->id],$request->all());
        Article::create($input);
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::findOrFail($id);
        $articles->hits = $articles->hits+1;

        $articles->update();
        //最热文章
        $recentArticles = Article::orderby('hits','desc')->take(6)->get();
        //此文章评论
        $comments = Comments::latest()->where('article_id','=',$id)->paginate(5);
        return view('articles.show',compact('articles','recentArticles','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);
        return view('articles.edit',compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateArticleRequest $request, $id)
    {
        $articles = Article::findOrFail($id);
        $articles->update($request->all());
        return redirect('/articles');
    }

    /**
     * @param Request $request
     * upload images
     */
    public function image(Request $request)
    {
        if ($request->hasFile('upload'))
        {
            $file = $request->file('upload');
            $funcNum=$request->all()['CKEditorFuncNum'];
            if (!$file->isValid())
            {
                return "上传文件出错";
            }
            $allowed_extensions = ["png","jpg","gif"];
            if ($file->getClientOriginalExtension()&&!in_array($file->getClientOriginalExtension(),$allowed_extensions))
            {
                return "只支持png,jpg,gif格式图片上传";
            }
            $destinationPath ='upload/images/';
            $extension = $file->getClientOriginalExtension();//获取文件后缀
            $fileName = date('Y-m-d').str_random(10).'.'.$extension;//设置文件名
            $file->move($destinationPath,$fileName);//移动图片到指定路径
            $filePath =url($destinationPath.$fileName);
            $message = '';
            return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum,'$filePath','$message')</script>";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::findOrFail($id);
        $articles->delete($articles->all());
        return redirect('/articles');
    }
}
