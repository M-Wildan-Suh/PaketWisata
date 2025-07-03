<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\ArticleShow;
use App\Models\ArticleTag;
use App\Models\PhoneNumber;
use App\Models\Template;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PageController extends Controller
{
    public function home(Request $request) {
        Paginator::currentPageResolver(function () use ($request) {
            return $request->route('page', 1); // default ke halaman 1
        });
        $data = ArticleShow::where('status', 'publish')
            ->latest()->paginate(12);

        $category = ArticleCategory::all()->take(3);

        $data->transform(function ($data) {
            $data->date = Carbon::parse($data->created_at)->locale('id')->translatedFormat('d F Y');
            $data->articles->articletag;
            $data->articles->user ;
            return $data;
        });

        $category->transform(function ($cat) {
            // Ambil semua ArticleShow dari setiap artikel di kategori
            $cat->articles = ArticleShow::whereHas('articles.articleCategory', function ($query) use ($cat) {
                    $query->where('slug', $cat->slug);
                })
                ->where('status', 'publish')->latest()->paginate(12);

            $cat->articles->transform(function ($data) {
                $data->date = Carbon::parse($data->created_at)->locale('id')->translatedFormat('d F Y');
                $data->articles->articletag;
                $data->articles->user ;
                return $data;
            });

            return $cat;
        });

        $trend = ArticleShow::orderBy('view', 'desc')
            ->where('status', 'publish')
            ->take(6)->get();
            
        $data->withPath("/artikel/page");
        return view('guest.home', compact('data', 'trend', 'category'));
    }

    public function article(Request $request, $username = null, $category = null, $tag = null) {
        Paginator::currentPageResolver(function () use ($request) {
            return $request->route('page', 1);
        });

        $page = $request->route('page') ?? null;

        if ($username) {
            $data = ArticleShow::whereHas('articles.user', function ($query) use ($username) {
                    $query->where('slug', $username);
                })
                ->where('status', 'publish')->latest()->paginate(12);

            $user = User::where('slug', $username)->first();
            
            $data->withPath("/penulis/{$user->slug}/page");
            
            $title = 'Penulis : '.$user->name;
        } elseif ($category) {
            $data = ArticleShow::whereHas('articles.articleCategory', function ($query) use ($category) {
                    $query->where('slug', $category);
                })
                ->where('status', 'publish')->latest()->paginate(12);

            $data->withPath("/kategori/{$category}/page");
            
            $category = ArticleCategory::where('slug', $category)->first()->category;
            $title = 'Kategori : '.$category;
        } elseif ($tag) {
            $data = ArticleShow::whereHas('articles.articleTag', function ($query) use ($tag) {
                    $query->where('slug', $tag);
                })
                ->where('status', 'publish')->latest()->paginate(12);

            $data->withPath("/tag/{$tag}/page");
            
            $tag = ArticleTag::where('slug', $tag)->first()->tag;
            $title = 'Tag : '.$tag;
        } elseif ($request->search) {
            $data = ArticleShow::where('judul', 'like', '%' . $request->search . '%')->where('status', 'publish')
                ->latest()->paginate(12);

            $data->withPath("/artikel/page");
            $title = 'Pecaharian : '.$request->search;
        } else {
            $data = ArticleShow::where('status', 'publish')
                ->latest()->paginate(12);

            $data->withPath("/artikel/page");
            $title = 'Artikel Terbaru';
        }

        $data->transform(function ($data) {
            $data->date = Carbon::parse($data->created_at)->locale('id')->translatedFormat('d F Y');
            $data->articles->articletag;
            $data->articles->user ;
            return $data;
        });
        
        $category = ArticleCategory::all();

        return view('guest.article', compact('data', 'title', 'page', 'category'));
    }

    public function business($slug) {
        $data = ArticleShow::where('slug', $slug)->first();

        if (!$data) {
            return redirect()->route('not.found');
        }

        $data->view = $data->view + 1;

        $data->save();
        
        $template = $data->template;

        // dd($data->articles->phoneNumber);
        if ($data->phoneNumber) {
            $data->no_tlp = $data->phoneNumber->no_tlp;
        } elseif ($data->articles->articletag->first()?->phonenumber) {
            $data->no_tlp = $data->articles->articletag->first()->phoneNumber->no_tlp;
        } else {
            $data->no_tlp = optional(PhoneNumber::first())->no_tlp;
        }

        $data->date = Carbon::parse($data->created_at)->locale('id')->translatedFormat('d F Y');
        // dd($data->articles);
        
        $category = ArticleCategory::all();

        return view('guest.business', compact('data', 'template', 'category'));
    }

    public function notFound() {
        $category = ArticleCategory::all();

        return view('guest.pagenotfound', compact('category'));
    }

    public function test() {
        return view('guest.test');
    }
}
