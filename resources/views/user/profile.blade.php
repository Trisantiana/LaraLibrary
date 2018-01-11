@extends('adminlte::layouts.top-nav')

@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="/images/{{ auth()->user()->avatar }}" alt="" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                <h1>{{$user->name}}'s Profile</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for=""><h4>Change Profile Image</h4></label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary"  value="Simpan">
                </form>
            </div>
        </div>
    </div>

@endsection