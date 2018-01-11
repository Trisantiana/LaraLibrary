<?php

namespace App\Http\Controllers;

use App\Penerbit;
use Excel;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $penerbits = Penerbit::latest()->search($search)->paginate(5);

        return view('penerbit.index', compact('penerbits', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbits = Penerbit::all();

        return view('penerbit.create', compact('penerbit.create'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'penerbit' => 'required',
            'thn_terbit' =>'required',
        ]);

        Penerbit::create([
            'penerbit' => $request->penerbit,
            'thn_terbit' => $request->thn_terbit
        ]);

        return redirect()->route('penerbit.index')->withInfo('Data Penerbit Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        $penerbit->update([
            'penerbit' => $request->penerbit,
            'thn_terbit' => $request->thn_terbit
        ]);

        return redirect()->route('penerbit.index')->withInfo('Edit data penerbit telah berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();

        return redirect()->route('penerbit.index')->withDanger('Data Terhapus');
    }

    public function penerbitExport()
    {
        $penerbit = Penerbit::select('penerbit', 'thn_terbit')->get();

        return Excel::create('data_penerbit', function($excel) use ($penerbit){
            $excel->sheet('mysheet', function($sheet) use ($penerbit){
                $sheet->fromArray($penerbit);
            });
        })->download('xls');
    }

    public function printPreview(Penerbit $penerbits)
    {
        $penerbits = Penerbit::All();
        return view('penerbit.printPreview', compact('penerbits'));
    }


}
