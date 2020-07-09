<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artis;

class ArtisController extends Controller
{

    public function index()
    {
        $rows = Artis::all();
        return view('artis.index', compact('rows'));

    }
    
    public function create()
    {
        return view('artis.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_artis' => 'required'
        ],
        [
            'nama_artis.required' => 'Nama wajib diisi'
        ]);
        Artis::create([
            'nama_artis' => $request->nama_artis
        ]);

        return redirect('artis');
        }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $row = Artis::findOrFail($id);
        return view('artis.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_artis' => 'required'
        ],
        [
            'nama_artis.required' => 'Nama wajib diisi'
        ]);
        $row = Artis::findOrFail($id);
        $row->update([
            'nama_artis' => $request->nama_artis
        ]);

        return redirect('artis');   
    }
    
    public function destroy($id)
    {
        $row = Artis::findOrFail($id);
        $row->delete();

        return redirect('artis'); 
    }
}
