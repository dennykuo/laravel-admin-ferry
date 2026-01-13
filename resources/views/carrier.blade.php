@if (request()->ajax())
  @include('admin-ferry::partials.content')
@else
  @extends('admin-ferry::layouts.master')
@endif
