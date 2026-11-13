<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function home()
    {
        // Galeri otomatis: ambil 5 file terbaru dari folder public/portfolio
        $gallery = File::isDirectory(public_path('portfolio'))
            ? collect(File::files(public_path('portfolio')))
                ->sortByDesc(fn ($file) => $file->getMTime())
                ->take(5)
            : collect();

        return view('home', compact('gallery'));
    }
}
