@props([
  'errors' => null,
  'wrapperClass' => '',
  'closeBtnClass' => '',
])

@if (is_string($errors) || count($errors->all()))
<div class="flex items-center bg-red-50 border-t-4 border-red-600 px-4 py-4 text-red-600 font-semibold shadow-sm {{ $wrapperClass }}">
  <div class="w-full flex items-center">
    {{-- <svg class="h-8 w-8 text-red-600 mr-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
    </svg> --}}

    <i class="fa-solid fa-circle-exclamation mr-4 fa-xl"></i>

    @if (is_string($errors))
      {{ $errors }}
    @elseif (count($errors->all()) == 1)
      {{ $errors->first() }}
    @else
      <ul>
        @foreach ($errors->all() as $error)
          <li class="leading-7">{{ $error }}</li>
        @endforeach
      </ul>
    @endif

  </div>

  <button type="button"
          class="flex-shrink-0 flex rounded-md {{ $closeBtnClass }}"
          onclick="this.parentElement.remove();"
    >
    <i class="fa-solid fa-xmark fa-xl"></i>
  </button>

</div>
@endif
