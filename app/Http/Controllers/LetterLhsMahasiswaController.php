<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Exception;
use Carbon\Carbon;

class LetterLhsMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $letters = Letter::where('Student_id', 'STU' . Auth::id())
            ->where('category', 'LHS')
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%");
            })
            ->latest()->paginate(10);
        $student = Student::where('User_id', Auth::id())->first();

        foreach ($letters as $letter) {
            $letter->date_indo = Carbon::parse($letter->created_at)->locale('id')->translatedFormat('d F Y');
            $letter->status_text = match ($letter->status) {
                1 => 'Ditolak',
                2 => 'Diproses',
                3 => 'Diterima'
            };
            $letter->file_path = $letter->file_path;
            // Get student data
            $letter->full_name = $student->full_name;
            $letter->nrp = $student->id;
            $letter->address = $student->address;
        }

        return view('/mahasiswa/lhs/index')->with('letters', $letters);
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
                Major.name AS program_studi
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
        
        return view('/mahasiswa/lhs/create')->with('students', $students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $request->validate([
            'purpose'   => 'required|string|max:100'
        ]);

        function generateLetterNumber()
        {
            $letterCategory = 'LHS';
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
            'category' => 'LHS',
            'purpose' => $request->purpose,
            'status'   => 2,
            'Student_id' => 'STU' . Auth::id(),
            'Major_id' => $majorId,
        ]);
        return redirect()->route('mahasiswa.lhs.index')->with(['success' => 'LHS telah diajukan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter $letter)
    {
        $letters = Letter::where('Student_id', 'STU' . Auth::id())
                        ->where('category', 'LHS')->latest()->get();
        foreach ($letters as $letter) {
            $letter->date_indo = Carbon::parse($letter->created_at)->locale('id')->translatedFormat('d F Y');
            $letter->status_text = match ($letter->status) {
                1 => 'Ditolak',
                2 => 'Diproses',
                3 => 'Diterima'
            };
        }

        return view('/mahasiswa/lhs/show')->with('letters', $letters);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Letter $letter)
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
    public function destroy(Letter $letter)
    {
        //
    }
}