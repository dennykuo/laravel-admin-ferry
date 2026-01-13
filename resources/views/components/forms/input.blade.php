{{-- 須注意 hidden 格式的 input，不要顯示父元素 --}}

@props([
  'id' => null,
  'name' => null,
  'label' => null,
  'type' => 'text',
  'value' => null,
  'wrapperClass' => '',
  'inputClass' => '',
  'prepend' => null,
  'append' => null,
])

@php
  // 因 Form 套件要傳入屬性陣列，使用 getAttributes() 取得屬性陣列
  $attributes = $attributes->class(["form-input {$inputClass}"])->getAttributes();

  if ($type === 'textarea') {
    $input = html()->textarea($name, $value)->attributes($attributes)->id($id);
  } else {
    $input = html()->input($type, $name, $value)->attributes($attributes)->id($id);
  }
@endphp

@if ($type !== 'hidden')
  <div class="form-group {{ $wrapperClass }}">
    @if ($label)
      <label>{{ $label }}</label>
    @endif

    @if (! $prepend && ! $append)
      {!! $input !!}
    @elseif ($prepend)
      <div class="form-prepend">
        <span>{{ $prepend }}</span>
        {!! $input !!}
      </div>
    @elseif ($append)
      <div class="form-append">
        {!! $input !!}
        <span>{{ $append }}</span>
      </div>
    @endif

    @if ($slot->isNotEmpty())
      <div class="mt-1.5">
        {!! $slot !!}
      </div>
    @endif

  </div>
@elseif ($type === 'hidden')
  {!! $input !!}
@endif
