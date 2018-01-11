@extends('adminlte::layouts.app-member')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-book"></i> DATA BUKU</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                            <th width="5">No</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>ISBN</th>
                            <th>Jumlah Buku</th>
                            <th>Lokasi</th>

                        </tr>
                </thead>
                <tbody>
                        @foreach ($books as $key => $book)
                            <tr>
                                <td> {{ ($key+1) }} </td>
                                <td> {{ ($book->title) }} </td>
                                <td>
                                    <img src="../../images/books/{{ $book->image }}" alt="" width="50" height="50">
                                </td>
                                <td> {{ ($book->pengarang->pengarang) }} </td>
                                <td> {{ ($book->penerbit->penerbit) }} </td>
                                <td> {{ ($book->isbn) }} </td>
                                <td> {{ ($book->jml_buku) }} </td>
                                <td> {{ ($book->lokasi) }} </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {!! $books->render() !!}
            </div>
        </div>


@endsection