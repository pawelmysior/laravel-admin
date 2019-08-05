@extends('admin::master')

@section('body')
    <div id="app" v-cloak>
        <div class="min-h-screen flex items-center justify-center p-4 xl:p-10">
            <div class="w-96 mx-auto panel">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
