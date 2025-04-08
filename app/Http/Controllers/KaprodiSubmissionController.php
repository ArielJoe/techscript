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

class KaprodiSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $letters = Letter::where('Major_id', 'FTRC-001')
            ->where('status', 2)
            ->whereNull('accepted_by')
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
        return view('kaprodi.submission.index')->with('letters', $letters);
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
    public function update(Request $request, Letter $letter)
    {
        // Dapatkan nama kaprodi (bisa disesuaikan kalau tidak dari Auth)
        $kaprodi = Kaprodi::where('User_id', Auth::id())->first();

        if ($request->approve === 'yes') {
            $letter->update([
                'status' => 3,
                'accepted_by' => $kaprodi->name,
            ]);

            return redirect()->route('kaprodi.submission.index')->with('success', 'Surat telah disetujui');
        } else if ($request->approve === 'no') {
            $letter->update([
                'status' => 1
            ]);

            return redirect()->route('kaprodi.submission.index')->with('success', 'Surat telah ditolak');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
