<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Book;
use Excel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        return view('member.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            'name' => 'required',
            'gender' => 'required',
            'ttl' => 'required',
            'pekerjaan' => 'required',
            'address' => 'required',

        ]);

        Member::create([

            'name' => request('name'),
            'gender' => request('gender'),
            'ttl' => request('ttl'),
            'pekerjaan' => request('pekerjaan'),
            'address' => request('address'),


        ]);

        return redirect()->route('member.index')->withInfo('Data Anggota telah Dtambahkan!') ;
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
    public function edit(Member $member)
    {
        // $member = Anggota::find($id);

        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Member $member)
    {
        // $member = Anggota::find($id);

        $member->update([
            'name' => request('name'),
            //'jenkel' => request('jenkel'),
            'ttl' => request('ttl'),
            'pekerjaan' => request('pekerjaan'),
            'address' => request('address'),
        ]);

        return redirect()->route('member.index')->withInfo('Edit Data Buku Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('member.index')->withDanger('Data Terhapus!');
    }

    public function memberStore()
    {
        $this->validate(request(),[
            'name' => 'required',
            'gender' => 'required',
            'ttl' => 'required',
            'pekerjaan' => 'required',
            'address' => 'required',

        ]);

        Member::create([

            'name' => request('name'),
            'gender' => request('gender'),
            'ttl' => request('ttl'),
            'pekerjaan' => request('pekerjaan'),
            'address' => request('address'),


        ]);

        return redirect()->route('member.member')->withInfo('Anda Telah Berhasil Menjadi Anggota Perpustakaan!') ;
    }

    public function member()
    {
        $members = Member::latest()->paginate(10);
        return view('member.member', compact('members'));
    }

    public function convertdate()
    {
        date_default_timezone_set('Asia/Jakarta');

        $date = date('dmy');
        return $date;
    }

    public function autonumber($member, $primary, $prefix)
    {
        $members = table('members')->select(DB::raw('MAX(RIGHT(' .$primary. ', 5)'));
    }

    public function memberExport()
    {
        $member = Member::select('id', 'name','gender', 'ttl', 'pekerjaan', 'address', 'created_at')->get();

        return Excel::create('data_anggota', function($excel) use ($member) {
            $excel->sheet('mysheet', function($sheet) use ($member) {
                $sheet->fromArray($member);
            });
        })->download('xls');
    }
}
