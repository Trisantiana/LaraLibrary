@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Form Edit Data Anggota</div>
                    <div class="panel-body">
                        <form class="" method="POST" action=" {{ route('member.update', $member) }} ">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group has-feedback{{ $errors->has('name') ? 'has-error' : ''  }} ">
                                <label for="">Nama</label>
                                <input type="text" name="name" placeholder="Nama" class="form-control" value=" {{ $member->name }} ">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('name') }} </p>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group has-feedback{{ $errors->has('ttl') ? 'has-error' : ''  }} ">
                                <label for="">TTL</label>
                                <input type="date" name="ttl" class="form-control" placeholder="YYYY-MM-DD" value=" {{ $member->ttl }} ">
                                @if ($errors->has('ttl'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('ttl') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('pekerjaan') ? 'has-error' : ''  }} ">
                                <label for="">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value=" {{$member->pekerjaan }} ">
                                @if ($errors->has('pekerjaan'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('pekerjaan') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('address') ? 'has-error' : ''  }} ">
                                <label for=""> Alamat</label>
                                <textarea name="address" placeholder="Alamat" class="form-control"> {{ $member->address }}  </textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('address') }} </p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary">
                                <input type="reset" name="reset" value="Batal" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection