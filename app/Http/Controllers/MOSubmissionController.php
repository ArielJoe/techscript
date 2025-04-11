<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class MOSubmissionController extends Controller
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
        return view('mo.submission.index')->with('letters', $letters);
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
    public function update(Request $request, $id)
    {
        $letter = Letter::findOrFail($id);

        // Handle file upload if a file is present
        if ($request->hasFile('letter_file')) {
            // Delete old file if exists
            // if ($letter->file_path && Storage::disk('public')->exists($letter->file_path)) {
            //     Storage::disk('public')->delete($letter->file_path);
            // }

            // Get the file extension
            $extension = $request->file('letter_file')->getClientOriginalExtension();

            // Create the filename using letter reference number, replacing / with _
            $filename = str_replace('/', '_', $letter->id) . '.' . $extension;

            // Store the file in the uploads directory with the custom filename
            $path = $request->file('letter_file')->storeAs('uploads', $filename, 'public');

            $letter->file_path = $path;
        }

        // Handle other updates to the letter
        // ...

        $letter->save();

        return redirect()->route('mo.submission.index')
            ->with('success', 'Letter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadFile(Request $request, $letterId)
    {
        // Validate the uploaded file
        $request->validate([
            'letter_file' => 'required|mimes:pdf|max:5120', // max 5MB
        ]);

        // Find the letter
        $letter = Letter::findOrFail($letterId);

        // Handle file upload
        if ($request->hasFile('letter_file')) {
            // Delete old file if exists
            // if ($letter->file_path && Storage::disk('public')->exists($letter->file_path)) {
            //     Storage::disk('public')->delete($letter->file_path);
            // }

            // Get the file extension
            $extension = $request->file('letter_file')->getClientOriginalExtension();

            // Create the filename using letter reference number, replacing / with _
            $filename = str_replace('/', '_', $letter->id) . '.' . $extension;

            // Store the file in the uploads directory with the custom filename
            $path = $request->file('letter_file')->storeAs('uploads', $filename, 'public');

            // Update the letter record
            $letter->file_path = $path;
            $letter->save();

            return redirect()->route('mo.submission.index')
                ->with('success', 'File berhasil diupload');
        }

        return back()->with('error', 'Something went wrong');
    }
}
