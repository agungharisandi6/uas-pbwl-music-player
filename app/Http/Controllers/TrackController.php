<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Album;
use App\Artis;

class TrackController extends Controller
{

    public function index()
    {
        $rows = Track::all();
        return view('track.index', compact('rows'));
    }

    public function create()
    {
        $lst = Album::all();
        return view('track.add', compact('lst'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'nama_track' => 'required'
        ],
        [
            'nama_track.required' => 'Nama wajib diisi'
        ]);
        $file = $request->file('file');
        $nama = $file->getClientOriginalName();
        $simpan = 'lagu';
        $file->move($simpan, $nama);

        Track::create([
            'nama_track' => $request->nama_track,
            'album_id' => $request->album_id,
            'file' => $nama
        ]);
        return redirect('track');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $row = Track::findOrFail($id);
        $row->delete();

        return redirect('track'); 
    }
}