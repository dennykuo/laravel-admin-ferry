@extends('admin-ferry::layouts.auth')

@section('content')
  <section class="lg:flex items-center justify-center bg-white">

    {{-- Heading set，小板面時隱藏 --}}
    <div class="hidden lg:flex flex-1 h-screen lg:w-1/2 items-center justify-center bg-gradient-to-b from-indigo-50 to-gray-100">
      <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
        <h1 class="text-8xl text-indigo-600 font-extralight tracking-wider">{{ $heading }}</h1>
      </div>
    </div>

    {{-- Logo & 登入欄位 --}}
    <div class="w-full lg:w-1/2">

      {{-- Logo set --}}
      <div class="flex justify-start items-center bg-indigo-100 lg:bg-white py-10 px-7 md:py-9 md:px-10 lg:max-w-lg mx-auto">

        {{-- <div class="hidden md:flex items-center"> --}}
        {{--   <svg class="w-10 text-indigo-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 225 225" style="enable-background:new 0 0 225 225;" xml:space="preserve"> --}}
        {{--     <style> --}}
        {{--       .st0{fill:none;stroke:currentColor;stroke-width:20;stroke-linecap:round;stroke-miterlimit:3;} --}}
        {{--     </style> --}}
        {{--     <g transform="matrix( 1, 0, 0, 1, 0,0)"> --}}
        {{--       <g> --}}
        {{--         <path id="Layer0_0_1_STROKES" class="st0" d="M173.8,151.5l13.6-13.6 M35.4,89.9l29.1-29 M89.4,34.9v1 M137.4,187.9l-0.6-0.4     M36.6,138.7l0.2-0.2 M56.1,169.1l27.7-27.6 M63.8,111.5l74.3-74.4 M87.1,188.1L187.6,87.6 M110.8,114.5l57.8-57.8"/> --}}
        {{--       </g> --}}
        {{--     </g> --}}
        {{--   </svg> --}}
        {{-- </div> --}}

        <div class="_lg:ml-5">
          <h1 class="flex flex-col _md:flex-row _md:items-center _md:space-x-3.5 text-4xl text-indigo-800 font-medium">
            <div class="mb-3 md:mb-5 leading-8">{{ config('admin-ferry.name', config('app.name', '後台')) }}</div>
            {{-- <small class="hidden md:inline-block text-gray-300">|</small> --}}
            <div class="text-xl text-indigo-600 font-light">使用者登入</div>
          </h1>
        </div>

      </div>

      {{-- form set --}}
      <div class="mt-14 md:mt-24 lg:mt-14 mb-14 px-10 lg:max-w-lg mx-auto">
        {{-- <h2 class="text-center text-4xl text-indigo-900 font-semibold lg:text-left xl:text-5xl xl:text-bold">登入</h2> --}}

        @if ($errors->any())
          {{-- <x-admin-ferry::alert.error :errors="$errors" wrapper-class="mb-10" /> --}}
          <x-admin-ferry::alert type="error" :content="$errors" wrapper-class="mb-10" />
        @endif

        @if (session()->has('status'))
          {{-- <x-admin-ferry::alert.notify :message="session('status')" wrapper-class="mb-10" /> --}}
          <x-admin-ferry::alert type="notify" :content="session('status')" wrapper-class="mb-10" />
        @endif

        <form action="{{ $submitUrl }}" method="POST" autocomplete="on">

          @csrf

          <input name="remember" type="hidden" value="1">

          <div>
            <div class="text-sm font-semibold text-gray-500">Email</div>
            <input name="email" type="email" value="{{ old('email') }}" class="w-full text-lg px-0 py-1 border-0 border-b border-gray-300 focus:outline-none focus:border-indigo-500" required autocomplete="email
            ">
          </div>

          <div class="mt-8">
            <div class="flex justify-between items-center">
              <div class="text-sm font-semibold text-gray-500">密碼</div>
            </div>
            <input name="password" type="password" class="w-full text-lg px-0 py-1 border-0 border-b border-gray-300 focus:outline-none focus:border-indigo-500" required autocomplete="current-password">
          </div>

          @if ($passwordResetUrl)
            <div class="mt-8">
              <div class="flex justify-end">
                <a href="{{ $passwordResetUrl }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 cursor-pointer">忘記密碼</a>
              </div>
            </div>
          @endif

          <div class="mt-10">
            <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full font-semibold focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-md">
              登入
            </button>
          </div>
        </form>
        {{-- <div class="mt-12 text-sm font-semibold text-gray-700 text-center">
          Don't have an account ? <a class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign up</a>
        </div> --}}
      </div>

    </div>

  </section>
@endsection
