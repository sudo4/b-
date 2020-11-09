<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\member;
use App\Models\company;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::where('kehadiran', 'hadir')->get();
        $company = Company::all();
        return view('absensi.index', compact('member', 'company'));
    }

    public function history()
    {
        $absensi = Absensi::all();
        return view('history.index', compact('absensi'));
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
        $this->validate($request, [
            'nama',
            'member_id',
            'absensi',
            'komisi',
            'confirm_by',
            'komisi_confirm'
        ]);
        
        $member = Member::where('kehadiran', 'hadir');
        $absensi = Absensi::all();
        db::beginTransaction();

        try {
            $absensi = Absensi::create([
                'nama' => $request->nama,
                'member_id' => $request->member_id,
                'absensi' => $request->absensi,
                'komisi' => $request->komisi,
                'confirm_by' => $request->confirm_by,
                'komisi_confirm' => $request->komisi_confirm,
            ]);
            db::commit();
            return view('/home');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::where('uuid', $id)->first();  
        $company = Company::all();
        return view('absensi.show', compact('member', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this ->validate($request,[
            'absensi',
            'komisi',
            'confirm_by',
            'confirm_at',
            'komisi_confirm',
            'komisi_confirm_at'
        ]);

        $member = Member::where('kehadiran', 'hadir');
        DB::beginTransaction();

        try {
            if($request->has('absensi')) {
                $data = [
                    'absensi' => $request->absensi,
                    'confirm_by' => Auth::user()->name,
                    'confirm_at' => now(),

                ];
            }elseif($request->has('komisi')){
                $data = [
                    'komisi' => $request->komisi,
                    'komisi_confirm' => Auth::user()->name,
                    'komisi_confirm_at' => now(),
                ];
            }
                
            

            $member->update($data);
            DB::commit();

            return redirect('/home');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect(url()->previous());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(absensi $absensi)
    {
        //
    }
}
