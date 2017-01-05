<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create(Request $request)
    {
        $album = new Album();
        $title = 'Add New Album';

        return view('layouts.bandmate.editalbum',
            compact('album', 'request', 'title'));
    }

    public function destroy(Album $album, Request $request)
    {
        try {
            $name = $album->name;
            Album::destroy($album->id);
            $request->session()->flash('success', 'Deleted '.$name);
        } catch (\Exception $e) {
            $request->session()
                    ->flash('error', 'Something went wrong deleting id '.$album);
        }

        return redirect('/albums');
    }

    public function edit(Album $album, Request $request)
    {
        $title = 'Editing '.$album->name;

        return view('layouts.bandmate.editalbum',
            compact('request', 'album', 'title'));
    }

    public function index(Album $album, Request $request)
    {
        $bands = \App\Band::get();
        if ($request->has('band')) {
            $albums =
                Album::sortable()->where('band_id', '=', $request->band)->paginate();
        } else {
            $albums = $album::sortable()->paginate();
        }
        $flash = $request->session()->get('status');
        $title = 'Album Index';

        return view('layouts.bandmate.albums',
            compact('albums', 'request', 'bands', 'flash', 'title'));
    }

    public function show(Album $id)
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'          => 'required',
                'recorded_date' => 'required|date',
                'release_date'  => 'required|date',
            ]
        );
        $album = new Album($request->all());
        if (! $album->save($request->all())) {
            $request->session()->flash('error', 'Could not save '.$album->name);
        } else {
            $request->session()->flash('success', 'Saved '.$album->name);
        }

        return redirect('/albums');
    }

    public function update(Album $album, Request $request)
    {
        $this->validate($request,
            [
                'name'    => 'required',
                'band_id' => 'required',
            ]
        );
        if (! $album->update($request->all())) {
            $request->session()->flash('error', 'Could not update '.$album->name);
        } else {
            $request->session()->flash('success', 'Updated '.$album->name);
        }

        return redirect('/albums');
    }
}
