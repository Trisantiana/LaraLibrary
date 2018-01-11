<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Borrow;
use Auth;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::all();

        return view('borrow.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Borrow $borrow)
    {
        $users = User::all();
        $books = Book::all();

        return view('borrow.create', compact('users', 'books'));
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
            'user_id' => 'required',
            'book_id' => 'required',
            'return_at' => 'required',
            'status' => 'required',
        ]);

        Borrow::create([
            'user_id' => request('user_id'),
            'book_id' => request('book_id'),
            'return_at' => request('return_at'),
            'status' => request('status'),
        ]);

        return redirect()->route('borrow.index');
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
    public function edit(Borrow $borrow)
    {
        return view('borrow.edit', compact('borrow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Borrow $borrow, Request $request)
    {
        $borrow->update([
            'user_id' => request('user_id'),
            'book_id' => request('book_id'),
            'created_at' => request('created_at'),
            'return_at' => request('return_at'),
            'status' => request('status'),
        ]);

        return redirect()->route('borrow.index', compact('borrow'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('borrow.index')->withDanger('Data Terhapus');


    }

    public function returnTrash()
    {
        $borrows = Borrow::all();

        $borrowTrashed = Borrow::onlyTrashed()->get();

        return view('borrow.return', compact('borrows', 'borrowTrashed'));
    }

    public function return(Borrow $borrow)
    {
         $borrow->update([
            'status' => request('status'),
        ]);

        return view('borrow.index', compact('borrow'));
    }

}
