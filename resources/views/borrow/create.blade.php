@extends('adminlte::layouts.app')

@section('main-content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('daterangepicker/daterangepicker.css')}}" />


<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="box box-info">
                <div class=" box-header">
                  <h3 class="box-title">Form Peminjaman Buku</h3>
                </div>
                <div class="panel-body">

                    <form class="" method="POST" action=" {{ route('borrow.store') }} ">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback{{ $errors->has('user_id') ? 'has-error' : ''  }}  ">
                            <label for=""> Id Peminjam<b>*</b> </label>
                            <input type="text" class="form-control" name="user_id" placeholder=" Id Peminjam">
                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('user_id') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('book_id') ? 'has-error' : '' }} ">
                            <label for="">Id Buku<b>*</b></label>
                            <input type="text" name="book_id" class="form-control" placeholder="Id Buku">
                                @if ($errors->has('book_id'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('book_id') }} </p>
                                    </span>
                                @endif
                        </div>

                                    <!-- Date range -->
                        {{-- <div class="form-group">
                            <label>Date range:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="borrow_at">
                            </div>
                            <!-- /.input group -->
                        </div> --}}
                          <!-- /.form group -->

                        {{-- <div class="form-group has-feedback{{ $errors->has('borrow_at') ? 'has-error' : '' }} ">
                            <label for="">Borrow At</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            <input type="date" name="borrow_at" id="date" class="form-control" placeholder="YYYY-MM-DD">
                                @if ($errors->has('borrow_at'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('borrow_at') }} </p>
                                    </span>
                                @endif
                            </div>
                        </div>
 --}}
                        <div class="form-group has-feedback{{ $errors->has('return_at') ? 'has-error' : '' }} ">
                            <label for="">Return At</label>
                            <input type="date" name="return_at" class="form-control" placeholder="YYYY-MM-DD">
                                @if ($errors->has('return_at'))
                                    <span class="help-block">
                                        <p> {{ $errors->first('return_at') }} </p>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="Pinjam" > Pinjam</option>
                                <option value="Kembali"> Kembali</option>
                            </select>
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

@section('script')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('daterangepicker/daterangepicker.js')}}"></script>

    <script>
        $('input[name="borrow_at"]').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            },

            startDate: '20-12-2017',
            endDate: '01-01-2018'
        },

        function(start, end, label) {
            alert("Kamu memiliki waktu 5 hari untuk meminjam buku ini dimulai dari: " + start.format('DD-MM-YYYY') +  'to'  + end.format('DD-MM-YYYY'));
        });
    </script>
@endsection
