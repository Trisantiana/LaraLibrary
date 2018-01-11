@extends('adminlte::layouts.app')



@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <div class="box-title"> <b> &nbsp;&nbsp; Form Tambah Data Buku </b></div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                    </div>

                <div class="box-body">
                    <form class="" method="POST" action=" {{ route('book.store') }} " enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback{{ $errors->has('title') ? 'has-error' : ''  }}  ">
                            <label>Judul :</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                    <input type="text" class="form-control" name="title" placeholder=" Judul">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for=""> Image </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-image-o"></i>
                                </div>
                                <input type="file" class="form-control" name="image" placeholder=" Add Image" value="">
                            </div>
                        </div>

                       {{--  <form method="POST" action="">
                        <div class="form-group has-feedback{{ $errors->has('image') ? 'has-error' : ''  }}  ">
                            <label for=""> Image </label>
                            <input type="file" class="form-control" name="image" placeholder=" Add Image">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('image') }} </p>
                                    </span>
                                @endif
                        </div>
                        </form> --}}

                        <div class="form-group">
                            <label for=""> Pengarang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <select name="pengarang_id" id="" class="form-control">
                                    @foreach ($pengarangs as $pengarang)
                                        <option value=" {{ $pengarang->id }} "> {{ $pengarang->pengarang }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for=""> Penerbit</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <select name="penerbit_id" id="" class="form-control">
                                    @foreach ($penerbits as $penerbit)
                                        <option value=" {{ $penerbit->id }} "> {{ $penerbit->penerbit }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for=""> ISBN </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <input type="text" class="form-control" name="isbn" placeholder=" ISBN" >
                                    @if ($errors->has('isbn'))
                                        <span class="help-block">
                                            <p> {{ $errors->first('isbn') }} </p>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for=""> Jumlah Buku </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <input type="number" class="form-control" name="jml_buku" placeholder=" Jumlah Buku" >
                                    @if ($errors->has('jml_buku'))
                                        <span class="help-block">
                                            <p> {{ $errors->first('jml_buku') }} </p>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for=""> Lokasi </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <select name="lokasi" id="" class="form-control">

                                    <option value="rak 1"> Rak 1 </option>
                                    <option value="rak 2"> Rak 2</option>
                                    <option value="rak 3"> Rak 3</option>
                                    <option value="rak 4"> Rak 4</option>

                                </select>
                            </div>
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