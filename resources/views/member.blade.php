@extends('adminlte::layouts.app-member')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="box box-info">
                    <div class="box box-header">
                    <div class="box-title"><h4> &nbsp; Form Tambah Data Anggota </h4></div>
                    </div>
                    <div class="box-body">
                        <form class="" method="POST" action=" {{ route('memberStore') }} ">
                            {{ csrf_field() }}

                            <!--
                            <div class="form-group">
                                <label for="">No.Anggota</label>
                                <input type="text" name="id" placeholder="No.Anggota" class="form-control">
                            </div>
                            -->

                            <div class="form-group has-feedback{{ $errors->has('name') ? 'has-error' : ''  }} ">
                                <label for="">Nama</label>
                                <input type="text" name="name" placeholder="Nama" class="form-control" value=" {{ auth()->user()->name }} ">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('name') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('gender') ? 'has-error' : ''  }} ">
                                <label for="">Jenis Kelamin</label> <br>

                                <input type="radio" name="gender" value="Male"> Laki-Laki <br>
                                <input type="radio" name="gender" value="Female"> Perempuan

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('gender') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('ttl') ? 'has-error' : ''  }} ">
                                <label for="">TTL</label>
                                <input type="date" name="ttl" class="form-control" placeholder="YYYY-MM-DD">
                                @if ($errors->has('ttl'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('ttl') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('pekerjaan') ? 'has-error' : ''  }} ">
                                <label for="">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                                @if ($errors->has('pekerjaan'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('pekerjaan') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('address') ? 'has-error' : ''  }} ">
                                <label for=""> Alamat</label>
                                <textarea name="address" placeholder="Alamat" class="form-control"></textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('address') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary">
                                <input type="reset" name="reset" value="Batal" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection