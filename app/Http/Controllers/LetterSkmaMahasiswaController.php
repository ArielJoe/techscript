<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Student;
<<<<<<< HEAD
use App\Models\User;
use App\Notifications\LetterNotification;
=======
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
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
        $search = $request->search;

        $letters = Letter::where('Student_id', 'STU' . Auth::id())
            ->where('category', 'SKMA')
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
<<<<<<< HEAD
                3 => 'Disetujui'
=======
                3 => 'Diterima'
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
            };
            $letter->file_path = $letter->file_path;
            // Get student data
            $letter->full_name = $student->full_name;
            $letter->nrp = $student->id;
            $letter->address = $student->address;
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
<<<<<<< HEAD

=======
        
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
        return view('/mahasiswa/skma/create')->with('students', $students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'purpose'   => 'required|string|max:100'
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
            'purpose' => $request->purpose,
            'status'   => 2,
            'Student_id' => 'STU' . Auth::id(),
            'Major_id' => $majorId,
        ]);
<<<<<<< HEAD

        // Send notification to Kaprodi
        $kaprodi = User::where('role', 2)
            ->where('Major_id', $majorId)
            ->first();

        if ($kaprodi) {
            $message = 'Mahasiswa dengan ID: STU' . $userId . ' mengajukan permohonan SKMA';
            $kaprodi->notify(new LetterNotification($message));
        }

=======
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
        return redirect()->route('mahasiswa.skma.index')->with(['success' => 'SKMA telah diajukan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $letters = Letter::where('Student_id', 'STU' . Auth::id())
<<<<<<< HEAD
            ->where('category', 'SKMA')->latest()->get();
=======
                        ->where('category', 'SKMA')->latest()->get();
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
        foreach ($letters as $letter) {
            $letter->date_indo = Carbon::parse($letter->created_at)->locale('id')->translatedFormat('d F Y');
            $letter->status_text = match ($letter->status) {
                1 => 'Ditolak',
                2 => 'Diproses',
<<<<<<< HEAD
                3 => 'Disetujui'
=======
                3 => 'Diterima'
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
            };
        }

        return view('/mahasiswa/skma/show')->with('letters', $letters);
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit($id)
    {
        $letter = Letter::findOrFail($id);
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

        // Ganti nama fungsi jadi unik
        function calculateStudentSemester($enrollmentDate)
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
                $student->semester = calculateStudentSemester($student->enrollment_date);
            } else {
                $student->semester = null;
            }
            return $student;
        }, $students);

        return view('mahasiswa.skma.edit')->with('letter', $letter)
            ->with('students', $students);
=======
    public function edit(Letter $letter)
    {
        // Not used
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        $letter = Letter::findOrFail($id);

        $request->validate([
            'purpose' => 'required|string|max:255',
        ]);

        // Update field yang diperbolehkan
        $letter->purpose = $request->purpose;
        $letter->save();

        return redirect()->route('mahasiswa.skma.index')
            ->with('success', 'Pengajuan berhasil diupdate');
=======
    public function update(Request $request, Letter $letter)
    {
        // Not used
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy($id)
    {
        // Decode dulu karena mungkin berisi karakter seperti "/"
        $decodedLetter = urldecode($id);

        // Cari berdasarkan 'nomor_surat' atau field unik yang sesuai
        $letter = Letter::where('id', $decodedLetter)->first();
        
        //delete transaksi
        $letter->delete();

        //redirect to index
        return redirect()->route('mahasiswa.skma.index')->with(['success' => 'Pengajuan berhasil dibatalkan']);
=======
    public function destroy(Letter $letter)
    {
        // Not used
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    }
}
