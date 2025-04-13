<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Student;
use App\Models\Kaprodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Exception;
use Carbon\Carbon;

class MOHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $letters = Letter::where('Major_id', 'FTRC-001')
            ->where('status', 3)
            ->whereNotNull('accepted_by')
            ->whereNotNull('file_path')
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%");
            })
            ->latest()->paginate(10);

        $student = Student::join('letter', 'letter.Student_id', '=', 'student.id')
            ->where('letter.Major_id', 'FTRC-001')
            ->select('student.*')
            ->first();

        foreach ($letters as $letter) {
            $letter->date_indo = Carbon::parse($letter->created_at)->locale('id')->translatedFormat('d F Y');
            // Get student data
            $letter->full_name = $student->full_name;
            $letter->nrp = $student->id;
            $letter->address = $student->address;
        }
        return view('mo.history.index')->with('letters', $letters);
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
    public function show($id)
    {
        $letter = Letter::findOrFail($id);

        return view('mo.history.show', compact('letter'));
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
    public function update(Request $request, Letter $letter)
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
