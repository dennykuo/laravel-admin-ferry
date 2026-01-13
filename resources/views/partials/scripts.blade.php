@stack('scripts')

@if (config('admin-ferry.scripts-view'))
  @includeIf(config('admin-ferry.scripts-view'))
@endif
