@include('layouts.header')
@section('banner')
    @include('layouts.banner')
@endsection
@yield('banner')
@yield('content')
@include('layouts.footer')
