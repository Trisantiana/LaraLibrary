@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Form Edit Data Pengarang</div>
                    <div class="panel-body">
                        <form class="" method="POST" action=" {{ route('pengarang.update', $pengarang) }}  ">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group has-feedback{{ $errors->has('pengarang') ? 'has-error' : ''  }} ">
                                <label for="">Nama Pengarang</label>
                                <input type="text" name="pengarang" placeholder="Nama" class="form-control" value=" {{ $pengarang->pengarang }} ">
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('pengarang') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('address') ? 'has-error' : ''  }} ">
                                <label for=""> Alamat</label>
                                <textarea name="address" placeholder="Alamat" class="form-control"> {{ $pengarang->address }} </textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('address') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary">
                                <input type="reset" name="reset" value="Batalkan" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection