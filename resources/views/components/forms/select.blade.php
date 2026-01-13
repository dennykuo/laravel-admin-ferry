@props([
  'id' => null,
  'name' => null,
  'label' => null,
  'options' => [], // ['value' => 'key']
  'value' => null,
  'wrapperClass' => '',
  'inputClass' => '',
])

@php
  $attributes = $attributes->class(["form-select {$inputClass}"])->getAttributes();
@endphp

<div class="form-group {{ $wrapperClass }}">
  @if ($label)
    <label>{{ $label }}</label>
  @endif

  {!! html()->select($name, $options, $value)->attributes($attributes)->id($id) !!}

  @if ($slot->isNotEmpty())
    <div class="mt-1.5">
      {!! $slot !!}
    </div>
  @endif
</div>
