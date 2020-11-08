<?php

namespace App\Http\Controllers;

use App\Models\Komisi;
use Illuminate\Http\Request;

class KomisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::where('absensi', 'masuk');
        $company = Company::all();
        return view('komisi.index', compact('index'));
    }

    public function komisi1() {
        $member = Member::where('komisi', '1');
        $company = Company::all();
        return view('komisi.komisi1', compact('member', 'company'));
    }

    public function komisi2() {
        $$member = Member::where('komisi', '2');
        $company =  Company::all();
        return view('komisi.komisi2', compact('member', 'company'));
    }

    public function komisi3() {
        $$member = Member::where('komisi', '3');
        $company =  Company::all();
        return view('komisi.komisi2', compact('member', 'company'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function show(Komisi $komisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Komisi $komisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komisi $komisi)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komisi $komisi)
    {
        //
    }
}
