<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Student;
use App\Models\Kaprodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Exception;
use Carbon\Carbon;
use App\Notifications\LetterNotification;

class KaprodiSubmissionController extends Controller
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

        $letters = Letter::where('Major_id', $major->major_id)
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

        // $kaprodi = Kaprodi::join('letter', 'letter.Kaprodi_id' = 'kaprodi.id')
        //     ->where('letter.Major_id', 'FTRC-001')
        //     ->select('kaprodi.*')
        //     ->first();

        foreach ($letters as $letter) {
            $letter->date_indo = Carbon::parse($letter->created_at)->locale('id')->translatedFormat('d F Y');
            // Get student data
            $letter->full_name = $student->full_name;
            $letter->nrp = $student->id;
            $letter->address = $student->address;
            $letter->status_text = match ($letter->status) {
                1 => 'ditolak',
                2 => 'diproses',
                3 => 'disetujui'
            };
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
        // Dapatkan nama kaprodi (bisa disesuaikan kalau tidak dari Auth)
        $kaprodi = Kaprodi::where('User_id', Auth::id())->first();

        if ($request->approve === 'yes') {
            $letter->update([
                'status' => 3,
                'accepted_by' => $kaprodi->full_name,
            ]);

            $majorId = $letter->Major_id;

            // Ambil semua MO di jurusan terkait
            $moUsers = User::where('role', 3)
                ->where('Major_id', $majorId)
                ->get();

            if ($moUsers->isNotEmpty()) {
                $message = 'Surat dengan nomor surat: ' . $letter->id . ' telah disetujui oleh Kaprodi';

                foreach ($moUsers as $mo) {
                    $mo->notify(new LetterNotification($message));
                }
            }


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
