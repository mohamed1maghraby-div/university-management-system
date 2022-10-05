<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facultie;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacultieController extends Controller
{
    private $facultie;

    public function __construct(Facultie $facultie)
    {
        $this->facultie = $facultie;
    }
    
    public function index()
    {
        $faculties = $this->facultie->paginate(10);

        return view('pages.facultie.index')
            ->with('faculties', $faculties);
    }
    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        $data = $request->validate(Facultie::$rules);

        Facultie::create($data);

        Flash::success('Facultie saved successfully.');

        return redirect()->route('facultie.index')->with([
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
        $facultie = $this->facultie->find($id);
        if (!$facultie) {
            Flash::error('Facultie not found');
            return redirect(route('faculties.index'));
        }
        $data = $request->validate(Facultie::$rules);

        $facultie->update($data);

        Flash::success('Facultie updated successfully.');
        return redirect(route('facultie.index'));
    }

    public function destroy($id)
    {
        $facultie = $this->facultie->find($id);
        
        if (!$facultie) {
            Flash::error('Facultie not found');
            return redirect(route('facultie.index'));
        }
        
        $facultie->delete();

        Flash::success('Facultie deleted successfully.');
        return redirect(route('facultie.index'));
    }
}
