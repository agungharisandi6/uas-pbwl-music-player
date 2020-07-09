<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Artis;

class AlbumController extends Controller
{

    public function index()
    {
        $rows = Album::all();
        return view('album.index', compact('rows'));
    }

    public function create()
    {
        $lst = Artis::all();
        return view('Album.add', compact('lst'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_album' => 'required'
        ],
        [
            'nama_album.required' => 'Nama wajib diisi'
        ]);
        Album::create([
            'nama_album' => $request->nama_album,
            'artis_id' => $request->artis_id
        ]);
        return redirect('album');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $row = Album::findOrFail($id);
        $lst = Artis::all();
        return view('album.edit', compact('row','lst'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_album' => 'required'
        ],
        [
            'nama_album.required' => 'Nama wajib diisi'
        ]);
        $row = Album::findOrFail($id);
        $row->update([
            'nama_album' => $request->nama_album,
            'artis_id' => $request->artis_id
        ]);

        return redirect('album');
    }

    public function destroy($id)
    {
        $row = Album::findOrFail($id);
        $row->delete();

        return redirect('album'); 
    }
}
