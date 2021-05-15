@props([
  'model',
  'url' => null,
  'method' => 'post',
  'files' => false,
  'class',
])

@php
  $attributes = ['url' => $url ?? '', 'method' => $method, 'files' => $files, 'class' => 'space-y-default'];
@endphp

@if (isset($model))
{!! Form::model($model ,$attributes) !!}
@else
{!! Form::open($attributes) !!}
@endif

  {{ $slot }}

{!! Form::close() !!}
