@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <div class="box-title"> Form Tambah Data Pengarang</div>
                        </div>
                        <div class="box-body">
                            <form class="" method="POST" action=" {{ route('pengarang.store') }}  ">
                                {{ csrf_field() }}

                                <div class="form-group has-feedback{{ $errors->has('pengarang') ? 'has-error' : ''  }} ">
                                    <label for="">Nama Pengarang</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                    <input type="text" name="pengarang" placeholder="Nama" class="form-control">
                                    </div>
                                    @if ($errors->has('pengarang'))
                                        <span class="help-block">
                                            <p> {{ $errors->first('pengarang') }} </p>
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
                                    <input type="reset" name="reset" value="Batalkan" class="btn btn-primary">
                                </div>
                            </form>

                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection