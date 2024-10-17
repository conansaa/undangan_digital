<?php

namespace App\Http\Controllers;

use App\Models\GenderRef;
use Illuminate\Http\Request;

class GenderRefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = GenderRef::all();
        return response()->json($genders);
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
        $gender = GenderRef::create($request->all());
        return response()->json($gender);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gender = GenderRef::find($id);
        return response()->json($gender);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gender = GenderRef::find($id);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gender = GenderRef::find($id);
        $gender->update($request->all());
        return response()->json($gender);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gender = GenderRef::find($id);
        $gender->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
