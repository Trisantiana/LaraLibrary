@extends('adminlte::layouts.app')


@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Form Tambah Data Peminjam</div>
                    <div class="panel-body">

                    <form class="" method="POST" action=" {{ route('borrow.update', $borrow) }} ">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group has-feedback{{ $errors->has('user_id') ? 'has-error' : ''  }}  " >
                            <label for=""> Id Peminjam<b>*</b> </label>
                            <input type="text" class="form-control"  name="user_id" placeholder=" Id Peminjam" value=" {{ $borrow->user_id }} "> Nama Peminjam : {{ $borrow->user->name }}
                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('user_id') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('book_id') ? 'has-error' : '' }} ">
                            <label for="">Id Buku<b>*</b></label>
                            <input type="text" name="book_id"  class="form-control" placeholder="Id Buku" value=" {{ $borrow->book_id }} "> Judul Buku : {{ $borrow->book->title }}
                                @if ($errors->has('book_id'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('book_id') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('created_at') ? 'has-error' : '' }} ">
                            <label for="">Borrow At</label>
                            <input type="text" name="created_at" class="form-control" placeholder="YYYY-MM-DD" value=" {{ date('d-m-Y'), strtotime($borrow->created_at) }} ">
                                @if ($errors->has('created_at'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('created_at') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('return_at') ? 'has-error' : '' }} ">
                            <label for="">Return At</label>
                            <input type="text" name="return_at" class="form-control" placeholder="YYYY-MM-DD" value=" {{ date('d-m-Y', strtotime($borrow->return_at)) }} ">
                                @if ($errors->has('return_at'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('return_at') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Pinjam/Kembali" value="{{ $borrow->status }}">
                            {{-- <select name="status" id="" class="form-control">
                                <option value="Pinjam"> Pinjam</option>
                                <option value="Kembali"> Kembali</option>
                            </select> --}}
                        </div>
                        <div class="form-group" >
                            <input type="submit" value="Save" class="btn btn-primary">
                            <input type="reset" name="reset" value="Batalkan" class="btn btn-primary">
                        </div>
                    </form>
                        {{-- @include('sweet::alert') --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection