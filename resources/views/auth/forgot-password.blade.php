@extends('admin-ferry::auth.@section')

@section('form')
  <form action="{{ $submitUrl }}" method="POST">

    @csrf

    <div>
      <div class="text-sm font-semibold text-gray-500">請輸入登入信箱，重設密碼</div>
      <input name="email" type="email" value="{{ old('email') }}" placeholder="輸入登入信箱"
            class="w-full text-lg px-0 py-1 border-0 border-b border-gray-300 focus:outline-none focus:border-indigo-500 placeholder-gray-400"
            required
            autocomplete="on">
    </div>

    <div class="mt-10">
      <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full font-semibold focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-md">
        送出
      </button>
    </div>

  </form>
@endsection
