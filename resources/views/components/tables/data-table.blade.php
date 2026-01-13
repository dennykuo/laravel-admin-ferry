@props([
  'wrapperClass' => '',
  'tableClass' => '',
  'isResponsive' => true,
  'verticalAlignTop' => false,
])

<div class="{{ $wrapperClass }}" {{ $attributes }}>
  <table class="data-table
                {{ $isResponsive ? 'is-responsive' : '' }}
                {{ $tableClass }}
                {{ $verticalAlignTop ? 'vertical-align-top' : '' }}
  ">
    {{ $slot }}
  </table>
</div>
