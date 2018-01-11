@extends('adminlte::layouts.nav-member')

@section('main-content')
    <div class=" col-md-offset-2">
        <div class="box" style="height: 200px; width: 700px;" >
            <div class="box-body">
                <br>
                    <div class="alert alert-success"  >
                        <p style="font-size: 17px;">
                            Selamat Datang di <B>PERPUSTAKAAN SMKN 1 PONOROGO</B> silahkan klik
                            @php
                                $check = Auth::user()->roles();
                            @endphp
                            @if (sizeof($role) < 1)
                                <button type="button" id="upgrade" class="btn btn-xs btn-info" data-id="{{ Auth::id() }}" data-member="Member">Daftar Anggota</button> <p> untuk mendaftar menjadi Anggota <b>PERPUSTAKAAN SMKN 1 PONOROGO</b> </p>
                            {{-- @elseif (sizeof($role) = 1)
                                <a href=" {{ url('admin') }} " class="btn btn-xs bt-primary"> Masuk</a>
                             --}}@else
                                <a href="{{ url('admin') }}"> Masuk </a>
                            @endif
                            <a href=" {{ route('member.book') }} " class="btn btn-xs bt-primary"> Member</a>
                        </p>
                    </div>
            </div>
        </div>
</div>
@endsection
@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function(){
        $('#upgrade').click(function(){
            var id = $(this).attr('data-id');
            var member = $(this).attr('data-member');
            var route = '{{ URL('home/upgrade') }}';
            var data = {
                id: id, level: member
            }
            var request = $.post(route, data);
                $(this).html('processing...');
                request.done(function(response){
                    $(this).html('upgrade');
                    if(response.success == 'true')
                        window.location.href = '{{ URL('member') }}';
                });
                request.always(function(response){
                    console.log('complete');
                    $(this).html('upgrade');
                });

        });
    });
</script>
@endsection