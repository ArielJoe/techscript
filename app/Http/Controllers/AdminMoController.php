<?php

namespace App\Http\Controllers;

use App\Models\MO;
use Illuminate\Http\Request;

class AdminMoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $mos = MO::query()
            ->join('user', 'mo.User_id', '=', 'user.id')
            ->select('mo.*', 'user.email')
            ->when($search, function ($query, $search) {
                return $query->where('mo.id', 'like', "%{$search}%")
                    ->orWhere('mo.full_name', 'like', "%{$search}%")
                    ->orWhere('user.email', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('admin.mo.index', compact('mos'));
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
