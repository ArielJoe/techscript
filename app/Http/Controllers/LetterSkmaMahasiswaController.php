<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Exception;
use Carbon\Carbon;

class LetterSkmaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $letters = Letter::where('Student_id', 'STU' . Auth::id())->latest()->get();

        foreach ($letters as $letter) {
            $letter->tanggal = Carbon::parse($letter->created_at)->locale('id')->translatedFormat('d F Y');
            $letter->status_text = match ($letter->status) {
                1 => 'Ditolak',
                2 => 'Diproses',
                3 => 'Diterima'
            };
            $letter->file_path = $letter->file_path ?? 'Sedang diproses';
        }

        return view('/mahasiswa/skma/index')->with('letters', $letters);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        $students = DB::select("
        SELECT 
            Student.id AS student_id,
            Student.full_name,
            Course.period AS period,
            Major.name AS program_studi,
            Student.address,
            Student.enrollment_date
        FROM 
            Student
        LEFT JOIN 
            Enrollment ON Student.id = Enrollment.Student_id
        LEFT JOIN 
            Course ON Enrollment.Course_id = Course.id
        LEFT JOIN 
            Major ON Course.Major_id = Major.id
        WHERE 
            Student.user_id = ?
    ", [$userId]);

        function calculateSemester($enrollmentDate)
        {
            $enrollment = new DateTime($enrollmentDate);
            $currentDate = new DateTime(now());
            $interval = $enrollment->diff($currentDate);
            $totalMonths = ($interval->y * 12) + $interval->m;
            $semesters = floor($totalMonths / 6) + 1;
            $enrollmentMonth = (int)$enrollment->format('m');
            $currentMonth = (int)$currentDate->format('m');
            if ($enrollmentMonth >= 7 && $currentMonth <= 6) {
                $semesters--;
            }
            return max(1, $semesters);
        }

        $students = array_map(function ($student) {
            if ($student->period && $student->enrollment_date) {
                $student->semester = calculateSemester($student->enrollment_date);
            } else {
                $student->semester = null;
            }
            return $student;
        }, $students);
        // dd($students);
        return view('/mahasiswa/skma/create')->with('students', $students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'purpose'   => 'required|max:100'
        ]);

        function generateLetterNumber()
        {
            $letterCategory = 'SKMA';
            $userId = Auth::id();

            $currentYear = Date('Y');
            $user = DB::table('User')->where('id', $userId)->first();
            if (!$user) {
                throw new Exception('User not found');
            }
            $majorId = $user->Major_id;
            $major = DB::table('Major')->where('id', $majorId)->first();
            if (!$major) {
                throw new Exception('Major not found');
            }
            $majorName = $major->name;
            $words = explode(' ', $majorName);
            $abbreviation = '';
            foreach ($words as $word) {
                $abbreviation .= strtoupper(substr($word, 0, 1));
            }
            $count = DB::table('Letter')
                ->where('category', $letterCategory)
                ->where('Major_id', $majorId)
                ->whereRaw('YEAR(created_at) = ?', [$currentYear])
                ->count();
            $letterNumber = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
            $fullLetterNumber = "$letterNumber/$letterCategory/$abbreviation/$currentYear";

            return $fullLetterNumber;
        }

        // create request letter
        $userId = Auth::id();
        $user = DB::table('User')->where('id', $userId)->first();
        if (!$user) {
            throw new Exception('User not found');
        }

        $majorId = $user->Major_id;
        Letter::create([
            'id'       => generateLetterNumber(),
            'category' => 'SKMA',
            'status'   => 2,
            'Student_id' => 'STU' . Auth::id(),
            'Major_id' => $majorId,
        ]);
        return redirect()->route('mahasiswa.skma.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Letter $letter)
    {
        // Not used
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Letter $letter)
    {
        // Not used
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letter $letter)
    {
        // Not used
    }
}
