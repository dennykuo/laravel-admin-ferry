@props([
  'name' => null,
  'label' => null,
  'hasTime' => false,
  'value' => null,
  'wrapperClass' => '',
  'inputClass' => '',
])

@php
  $attributes = $attributes->class(["js-datepicker form-input {$inputClass}"])
                           ->merge(['autocomplete' => 'off'])
                           ->getAttributes();

  $input = html()->input('text', $name, $value)->attributes($attributes);
@endphp

<div class="form-group {{ $wrapperClass }}">
  @if ($label)
    <label>{{ $label }}</label>
  @endif

  {!! $input !!}

  <div class="mt-2.5">
    {!! $slot !!}
  </div>

</div>

@once
  <script>
    // Vue Component standalone
    ['DOMContentLoaded', 'htmx:afterSwap'].forEach((event) => {
      handleDatePickerInit(event);
    });

    function handleDatePickerInit(event) {
      document.addEventListener(event, function() {
        var elements = document.querySelectorAll('.js-datepicker');
        elements = Array.prototype.slice.call(elements);
        elements.forEach(function(el) {
          new Datepicker(el, {
            autohide: true,
            clearBtn: true,
            format: 'yyyy-mm-dd',
            language: 'zh-TW'
          });
        });

        // Array.prototype.forEach.call(elements, function (el) {
        //   new Datepicker(el, {
        //     autohide: true,
        //     clearBtn: true,
        //     format: 'yyyy-mm-dd',
        //     language: 'zh-TW'
        //   });
        // });

      });
    }
  </script>
@endonce
