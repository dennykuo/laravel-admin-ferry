@props([
  'id' => null,
  'name' => null,
  'label' => null,
  'options' => [], // ['value' => 'key']
  'checked' => null, // value, null, false (不做任何預先選擇)
  'wrapperClass' => '',
  'inputClass' => '',
])

@php
  $attributes = $attributes->class(["form-radio {$inputClass}"])->getAttributes();

  if ($checked === null) {
    $checked = array_key_first($options); // 設為第一個選項
  }
@endphp

<div class="form-group {{ $wrapperClass }}">
  @if ($label)
    <label>{{ $label }}</label>
  @endif

  <div class="flex flex-row flex-wrap">
    @foreach($options as $value => $text)
      <label class="mr-5">
        {!! html()->radio($name, $checked == $value ? true : null, $value)->attributes($attributes)->id($id) !!}
        <span class="ml-1.5 cursor-pointer">{{ $text }}</span>
      </label>
    @endforeach
  </div>

  {!! $slot !!}
</div>
