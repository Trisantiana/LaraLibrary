@extends('adminlte::layouts.app')

@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Form Edit Data Buku</div>
                    <div class="panel-body">
                    <form class="" method="POST" action=" {{ route('book.update', $book) }} " enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group has-feedback{{ $errors->has('title') ? 'has-error' : ''  }}  ">
                            <label for=""> Judul </label>
                            <input type="text" class="form-control" name="title" placeholder=" Judul" value=" {{ $book->title}} ">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('title') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('image') ? 'has-error' : ''  }}  ">
                            <label for=""> Image </label>
                            <input type="file" class="form-control" name="image" placeholder=" Add Image" value="{{ $book->image }}">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('image') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for=""> Pengarang</label>
                            <select name="pengarang_id" id="" class="form-control">
                                @foreach ($pengarangs as $pengarang)
                                    <option value=" {{ $pengarang->id }} "> {{ $pengarang->pengarang }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""> Penerbit</label>
                            <select name="penerbit_id" id="" class="form-control">
                                @foreach ($penerbits as $penerbit)
                                    <option value=" {{ $penerbit->id }} "> {{ $penerbit->penerbit }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""> ISBN </label>
                            <input type="text" class="form-control" name="isbn" placeholder=" ISBN" value="{{ $book->isbn}}">
                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('isbn') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for=""> Jumlah Buku </label>
                            <input type="number" class="form-control" name="jml_buku" placeholder=" Jumlah Buku"  value=" {{ $book->jml_buku }} ">
                                @if ($errors->has('jml_buku'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('jml_buku') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for=""> Lokasi </label>
                            <input type="text" class="form-control" name="lokasi" placeholder=" Lokasi"  value=" {{ $book->lokasi }} ">
                                @if ($errors->has('lokasi'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('lokasi') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group" >
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection