<?php

namespace App\Http\Controllers;

use App\Share;
use Illuminate\Http\Request;

class ShareController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->only(['show', 'admin', 'destroy', 'update', 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::where('confirmed', 1)->paginate(15);
        return view('share.index', compact('shares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'my_name'   => 'honeypot',
            'my_time'   => 'required|honeytime:5',
            'name'      => "required",
            'content'   => "required",
        ]);

        (new Share($request->all()))->save();

        return redirect()->back()->with('status', 'Thank you. Your message is waiting for approval.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        return view('share.show', compact('share'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit(Share $share)
    {
        return view('share.edit', compact('share'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Share $share)
    {
        $this->validate($request, [
            'name'      => "required",
            'content'   => "required",
        ]);

        $share->name = $request->get('name');
        $share->confirmed = $request->get('confirmed') ? true : false;
        $share->content = $request->get('content');
        $share->save();

        return redirect('/admin/shares')->with('status', 'Share updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function destroy(Share $share)
    {
        $share->delete();
        return redirect()->back()->with('status', 'Share deleted.');
    }

    public function admin()
    {
        $shares = Share::orderBy('created_at')->paginate(40);
        return view('share.admin', compact('shares'));
    }
}
