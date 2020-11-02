<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use DB;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitor = Visitor::all();
        return view('visitor.index', compact('visitor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitor.create');
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
            'nik',
            'phone',
            'konfirmasi',
        ]);

        DB::beginTransaction();

        try {
            $visitor = visitor::Create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'phone' => $request->phone,
                'konfirmasi' => $request->konfirmasi,
            ]);

            DB::commit();
            return redirect('/visitor');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect(url()->previous()); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visitor = Visitor::where('uuid', $id)->first();
        return view('visitor.show', compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor = Visitor::where('uuid',$id)->first();
        return view('visitor.edit', compact('visitor'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama',
            'nik',
            'phone',
            'konfirmasi',
            
        ]);

        $visitor = Visitor::where('uuid', $id)->first();

        DB::beginTransaction();

        try {

            if ($request->has('konfirmasi')) {
                $data = [
                    'konfirmasi' => $request->konfirmasi
                ];
            } else {
                $data = [
                    'nama' => $request->nama,
                    'nik' => $request->nik,
                    'phone' => $request->phone,
                    'konfirmasi' => $request->konfirmasi,
                ];
            }
            
            $visitor->update($data);
            DB::commit();

            return redirect('/visitor');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect(url()->previous());
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
    
    
}

