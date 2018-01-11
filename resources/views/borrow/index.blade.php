@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home')}}
@endsection

@section('main-content')
    <div class="box">
        <div class="box-header">
           <h3> <div class="box-title"> Data Peminjaman Buku</div> </h3>
        </div>

    <a href=" {{ route('borrow.return') }} " class="btn btn-sm btn-success" style="float: right; margin-right: 10px; margin-bottom: 10px;"><i class="fa fa-checklist"></i> Return</a>
        <a href=" {{ route('borrow.create') }} " class="btn btn-sm btn-success" style="float: right; margin-right: 10px; margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Data</a>

        <div class="box-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Peminjam</td>
                        <td>Nama Buku</td>
                        <td>Tanggal Pinjam</td>
                        <td>Tanggal Kembali</td>
                        <td>Status</td>
                        <td>Option</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($borrows as $key => $borrow)
                        <tr>
                            <td> {{ ($key+1) }} </td>
                            <td> {{ ($borrow->user->name) }} </td>
                            <td> {{ ($borrow->book->title) }} </td>
                            <td> {{ date('d-m-Y', strtotime($borrow->created_at)) }} </td>
                            <td> {{ date('d-m-Y', strtotime($borrow->return_at)) }} </td>
                            <td> {{ ($borrow->status) }}</td>
                            <td>

                                        <a href=" {{ route('borrow.edit', $borrow) }}  " class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Perpanjang</a>
                                        <form class="" action=" {{ route('borrow.destroy', $borrow) }}  " method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Kembali </button>
                                        </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection