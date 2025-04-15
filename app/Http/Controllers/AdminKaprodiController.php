<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kaprodi;
use App\Models\User;
use App\Models\Major;
use Illuminate\Support\Facades\Hash;

class AdminKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $kaprodis = Kaprodi::query()
            ->join('user', 'kaprodi.User_id', '=', 'user.id')
            ->select('kaprodi.*', 'user.email', 'user.Major_id')
            ->when($search, function ($query, $search) {
                return $query->where('kaprodi.id', 'like', "%{$search}%")
                    ->orWhere('kaprodi.full_name', 'like', "%{$search}%")
                    ->orWhere('user.email', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('admin.kaprodi.index', compact('kaprodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::all(); // pastikan kamu punya model Major
        return view('admin.kaprodi.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'        => 'required|string|max:7',
            'full_name' => 'required|string|max:150',
            'email'     => 'required|email|max:100',
            'password'  => 'required|max:100',
            'Major_id'  => 'required'
        ]);

        Kaprodi::create([
            'id'            => 'KP' . $request->id,
            'full_name'     => $request->full_name,
            'User_id'       => $request->id
        ]);

        User::create([
            'id'            => $request->id,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => 2,
            'Major_id'      => $request->Major_id
        ]);
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
    public function edit($id)
    {
        $kaprodi = Kaprodi::with('user')->findOrFail($id);
        $majors = Major::all();

        return view('admin.kaprodi.edit', compact('kaprodi', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kaprodi = Kaprodi::with('user')->findOrFail($id);
        $user = $kaprodi->user;

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'Major_id' => 'required|exists:majors,id',
        ]);

        // Update user
        $user->email = $request->email;
        $user->Major_id = $request->Major_id;
        $user->save();

        // Update kaprodi
        $kaprodi->full_name = $request->full_name;
        $kaprodi->save();

        return redirect()->route('admin.kaprodi.index')->with('success', 'Data kaprodi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
