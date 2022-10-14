<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Facultie;
use App\Models\Classroom;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    private $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function index()
    {
        $faculties = Facultie::all();
        $chooseFaculties = Facultie::get()->pluck('name', 'id');
        $classroom = Classroom::get()->pluck('name', 'id');
        $sections = $this->section->paginate(10);
        return view('pages.sections.index', compact(['chooseFaculties', 'classroom','faculties','sections']));
    }
    public function create()
    {
        return back();
    }
    public function store(Request $request)
    {
        $data = $request->validate(Section::$rules);
        Section::create($data);

        Flash::success('Section saved successfully.');

        return redirect()->route('sections.index')->with([
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
        $section = $this->section->find($id);
        if (!$section) {
            Flash::error('Section not found');
            return redirect(route('sections.index'));
        }
        $data = $request->validate(Section::$rules);

        $section->update($data);

        Flash::success('Section updated successfully.');
        return redirect(route('sections.index'));
    }

    public function destroy($id)
    {
        $section = $this->section->find($id);
        
        if (!$section) {
            Flash::error('Section not found');
            return redirect(route('sections.index'));
        }
        
        $section->delete();

        Flash::success('Section deleted successfully.');
        return redirect(route('sections.index'));
    }
}
