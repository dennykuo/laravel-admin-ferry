@extends('admin-ferry::layouts.auth')

@section('content')
  <div class="lg:flex items-center justify-center h-screen bg-gradient-to-b from-indigo-50 to-gray-100">

    <div class="w-full lg:w-1/2 xl:w-2/5 bg-white pt-8 pb-4 mb-24">

      {{-- logo set --}}
      <div class="flex justify-center lg:justify-start items-center bg-indigo-100 lg:bg-white py-10 px-10 lg:max-w-lg mx-auto">
        <div class="flex items-center">
          <svg class="w-10 text-indigo-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 225 225" style="enable-background:new 0 0 225 225;" xml:space="preserve">
            <style>
              .st0{fill:none;stroke:currentColor;stroke-width:20;stroke-linecap:round;stroke-miterlimit:3;}
            </style>
            <g transform="matrix( 1, 0, 0, 1, 0,0)">
              <g>
                <path id="Layer0_0_1_STROKES" class="st0" d="M173.8,151.5l13.6-13.6 M35.4,89.9l29.1-29 M89.4,34.9v1 M137.4,187.9l-0.6-0.4     M36.6,138.7l0.2-0.2 M56.1,169.1l27.7-27.6 M63.8,111.5l74.3-74.4 M87.1,188.1L187.6,87.6 M110.8,114.5l57.8-57.8"/>
              </g>
            </g>
          </svg>
        </div>

        <div class="text-2xl text-indigo-800 ml-2 font-medium">
          <h1 class="flex items-center space-x-2">
            <span>{{ config('admin-ferry.name', config('app.name', '後台')) }}</span>
            <small class="text-gray-300">|</small>
            <strong class="text-indigo-500 font-light">登入</strong>
          </h1>
        </div>
      </div>

      {{-- form set --}}
      <div class="mt-20 lg:mt-12 mb-12 px-10 lg:max-w-lg mx-auto">
        {{-- <h2 class="text-center text-4xl text-indigo-900 font-semibold lg:text-left xl:text-5xl xl:text-bold">登入</h2> --}}

        @if ($errors->any())
          {{-- <x-admin-ferry::alert.error :errors="$errors" wrapper-class="mb-10" /> --}}
          <x-admin-ferry::alert type="error" :content="$errors" wrapper-class="mb-10" />
        @endif

        @if (session()->has('status'))
          {{-- <x-admin-ferry::alert.notify :message="session('status')" wrapper-class="mb-10" /> --}}
          <x-admin-ferry::alert type="notify" :content="session('status')" wrapper-class="mb-10" />
        @endif

        @yield('form')

        {{-- <div class="mt-12 text-sm font-semibold text-gray-700 text-center">
          Don't have an account ? <a class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign up</a>
        </div> --}}
      </div>

    </div>

  </div>
@endsection
