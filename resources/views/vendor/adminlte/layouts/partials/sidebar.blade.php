<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/images/{{auth()->user()->avatar}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Home</span></a></li>
            <li><a href="{{ route('book.index') }}"><i class="fa fa-book"></i><span>Buku</span></a></li>
            <li><a href=" {{ route('member.index') }} "><i class='fa fa-user'></i> <span>Anggota</span></a></li>
            <li><a href="{{ route('penerbit.index') }}"><i class="fa fa-user"></i><span>Penerbit</span></a></li>
            <li><a href="{{ route('pengarang.index') }}"><i class="fa fa-user"></i><span>Pengarang</span></a></li>
            <li><a href=" {{ route('borrow.index') }} "><i class="fa fa-user"></i><span>Data Peminjam</span></a></li>
            <li><a href=" {{ route('visitor.index') }} "><i class="fa fa-user"></i><span>Data Pengunjung</span></a></li>


        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
