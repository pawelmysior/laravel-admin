@extends('admin::master')

@section('body')
    <div id="app" v-cloak>
        <div class="min-h-screen flex flex-col xl:flex-row items-stretch">
            <renderless-toggler>
                <div class="bg-blue-800 flex flex-col" slot-scope="{ hidden, toggle }">
                    <button class="self-end text-white flex xl:hidden items-center px-5 py-5 appearance-none focus:outline-none" @click="toggle">
                        <svg class="fill-current h-3 w-3" :class="{ hidden: hidden }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                        </svg>
                        <svg class="fill-current h-3 w-3" :class="{ hidden: !hidden }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
                        </svg>
                    </button>

                    <div class="xl:flex flex-col h-full justify-between pb-6 xl:pt-6 px-5 xl:pr-20" :class="{ hidden: !hidden }">
                        <div class="flex-grow">
                            @include('admin.menu')
                        </div>

                        <div>
                            <a
                                class="flex items-center whitespace-no-wrap text-sm text-white hover:text-blue-400"
                                href="@if (Route::has('logout')) {{ route('logout') }} @else {{ route('admin.logout') }} @endif"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                <svg-icon icon="close-outline" class="text-blue-400 h-4 w-4 mr-3"></svg-icon>
                                <span>Wyloguj się</span>
                            </a>

                            <form id="logout-form" class="hidden" action="@if (Route::has('logout')) {{ route('logout') }} @else {{ route('admin.logout') }} @endif" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </renderless-toggler>

            <div class="flex-grow p-4 xl:p-10">
                @yield('content')
            </div>
        </div>

        <portal-target name="modals"></portal-target>
    </div>
@endsection
