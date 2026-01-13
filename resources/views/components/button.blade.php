@props([
  'tag' => 'a',
  'size' => 'md',
  'color' => 'blue',
])

@php
  $class = 'btn' . ' '; // 留意後方空格

  switch ($size) {
    case 'xs':
      $class .= 'btn-xs';
      break;

    case 'sm':
      $class .= 'btn-sm';
      break;

    case 'md':
      $class .= 'btn-md';
      break;

    case 'lg':
      $class .= 'btn-lg';
      break;
  }

  // 顏色
  $class .= ' ' . "btn-{$color}"; // 空格分隔
@endphp

<{{ $tag }} {{ $attributes->class([$class])->merge() }}>{{ $slot }}</{{ $tag }}>
