@extends('adminlte::layouts.app')

@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel panel-heading"> Form Tambah Data Penerbit</div>
                    <div class="panel-body">
                        <form class="" method="post" action=" {{ route('penerbit.update', $penerbit) }} ">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group has-feedback{{ $errors->has('penerbit') ? 'has-error' : ' ' }}  ">
                                <label for=""> Nama Penerbit </label>
                                <input type="text" name="penerbit" placeholder="Nama Penerbit" class="form-control" value=" {{ $penerbit->penerbit }} ">
                                @if($errors->has('penerbit'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('penerbit') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('thn_terbit') ? 'has-error' : '' }}">
                                <label for=""> Tahun Terbit</label>
                                <input type="date" name="thn_terbit" placeholder="YYYY-MM-DD" class="form-control" value=" {{ $penerbit->thn_terbit }}">
                                @if ($errors->has('thn_terbit'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('thn_terbit') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary">
                                <input type="reset" value="Batalkan" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection