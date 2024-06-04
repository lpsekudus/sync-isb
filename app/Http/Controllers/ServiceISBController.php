<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceISB;

class ServiceISBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServiceISB::all();
        return view('serviceisb.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('serviceisb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ServiceISB::create($request->all());
        return redirect()->route('serviceisb.index');
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
    public function edit(ServiceISB $serviceisb)
    {
        return view('serviceisb.edit', compact('serviceisb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceISB $serviceisb)
    {
        $serviceisb->update($request->all());
        return redirect()->route('serviceisb.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceISB $serviceisb)
    {
        $serviceisb->delete();
        return redirect()->route('serviceisb.index')->with('success', 'Data berhasil dihapus');
    }
}
