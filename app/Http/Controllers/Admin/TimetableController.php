<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $this->authorize('read.timetable');
        return view('admin.timetables.index');
    }
    public function create()
    {
        $this->authorize('create.timetable');
        return view('admin.timetables.create');
    }

    public function edit($id)
    {
        $this->authorize('update.timetable');
        $timetable = Timetable::findOrFail($id);
        return view('admin.timetables.edit', ["timetable" => $timetable]);
    }

    public function destroy(Timetable $timetable)
    {
        $timetable->seat()->detach();
        $timetable->delete();
        return redirect()->route('admin.timetables.index')->with('success', "Jadwal berhasil dihapus");
    }
}
