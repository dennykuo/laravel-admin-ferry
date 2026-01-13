@extends('admin-ferry::auth.@section')

@section('form')
  <form action="{{ $submitUrl }}" method="POST">

    @csrf

    <input type="hidden" name="token" value="{{ request()->route('token') }}">

    <div>
      <div class="text-sm font-semibold text-gray-500">Email</div>
      <input name="email" type="email" value="{{ old('email') }}" class="w-full text-lg px-0 py-1 border-0 border-b border-gray-300 focus:outline-none focus:border-indigo-500" required autocomplete="on">
    </div>

    <div class="mt-8">
      <div class="flex justify-between items-center">
        <div class="text-sm font-semibold text-gray-500">密碼</div>
      </div>
      <input name="password" type="password" class="w-full text-lg px-0 py-1 border-0 border-b border-gray-300 focus:outline-none focus:border-indigo-500" required>
    </div>

    <div class="mt-8">
      <div class="flex justify-between items-center">
        <div class="text-sm font-semibold text-gray-500">再次輸入密碼</div>
      </div>
      <input name="password_confirmation" type="password" class="w-full text-lg px-0 py-1 border-0 border-b border-gray-300 focus:outline-none focus:border-indigo-500" required>
    </div>

    <div class="mt-10">
      <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full font-semibold focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-md">
        送出
      </button>
    </div>
  </form>
@endsection
