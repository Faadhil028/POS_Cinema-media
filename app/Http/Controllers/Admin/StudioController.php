<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        $this->authorize('read.studio');
        return view('admin.studios.index');
    }

    public function create()
    {
        $this->authorize('create.studio');
        return view('admin.studios.create');
    }
    public function edit($id)
    {
        $this->authorize('update.studio');
        $studio = Studio::findOrFail($id);
        return view('admin.studios.edit', ["studio" => $studio]);
    }

    public function destroy(Studio $studio)
    {
        $studio->delete();
        return redirect()->route('admin.studios.index')->with('success', "Seat berhasil dihapus");
    }
}
