<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Http\Controllers\traits\FileTrait;

class GalleryController extends Controller
{
    use FileTrait;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $gallery = Gallery::paginate(15);
        return view('gallery.index', compact('gallery'));
    }

    public function create() {
        return view('gallery.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,jpg,png|max:10000'
        ]);


        list($public_path, $public_thumbnail_path) = $this->createFile($request->file, 'gallery', [300, 200]);
        Gallery::create([
            'image' => $public_path,
            'thumbnail' => $public_thumbnail_path,
            'slideshow' => $request->get('slideshow') ? true : false
        ]);

        return redirect()->route('gallery.index')->with('status', 'Image created.');
    }

    public function edit(Gallery $gallery) {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery) {
        if (!empty($request->file)) {
            $this->deleteFile($gallery->image);
            $this->deleteFile($gallery->thumbnail);

            list($public_path, $public_thumbnail_path) = $this->createFile($request->file);
            $gallery->image = $public_path;
            $gallery->thumbnail = $public_thumbnail_path;
        }

        $gallery->slideshow = $request->get('slideshow') ? true : false;
        $gallery->save();

        return redirect()->route('gallery.index')->with('status', 'Image updated.');
    }

    public function destroy(Gallery $gallery) {
        $this->deleteFile($gallery->image);
        $this->deleteFile($gallery->thumbnail);
        $gallery->delete();
        return redirect()->route('gallery.index')->with('status', 'Image deleted.');
    }

}
