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

class LetterSklMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $letter = Letter::join('Major', 'Letter.Major_id', '=', 'Major.id')
            ->where('Letter.Student_id', 'STU' . Auth::id())
            ->where('category', 'SKL')
            ->select(
                'Letter.*',
                'Major.name as major_name'
            )
            ->first();
        $student = Student::where('User_id', Auth::id())->first();

        if ($letter) { // Pastikan letter tidak null sebelum akses properti
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
            $letter->graduation_date_indo = Carbon::parse($student->graduation_date)->locale('id')->translatedFormat('d F Y');
        }
        return view('/mahasiswa/skl/index')->with('letter', $letter);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::where('User_id', Auth::id())->first() ?? null;

<<<<<<< HEAD
        $major = DB::table('User')
            ->join('Major', 'User.Major_id', '=', 'Major.id')
            ->where('User.id', Auth::id())
            ->select('Major.name as major_name')
            ->first();

        if ($student) {
            $student->major = $major->major_name;
=======
        $letter = Letter::join('Major', 'Letter.Major_id', '=', 'Major.id')
            ->where('Letter.Student_id', 'STU' . Auth::id())
            ->select('Letter.Major_id', 'Major.name as major_name')
            ->distinct()
            ->first();

        if ($student) {
            $student->major = $letter->major_name;
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
            $student->status_text = match ($student->status) {
                1 => 'Aktif',
                2 => 'Cuti',
                3 => 'Mengundurkan Diri'
            };
        }

        return view('/mahasiswa/skl/create')->with('student', $student);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $request->validate([
            'graduation_date'   => 'required|date'
        ]);

        function generateLetterNumber()
        {
            $letterCategory = 'SKL';
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
            'category' => 'SKL',
            'status'   => 2,
            'Student_id' => 'STU' . Auth::id(),
            'Major_id' => $majorId,
        ]);

        Student::updateOrCreate(
            ['id' => 'STU' . $userId], // Kriteria pencarian
            ['graduation_date' => $request->graduation_date] // Data yang akan diupdate
        );

        return redirect()->route('mahasiswa.skl.index')->with(['success' => 'SKL telah diajukan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter $letter)
    {
        $letter = Letter::where('Student_id', 'STU' . Auth::id())
            ->where('category', 'SKL')
            ->join('Major', 'Letter.Major_id', '=', 'Major.id')
            ->where('Letter.Student_id', 'STU' . Auth::id())
            ->select('Letter.Major_id', 'Major.name as major_name')
            ->distinct()->first();
        if ($letter) {
            $letter->graduation_date_indo = Carbon::parse($letter->graduation_date)->locale('id')->translatedFormat('d F Y');
            $letter->status_text = match ($letter->status) {
                1 => 'Ditolak',
                2 => 'Diproses',
<<<<<<< HEAD
                3 => 'Disetujui'
            };
        }


        // Send notification to Kaprodi
        $user = DB::table('User')->where('id', Auth::id())->first();
        $majorId = $user->Major_id;
        $kaprodi = User::where('role', 2)
            ->where('Major_id', $majorId)
            ->first();

        if ($kaprodi) {
            $message = 'Mahasiswa dengan ID: STU' . Auth::id() . ' mengajukan permohonan SKL';
            $kaprodi->notify(new LetterNotification($message));
        }

        return view('mahasiswa.skl.show')->with('letter', $letter);
=======
                3 => 'Diterima'
            };
        }

        return view('/mahasiswa/skma/show')->with('letter', $letter);
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit($id)
    {
        $student = Student::where('User_id', Auth::id())->first() ?? null;

        $major = DB::table('User')
            ->join('Major', 'User.Major_id', '=', 'Major.id')
            ->where('User.id', Auth::id())
            ->select('Major.name as major_name')
            ->first();

        if ($student) {
            $student->major = $major->major_name;
            $student->status_text = match ($student->status) {
                1 => 'Aktif',
                2 => 'Cuti',
                3 => 'Mengundurkan Diri'
            };
        }

        $letter = Letter::findOrFail($id);

        return view('mahasiswa.skl.edit')->with('student', $student)
            ->with('letter', $letter);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'graduation_date' => 'required|date',
        ]);

        $letter = Letter::findOrFail($id);

        // Cari student dari letter
        $student = Student::findOrFail($letter->Student_id);

        // Update graduation_date di student
        $student->graduation_date = $request->graduation_date;
        $student->save();

        return redirect()->route('mahasiswa.skl.index')
            ->with('success', 'Pengajuan berhasil diupdate');
=======
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
        return redirect()->route('mahasiswa.skl.index')->with(['success' => 'Pengajuan berhasil dibatalkan']);
=======
    public function destroy(Letter $letter)
    {
        //
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    }
}
