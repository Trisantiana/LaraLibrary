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
                        <td>Change Status</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($borrowTrashed as $key => $borrow)
                        <tr>
                            <td> {{ ($key+1) }} </td>
                            <td> {{ ($borrow->user->name) }} </td>
                            <td> {{ ($borrow->book->title) }} </td>
                            <td> {{ date('d-m-Y', strtotime($borrow->created_at)) }} </td>
                            <td> {{ date('d-m-Y', strtotime($borrow->return_at)) }} </td>
                            <td>
                                @if ($borrow->status == 'Pinjam')
                                    <p>Dipinjam</p>
                                @else
                                    <p>Kembali</p>
                                @endif
                            </td>

                            <td>
                                <select name="status" id="" onchange="return(this.value($borrow->id))" >
                                    <option value="Pinjam">Pinjam</option>
                                    <option value="Kembali">Kembali</option>
                                </select>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function return(val,borrow_id) {
            $.ajax({
                type: 'post',
                data: {val:val, borrow_id:borrow_id},
                success: function(result){
                    console.log(result)
                }

            });
        }
    </script>
@endsection