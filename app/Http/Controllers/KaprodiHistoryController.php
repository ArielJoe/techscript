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

class KaprodiHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $major = DB::table('User')
            ->join('Major', 'User.Major_id', '=', 'Major.id')
            ->where('User.id', Auth::id())
            ->select('Major.id as major_id')
            ->first();

        $letters = Letter::where(function ($query) use ($major) {
            $query->where('Major_id', $major->major_id)
                ->orWhereIn('status', [1, 3]);
        })
            ->whereNotNull('accepted_by')
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
            $letter->status_text = match ($letter->status) {
                1 => 'Ditolak',
                2 => 'Diproses',
                3 => 'Disetujui'
            };
        }

        return view('kaprodi.history.index')->with('letters', $letters);
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
    public function show(Request $request)
    {
        return view('/kaprodi/submission/show');
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
