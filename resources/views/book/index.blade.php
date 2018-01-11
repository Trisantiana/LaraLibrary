@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-book"></i> DATA BUKU</h3>
            </div>

            <a onclick="export()" id="export" class="btn btn-info"  href="{{ route('book.export') }}" style="float: right; margin-right: 12px; margin-bottom: 20px;"><i class="fa fa-download"></i>Unduh</a>
            <a href=" {{ route('book.create') }} " class="btn btn-success btn-sm" style="float: right; margin-right: 10px; margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah Data</a>


            <ul class="nav navbar-nav " style="float: left; margin-left: 10px; margin-bottom: 5px;">
                <form action="{{ route('book.index') }}" method="get" class="form-inline mt-2 mt-md-0" style="padding-top: 8px;">
                    <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search" value="{{ isset($search) ? $search : ''}}">
                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </ul>
            <!-- /.box-header -->
            <div class="box-body">
                {{-- @include('sweet::alert') --}}
              <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                            <th width="5">No</th>
                            <th>Judul</th>
                            <th>Gambar Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>ISBN</th>
                            <th>Jumlah Buku</th>
                            <th>Lokasi</th>
                            <th>Tanggal Input</th>
                            <th>Option</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($books as $key => $book)
                            <tr>
                                <td> {{ ($book->id) }} </td>
                                <td> {{ ($book->title) }} </td>
                                <td>
                                    <img src="../../images/books/{{ $book->image }}" alt="" width="50" height="50">
                                </td>
                                <td> {{ ($book->pengarang->pengarang) }} </td>
                                <td> {{ ($book->penerbit->penerbit) }} </td>
                                <td> {{ ($book->isbn) }} </td>
                                <td> {{ ($book->jml_buku) }} </td>
                                <td> {{ ($book->lokasi) }} </td>
                                <td> {{ date('d-m-Y h:i A', strtotime($book->created_at)) }} </td>
                                <td>
                                    <center>
                                        <a href=" {{ route('book.edit', $book)}}  " class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        <form class="" action=" {{ route('book.destroy', $book) }} " method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Hapus </button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {!! $books->appends(['search' => $search])->render() !!}
            </div>
        </div>

    <script type="text/javascript">
        function export() {
            $('#export').('show');
            $('#export form')[0].reset();
        }
    </script>
@endsection