@extends('adminlte::layouts.app-member')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-book"></i> DATA BUKU</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                {{-- @include('sweet::alert') --}}
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                            <th width="5">No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>ISBN</th>
                            <th>Jumlah Buku</th>
                            <th>Lokasi</th>
                            <th>Tanggal Input</th>

                        </tr>
                </thead>
                <tbody>
                        @foreach ($books as $key => $book)
                            <tr>
                                <td> {{ ($key+1) }} </td>
                                <td> {{ ($book->title) }} </td>
                                <td> {{ ($book->pengarang->pengarang) }} </td>
                                <td> {{ ($book->penerbit->penerbit) }} </td>
                                <td> {{ ($book->isbn) }} </td>
                                <td> {{ ($book->jml_buku) }} </td>
                                <td> {{ ($book->lokasi) }} </td>
                                <td> {{ date('d-m-Y H:ia', strtotime($book->created_at)) }} </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {!! $books->render() !!}
            </div>
        </div>


@endsection