<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\News;
use App\NewsHistory;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('admin.news.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, News::$rules);
        $news = new News;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        $news->fill($form);
        $news->save();
        // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = News::where('title', $cond_title)->get();
        } else {
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    public function edit(Request $request)
    {
        $news = News::find($request->id);
        return view('admin.news.edit', ['news_form' => $news]);
    }
    public function update(Request $request)
    {
        $this->Validate($request, News::$rules);
        $news = News::find($request->id);
        $news_form = $request->all();
        unset($news_form['_token']);
        $news->fill($news_form)->save();

        $history = new NewsHistory;
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/news/');
    }
    public function delete(Request $request)
    {
        $news = News::find($request->id);
        $news->delete();
        return redirect('admin/news/');
    }
}
