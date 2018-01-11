<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengarang;
use Excel;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $pengarangs = Pengarang::latest()->search($search)->paginate(5);

        return view('pengarang.index', compact('pengarangs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengarangs = Pengarang::all();

        return view('pengarang.create', compact('pengarangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'pengarang' => 'required',
            'address' => 'required',

        ]);

        Pengarang::create([
            'pengarang' => request('pengarang'),
            'address' => request('address'),
        ]);

        return redirect()->route('pengarang.index')->withInfo('Data Pengarang Ditambahkan');
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
    public function edit(Pengarang $pengarang)
    {
        return view('pengarang.edit', compact('pengarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Pengarang $pengarang)
    {

        $pengarang->update([
            'pengarang' => request('pengarang'),
            'address' => request('address'),
        ]);

        return redirect()->route('pengarang.index')->withInfo('Edit Data Pengarang Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengarang $pengarang)
    {
        $pengarang->delete();
        return redirect()->route('pengarang.index')->withDanger('Data Terhapus');
    }

    public function pengarangExport()
    {
        $pengarang = Pengarang::select('pengarang', 'address')->get();

        return Excel::create('data_pengarang', function($excel) use ($pengarang) {
            $excel->sheet('mysheet', function($sheet) use ($pengarang) {
                $sheet->fromArray($pengarang);
            });
        })->download('xls');
    }
}
