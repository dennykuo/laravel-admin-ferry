<section id="ferry-content-container-wrapper" class="is-show">

  <main id="ferry-content-container">

    @includeWhen($viewParams->get('breadcrumb', null) !== false, 'admin-ferry::partials.breadcrumb')

    @if ($title = \Arr::get($viewParams, 'page.name', null))
      <div class="ferry-content-title-set">
        <div class="ferry-content-title-border"></div>
        <h1 class="ferry-content-title">{{ $title }}</h1>
      </div>
    @endif

    {!! $viewContent !!}

  </main>

</section>
