@extends('_layouts.app')

@section('head')
  <!-- meta tags -->
@endsection

@section('content')
  <div id="page">
    <section id="hero">
      <img src="/assets/images/picture.png" alt="{{ $page->title }}" />
    </section>
    <section id="albums">
      @foreach ($albums as $album)
        <div class="album">
          <img src="{{ $album->cover }}" alt="{{ $album->title }} - {{ $page->title }}">
          <ul>
            @foreach ($album->links as $link)
              <li>
                <a href="{{ $link['url'] }}" target="_blank" title="{{ $link['name'] }}">
                  <img src="{{ $link['icon'] }}" alt="{{ $link['name'] }}">
                </a>
              </li>
            @endforeach
          </ul>
        @endforeach
      </div>
    </section>
  </div>
@endsection