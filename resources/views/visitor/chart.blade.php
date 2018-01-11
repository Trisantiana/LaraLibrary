@extends('adminlte::layouts.top-nav')

@section('main-content')
     <div class="app">

            <center>
                {!! $chart->html() !!}
            </center>

    </div>
        {!! Charts::scripts() !!}
        {!! $chart->script() !!}
@endsection

