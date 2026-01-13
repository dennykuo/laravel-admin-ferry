@props([
  'name' => null,
  'label' => null,
  'wrapperClass' => '',
])

<div class="form-group {{ $wrapperClass }}" {{ $attributes }}>
  @if ($label)
    <label>{{ $label }}</label>
  @endif

  {!! $slot !!}

</div>
