<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\Facultie;
use Illuminate\Http\Request;

class FacultieController extends AppBaseController
{
    /** @var FacultieRepository $facultieRepository*/
    private $facultie;

    public function __construct(Facultie $facultie)
    {
        $this->facultie = $facultie;
    }

    /**
     * Display a listing of the Facultie.
     */
    public function index()
    {
        $faculties = $this->facultie->paginate(10);
        return view('pages.facultie.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new Facultie.
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created Facultie in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(Facultie::$rules);
return dd($data);
        $facultie = $this->facultieRepository->create($data);

        Flash::success('Facultie saved successfully.');

        return redirect()->route('pages.facultie.index');
    }

    /**
     * Display the specified Facultie.
     */
    public function show($id)
    {
        $facultie = $this->facultieRepository->find($id);

        if (empty($facultie)) {
            Flash::error('Facultie not found');

            return redirect(route('faculties.index'));
        }

        return view('faculties.show')->with('facultie', $facultie);
    }

    /**
     * Show the form for editing the specified Facultie.
     */
    public function edit($id)
    {
        $facultie = $this->facultieRepository->find($id);

        if (empty($facultie)) {
            Flash::error('Facultie not found');

            return redirect(route('faculties.index'));
        }

        return view('faculties.edit')->with('facultie', $facultie);
    }

    /**
     * Update the specified Facultie in storage.
     */
    public function update($id, UpdateFacultieRequest $request)
    {
        $facultie = $this->facultieRepository->find($id);

        if (empty($facultie)) {
            Flash::error('Facultie not found');

            return redirect(route('faculties.index'));
        }

        $facultie = $this->facultieRepository->update($request->all(), $id);

        Flash::success('Facultie updated successfully.');

        return redirect(route('faculties.index'));
    }

    /**
     * Remove the specified Facultie from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $facultie = $this->facultieRepository->find($id);

        if (empty($facultie)) {
            Flash::error('Facultie not found');

            return redirect(route('faculties.index'));
        }

        $this->facultieRepository->delete($id);

        Flash::success('Facultie deleted successfully.');

        return redirect(route('faculties.index'));
    }
}
