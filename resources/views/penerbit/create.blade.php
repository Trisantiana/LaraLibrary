@extends('adminlte::layouts.app')

@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Tambah Data Penerbit</h3>
                </div>
                <div class="box-body">
                        <form class="" method="post" action=" {{ route('penerbit.store') }} ">
                            {{ csrf_field() }}

                            <div class="form-group has-feedback{{ $errors->has('penerbit') ? 'has-error' : ' ' }}  ">
                                <label for=""> Nama Penerbit </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                <input type="text" name="penerbit" placeholder="Nama Penerbit" class="form-control">
                                </div>
                                @if($errors->has('penerbit'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('penerbit') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('thn_terbit') ? 'has-error' : '' }}">
                                <label for=""> Tahun Terbit</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="date" name="thn_terbit" placeholder="YYYY-MM-DD" class="form-control">
                                </div>
                                @if ($errors->has('thn_terbit'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('thn_terbit') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary">
                                <input type="reset" value="Batalkan" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection