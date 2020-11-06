<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Company;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon;

class MembersController extends Controller
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
        return view('profile.index', compact('member', 'company'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::where('uuid', $id)->first();  
        $company = Company::all();
        return view('profile.show', compact('member', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this ->validate($request,[
            'absensi'
        ]);

        $member = Member::where('kehadiran', 'hadir');
        DB::beginTransaction();

        try {
            if($request->has('absensi')) {
                $data = [
                    'absensi' => $request->absensi,
                    'confirm_by' => Auth::user()->name,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
