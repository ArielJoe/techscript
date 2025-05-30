<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kaprodi;

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
            ->select('kaprodi.*', 'user.email')
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
    public function update(Request $request, string $id)
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
