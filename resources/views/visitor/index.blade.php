@extends('adminlte::layouts.app')

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-user"></i> DATA PENGUNJUNG</h3>
            <p>Data Pengunjung Perpustakaan Hari ini : {{ date('d M Y h-i-s A') }}</p>
        </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Visited At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ date('d-m-Y h:ia', strtotime($user->created_at))  }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

 @endsection