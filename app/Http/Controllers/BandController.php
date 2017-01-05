<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BandController extends Controller
{
    public function create(Request $request)
    {
        $band = new Band();
        $title = 'Add New Band';

        return view('layouts.bandmate.editband', compact('band', 'request', 'title'));
    }

    public function destroy(Band $band, Request $request)
    {
        try {
            $name = $band->name;
            $band::destroy($band->id);
            $request->session()->flash('success', 'Deleted '.$name);
        } catch (\Exception $e) {
            $request->session()
                    ->flash('error', 'Something went wrong deleting id '.$band);
        }

        return redirect('/bands');
    }

    public function edit(Band $band, Request $request)
    {
        $title = 'Editing '.$band->name;

        return view('layouts.bandmate.editband', compact('request', 'band', 'title'));
    }

    public function index(Band $band, Request $request)
    {
        $bands = $band::sortable()->paginate();
        $title = 'All Your Favorite Bands!';

        return view('layouts.bandmate.bands', compact('bands', 'request', 'title'));
    }

    public function show(Request $request)
    {
        $slug = $request->segment(2);
        $band = Band::where('slug', '=', $slug)->get()->first();
        if ($band === null) {
            throw new NotFoundHttpException('No band with slug '.$slug);
        }
        $bands = Band::simplePaginate();
        $yearsRocking = \Carbon\Carbon::createFromFormat('Y-m-d', $band->start_date)
                                      ->diffInYears(\Carbon\Carbon::now('UTC'));
        $albumCount = $band->albums()->count();
        $title = 'Details for '.$band->name;

        return view('layouts.bandmate.band',
            compact('band', 'bands', 'request', 'yearsRocking', 'albumCount', 'title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
            ]
        );
        $band = new Band($request->all());
        $band->slug = str_slug($request->name);
        if (!$band->save($request->all())) {
            $request->session()->flash('error', 'Could not save '.$band->name);
        } else {
            $request->session()->flash('success', 'Saved '.$band->name);
        }

        return redirect('/');
    }

    public function update(Band $band, Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
            ]
        );
        $band->slug = str_slug($request->name);
        if (!$band->update($request->all())) {
            $request->session()->flash('error', 'Could not update '.$band->name);
        } else {
            $request->session()->flash('success', 'Updated '.$band->name);
        }

        return redirect('/');
    }
}
