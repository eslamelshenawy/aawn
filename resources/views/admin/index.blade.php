@include('admin.layout.head')
@include('admin.layout.header')
@include('admin.layout.menu')
@include('admin.layout.uphead')

@section('title')
    Dashboard
@endsection


<!-- Main content -->
@include('admin.layout.message')

@yield('content')

@include('admin.layout.footer')