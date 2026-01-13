@props([
  'size' => 'full',
  'isForm' => false,
  'wrapperClass' => null,
])

@php
  switch($size) {
    case 'full':
      $sizeClass = 'ferry-section-full';
      break;
    case 'md':
      $sizeClass = 'ferry-section-md';
      break;
    case 'lg':
      $sizeClass = 'ferry-section-lg';
      break;
    case 'xl':
      $sizeClass = 'ferry-section-xl';
      break;
    default:
      $sizeClass = '';
  }
@endphp

<section class="ferry-section-wrapper {{ $wrapperClass }}">

  <div {{ $attributes->class(['ferry-section', 'ferry-section-form' => $isForm, $sizeClass])->merge([]) }}>
    {{ $slot }}
  </div>

</section>
