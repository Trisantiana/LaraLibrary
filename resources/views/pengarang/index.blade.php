@extends('adminlte::layouts.app')
@section('main-content')



     <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA PENGARANG</h3>
            </div>

            <a onclick="export()" id="export" class="btn btn-info" href="{{ route('pengarang.export') }}" style="margin-right: 12px; margin-bottom: 10px; float: right;"><i class="fa fa-download"></i> Unduh</a>
            <a href=" {{ route('pengarang.create') }} " class="btn btn-sm btn-success" style="float: right; margin-right: 10px; margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Data</a>

            <ul class="nav navbar-nav " style="float: left; margin-left: 10px; margin-bottom: 10px;">
                <form action="{{ route('pengarang.index') }}" method="get" class="form-inline mt-2 mt-md-0" style="padding-top: 8px;">
                    <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </ul>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th width="5">No</th>
                            <th>Pengarang</th>
                            <th>Alamat</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengarangs as $key => $pengarang)
                            <tr>
                                <td> {{ ($key+1) }} </td>
                                <td> {{ ($pengarang->pengarang) }} </td>
                                <td> {{ ($pengarang->address) }} </td>
                                <td>
                                    <center>
                                        <a href=" {{ route('pengarang.edit', $pengarang) }} " class="btn btn-xs btn-info"> <i class="fa fa-edit"></i> Edit</a>
                                        <form class="" action=" {{ route('pengarang.destroy', $pengarang) }}  " method="post">
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
                {!! $pengarangs->appends(['search' => $search ])->render() !!}
            </div>
        </div>

        <script type="text/javascript">
            function export() {
                $('#export').('show');
            }
        </script>
@endsection