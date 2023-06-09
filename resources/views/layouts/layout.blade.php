@extends('layouts.app')

@section('base_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
