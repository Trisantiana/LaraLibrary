@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

     <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA ANGGOTA</h3>
            </div>

            <a onclick="export()" id="export" class="btn btn-info" href="{{ route('member.export') }}" style="margin-right: 12px; margin-bottom: 10px; float: right;"><i class="fa fa-download"></i> Unduh</a>
            <a href=" {{ route('member.create') }} " class="btn btn-sm btn-success" style="float: right; margin-right: 10px; margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Data</a>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                            <tr>
                                <td width="7">No.Anggota</td>
                                <td>Nama</td>
                                <th>Jenis Kelamin</th>
                                <th>TTL</th>
                                <th>Pekerjaan</th>
                                <th>Alamat</th>
                                <th>Tanggal Gabung Anggota</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td> {{ ($member->id) }} </td>
                                    <td> {{ ($member->name) }} </td>
                                    <td> {{ ($member->gender) }} </td>
                                    <td> {{ ($member->ttl) }} </td>
                                    <td> {{ ($member->pekerjaan) }} </td>
                                    <td> {{ ($member->address) }} </td>
                                    <td> {{ date('d-m-Y', strtotime($member->created_at)) }} </td>
                                    <td>
                                        <center>
                                            <a href=" {{ route('member.edit', $member) }} " class="btn btn-xs btn-info"> <i class="fa fa-edit"></i>Edit</a>

                                        <form method="POST" action=" {{ route('member.destroy', $member) }} ">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Hapus</button>

                                        </form>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $members->render() !!}

                </div>
            </div>

        <script type="text/javascript">
            function export() {
                $('#export').('show');
            }
        </script>

@endsection