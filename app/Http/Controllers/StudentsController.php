<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\rayons;
use App\Models\rombels;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = students::all();
        $rayons = rayons::all();
        $rombels = rombels::all();
        return view('student.index', compact('students', 'rayons', 'rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayons = rayons::all();
        $rombels = rombels::all();
        return view('student.create', compact('rayons', 'rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $students = students::find($id);
        $rayons = rayons::all();
        $rombels = rombels::all();

        return view('student.edit', compact('students', 'rayons', 'rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, students $students, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('student.index')->with('success', 'Berhasil menambah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        students::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');    
    }

    public function search(Request $request)
    {
            $keyword = $request->input('search');

            $students = Students::where('nis', 'like', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")
                ->orWhereHas('rombel', function ($query) use ($keyword) {
                    $query->where('rombel', 'like', "%$keyword%");
                })
                ->orWhereHas('rayon', function ($query) use ($keyword) {
                    $query->where('rayon', 'like', "%$keyword%");
                })
                ->get();
    
            return view('student.index', compact('students'));
    }
}