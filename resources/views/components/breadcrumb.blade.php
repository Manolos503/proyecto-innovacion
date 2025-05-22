<nav class="me-auto d-flex d-none d-md-block ps-4 border-start" aria-label="breadcrumb">
  <ol class="breadcrumb m-0">
    @if (!empty($firstItem))
      <li class="breadcrumb-item active fw-bold" aria-current="page">{{ $firstItem }}</li>
    @endif

    @foreach ($items as $breadcrumb)
      <li class="breadcrumb-item" aria-current="page">
        @if ($breadcrumb->url)
          <a href="{{ $breadcrumb->url }}" class="link-light">{{ $breadcrumb->title }}</a>
        @else
          {{ $breadcrumb->title }}
        @endif
      </li>
    @endforeach
  </ol>
</nav>
