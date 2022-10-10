<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;

use App\Models\Classroom;

class ClassRoomController extends Controller
{
    private $classRoom;

    public function __construct(Classroom $classRoom)
    {
        $this->classRoom = $classRoom;
    }

    public function index()
    {
        $classRooms = $this->classRoom->paginate(10);
        return view('pages.classRoom.index', compact('classRooms'));
    }
    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        $data = $request->validate(Classroom::$rules);

        Classroom::create($data);

        Flash::success('ClassRoom saved successfully.');

        return redirect()->route('classroom.index')->with([
            'alert-type' => 'success',
            'message' => 'medo'
        ]);
    }
    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $classRoom = $this->classRoom->find($id);
        if (!$classRoom) {
            Flash::error('classRoom not found');
            return redirect(route('classroom.index'));
        }
        $data = $request->validate(Classroom::$rules);

        $classRoom->update($data);

        Flash::success('classRoom updated successfully.');
        return redirect(route('classroom.index'));
    }

    public function destroy($id)
    {
        $classRoom = $this->classRoom->find($id);
        
        if (!$classRoom) {
            Flash::error('classRoom not found');
            return redirect(route('classroom.index'));
        }
        
        $classRoom->delete();

        Flash::success('classRoom deleted successfully.');
        return redirect(route('classroom.index'));
    }
}
