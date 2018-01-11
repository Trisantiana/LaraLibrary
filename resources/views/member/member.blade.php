@extends('adminlte::layouts.app-member')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

     <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA ANGGOTA</h3>
            </div>

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

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $members->render() !!}

                </div>
            </div>

@endsection