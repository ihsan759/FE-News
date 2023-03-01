<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $title = "Halaman dashboard";
        $response = HttpClient::fetch(
            "GET",
            "home"
        );
        $news = $response['data'];
        return view('news.index', compact('title', 'news'));
    }

    public function create()
    {
        $title = "Halaman buat berita";
        return view('news.create', compact('title'));
    }

    public function store(Request $request)
    {
        if ($request->file('banner') == null) {
            return redirect()->back()->with(['message' => 'Field tidak boleh kosong']);
        }
        $file = ['banner' => $request->file('banner')];
        $response = HttpClient::fetch(
            "POST",
            "news/store",
            $request->all(),
            $file
        );

        if ($response['status'] == false) {
            if (isset($response['message']['banner'])) {
                if ($response['message']['banner'][0] == 'Wajib Gambar') {
                    return redirect()->back()->with(['message' => 'Hanya menerima gambar']);
                } else {
                    return redirect()->back()->with(['message' => 'Field tidak boleh kosong']);
                }
            }
            return redirect()->back()->with(['message' => 'Field tidak boleh kosong']);
        } else {
            return redirect()->route('home')->with(['message' => $response['message']]);
        }
    }

    public function detail($id)
    {
        $title = "Halaman detail";
        $response = HttpClient::fetch(
            "GET",
            "news/show/$id"
        );

        if ($response['status'] == false) {
            return redirect()->route('home')->with(['message' => $response['message']]);
        } else {
            $news = $response['data'];
            return view('news.detail', compact('news', 'title'));
        }
    }

    public function edit($id)
    {
        $title = "Halaman edit";
        $response = HttpClient::fetch(
            "GET",
            "news/show/$id"
        );

        if ($response['status'] == false) {
            return redirect()->route('home')->with(['message' => $response['message']]);
        } else {
            $news = $response['data'];
            return view('news.edit', compact('news', 'title'));
        }
    }

    public function update($id, Request $request)
    {
        if ($request->file('banner') != null) {
            $file = ['banner' => $request->file('banner')];
            $response = HttpClient::fetch(
                "POST",
                "news/update/$id",
                $request->all(),
                $file
            );
        } else {
            $response = HttpClient::fetch(
                "POST",
                "news/update/$id",
                $request->all()
            );
        }
        if ($response['status'] == true) {
            return redirect()->route('home')->with(['message' => $response['message']]);
        } else {
            if (isset($response['message']['banner'])) {
                if ($response['message']['banner'][0] == 'Wajib Gambar') {
                    return redirect()->back()->with(['message' => 'Hanya menerima gambar']);
                }
            }
            return redirect()->back()->with(['message' => 'Field selain banner tidak boleh kosong']);
        }
    }

    public function destroy($id)
    {
        $response = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8001/api/news/destroy/$id"
        );
        return redirect()->route('home')->with(['message' => $response['message']]);
    }
}
