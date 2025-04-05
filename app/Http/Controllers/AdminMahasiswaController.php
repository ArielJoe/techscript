<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $students = Student::query()
            ->join('user', 'student.User_id', '=', 'user.id')
            ->select('student.*', 'user.email')
            ->when($search, function ($query, $search) {
                return $query->where('student.id', 'like', "%{$search}%")
                    ->orWhere('student.full_name', 'like', "%{$search}%")
                    ->orWhere('user.email', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('admin.mahasiswa.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
