@extends('adminlte::layouts.app')
@section('main-content')

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA PENERBIT</h3>
            </div>
            <a onclick="export()" id="export" class="btn btn-info" href="{{ route('penerbit.export') }}" style="float: right; margin-right: 12px; margin-bottom: 10px;"><i class="fa fa-download"></i> Unduh</a>

            <a href=" {{ route('penerbit.create') }} " class="btn btn-sm btn-success" style="float: right; margin-right: 10px; margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Data</a>

            <!-- /.box-header -->
            <ul class="nav navbar-nav " style="float: left; margin-left: 10px; margin-bottom: 5px;">
                <form action="{{ route('penerbit.index') }}" method="get" class="form-inline mt-2 mt-md-0" style="padding-top: 8px;">
                    <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search" value="{{ isset($search) ? $search : ''}}">
                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </ul>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th width="5">No</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbits as $key => $penerbit)
                            <tr>
                                <td> {{ ($key+1) }} </td>
                                <td> {{ ($penerbit->penerbit) }} </td>
                                <td> {{ ($penerbit->thn_terbit) }} </td>
                                <td>
                                    <center>
                                        <a href=" {{ route('penerbit.edit', $penerbit) }} " class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        <form class="" action=" {{ route('penerbit.destroy', $penerbit) }} " method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Hapus </button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {!! $penerbits->appends(['search' => $search])->render() !!}
            </div>
        </div>
@endsection
@section('script')

<script src="{{ asset('assets/print/jquery.min.js') }}"></script>
<script src="{{ asset('assets/print/jquery.printPage.js') }}"></script>

        <script type="text/javascript">
        function export() {
            $('#export').('show');
            $('#export form')[0].reset();
        }

        $(document).ready(function(){
            $('#btnPrint').printPage();
        });

        </script>
@endsection



