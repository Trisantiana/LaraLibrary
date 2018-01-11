<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Pengarang;
use App\Penerbit;
use Alert;
use Image;
use Excel;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        alert()->message('This is Book List', ' Welcome!');

        $search = $request->input('search');

        $books = Book::latest()->search($search)->paginate(10);
        return view('book.index', compact('books', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengarangs = Pengarang::all();
        $penerbits = Penerbit::all();

        return view('book.create', compact('pengarangs', 'penerbits'));
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
            'title' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'isbn' => 'required|max:10',
            'jml_buku' => 'required',
            'lokasi' => 'required'
        ]);

            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/images/books/' .$fileName);
            Image::make($image)->resize(300, 300)->save($path);

            $save = new Book;
            $save = $fileName;
            // $user->save();


        Book::create([

            'title' => request('title'),
            'image' => $save,
            'pengarang_id' => request('pengarang_id'),
            'penerbit_id' => request('penerbit_id'),
            'isbn' => request('isbn'),
            'jml_buku' => request('jml_buku'),
            'lokasi' => request('lokasi'),

        ]);

        alert()->info('Data Buku telah Ditambahkan!');

        return redirect()->route('book.index');


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
    public function edit(Book $book)
    {
        // $book = Book::find($id);
        $pengarangs = Pengarang::all();
        $penerbits = Penerbit::all();
        return view('book.edit', compact('book', 'pengarangs', 'penerbits') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Book $book, Request $request)
    {
        //$book = Book::find($id);

        $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/images/books/' .$fileName);
            Image::make($image)->resize(300, 300)->save($path);

            $save = new Book;
            $save = $fileName;

        $book->update([
            'title' => request('title'),
            'image' => $save,
            'pengarang_id' =>request('pengarang_id'),
            'penerbit_id' => request('penerbit_id'),
            'isbn' => request('isbn'),
            'jml_buku' => request('jml_buku'),
            'lokasi' => request('lokasi'),
        ]);



        return redirect()->route('book.index')->withInfo('Edit Data Buku Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index');
    }

    public function memberBook()
    {
        $books = Book::latest()->paginate(10);
        return view('member.book-list', compact('books'));
    }

    public function bookExport()
    {
        $book = Book::select('title', 'pengarang_id', 'penerbit_id', 'isbn', 'jml_buku', 'lokasi')->get();

        return Excel::create('data_buku', function($excel) use ($book){
            $excel->sheet('mysheet', function($sheet) use ($book){
                $sheet->fromArray($book);
            });
        })->download('xls');
    }



}
