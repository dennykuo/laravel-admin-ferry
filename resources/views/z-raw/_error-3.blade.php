{{-- 樣式太像 input，之後會棄用 --}}

@props([
  'errors',
  'wrapperClass' => '',
  'closeBtnClass' => '',
])

<div class="flex items-center bg-white border border-pink-200 leading-none rounded-full p-1.5 shadow-sm {{ $wrapperClass }}">
  <span class="inline-flex bg-pink-600 text-white rounded-full px-2.5 py-0.5 mr-3 justify-center items-center text-sm">
    錯誤
  </span>
  <span class="inline-flex items-center px-2 text-pink-600">
    @if (is_string($errors))
      {{ $errors }}
    @else
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
  </span>
</div>
