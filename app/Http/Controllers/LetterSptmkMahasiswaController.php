<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Exception;
use Carbon\Carbon;

class LetterSptmkMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $letters = Letter::where('Student_id', 'STU' . Auth::id())
            ->where('category', 'SPTMK')
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

        return view('/mahasiswa/sptmk/index')->with('letters', $letters);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();

        $major = DB::table('User')
            ->join('Major', 'User.Major_id', '=', 'Major.id')
            ->where('User.id', $userId)
            ->select('Major.id as major_id', 'Major.name as major_name')
            ->first();

        $courses = DB::table('Enrollment')
            ->join('Course', 'Enrollment.Course_id', '=', 'Course.id')
            ->join('Student', 'Enrollment.Student_id', '=', 'Student.id')
            ->where('Student.User_id', $userId) // Menyesuaikan dengan user yang sedang login
            ->select('Course.id as course_id', 'Course.name as course_name', 'Course.period')
            ->get();

        return view('/mahasiswa/sptmk/create')->with('courses', $courses)->with('major', $major);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $request->validate([
            'selected_course'   => 'required|string|max:50',
            'purpose'           => 'required|string|max:100',
            'topic'             => 'required|string|max:100',
            'addressed_to'      => 'required|string|max:200',
            'list_description'  => 'required|string|max:200'
        ]);

        function generateLetterNumber()
        {
            $letterCategory = 'SPTMK';
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
            'category' => 'SPTMK',
            'selected_course' => $request->selected_course,
            'purpose' => $request->purpose,
            'topic' => $request->topic,
            'addressed_to' => $request->addressed_to,
            'list_description' => $request->list_description,
            'status'   => 2,
            'Student_id' => 'STU' . Auth::id(),
            'Major_id' => $majorId,
        ]);
        return redirect()->route('mahasiswa.sptmk.index')->with(['success' => 'SPTMK telah diajukan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter $letter)
    {
        //
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
