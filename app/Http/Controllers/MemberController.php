<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Company;
use Illuminate\Http\Request;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        $member = Member::paginate(20);
        
        return view('member.index', compact('company', 'member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $company = Company::all();
        $member = Member::all();
        return view('member.create', compact('member', 'company'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama',
            'company_id',
            'no_hp',
            'photo',
            'kehadiran',
        ]);

        $photo = $request->photo;
        $new_photo = time().$photo->getClientOriginalName();

        DB::beginTransaction();

        try {
            $member = Member::create([
                'nama' => $request->nama,
                'company_id' => $request->company_id,
                'no_hp' => $request->no_hp,
                'photo' => 'public/storage/photo/'.$new_photo,
                'kehadiran' => $request->kehadiran,
            ]);

            $photo->move('public/storage/photo/', $new_photo);

            DB::commit();
            
            return redirect('/member')->with('sucess', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect(url()->previous());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::where('uuid', $id)->first();
        $company = Company::all();
        return view('member.show', compact('member', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    
     
    
     public function edit($id)
    {
        $member = Member::where('uuid', $id)->first();
        $company = Company::all();
        return view('member.edit', compact('member','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'nama',
            'company_id',
            'no_hp',
            'photo',
            'kehadiran',
        ]);

        $member = Member::where('uuid', $id)->first();
        DB::beginTransaction();

        try {
            
            if($request->has('photo')) {
                $photo = $request->photo;
                $new_photo = time().$photo->getClientOriginalName();
                $photo->move('public/storage/photo/', $new_photo);

                $data = [
                    'nama' => $request->nama,
                    'company_id' => $request->company_id,
                    'no_hp' => $request->no_hp,
                    'photo' => 'public/storage/photo/'.$new_photo,
                ];
            }elseif ($request->has('kehadiran')) {
                $data = [
                    'kehadiran' => $request->kehadiran,
                ];
            }

            else {
                $data = [
                    'nama' => $request->nama,
                    'company_id' => $request->company_id,
                    'no_hp' => $request->no_hp,  
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
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */

   

    public function destroy(Member $member)
    {
        //
    }
}
