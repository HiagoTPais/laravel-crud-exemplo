<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('news', compact('news'));
    }

    public function view($id) {
        $news = News::findOrFail($id);

        $news->text = preg_split('#\R+#', $news->text);

        return view('viewNews', compact('news'));
    }

    public function create()
    {
        return view('createNews');
    }

    public function store(Request $request)
    {
        $img_name = $this->uploadImg($request);

        $response = News::create([
            "title" => $request->input("title"),
            "text" => $request->input("text"),
            "img" => $img_name
        ]);

        return redirect('/news');
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);

        Storage::delete('public/images' . $news->img);

        $news->delete();

        return redirect('/news');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('editNews', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);

        $img_name = $this->uploadImg($request);

        Storage::delete('public/images' . $news->img);

        $news->title = $request->input("title");
        $news->text = $request->input("text");
        $news->img = $img_name != null ? $img_name : $news->img;

        $news->save();

        return redirect('/news');
    }

    public function uploadImg($request)
    {
        $img_name = null;

        if ($request->hasFile('img')) {
            $path = "public/images";
            $img = $request->file("img");
            $img_name = time() . '.' . $img->getClientOriginalName();
            $request->file("img")->storeAs($path, $img_name);
        }

        return $img_name;
    }
}
