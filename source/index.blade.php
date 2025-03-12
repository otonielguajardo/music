@extends('_layouts.app')

@section('head')
  <!-- meta tags -->
@endsection

@section('content')
  <div id="page">
    <section id="hero">
      <img src=" {{ url('/assets/images/picture.png') }}" alt="{{ $page->title }}" />
    </section>
    <section id="albums">
      @foreach ($albums as $album)
        <div class="album">
          <img src="{{ url($album->cover) }}" alt="{{ $album->title }} - {{ $page->title }}">
          <ul>
            @foreach ($album->links as $link)
              <li>
                @if ($link['active']) 
                    <a href="{{ $link['url'] }}" target="_blank" title="{{ $link['name'] }}">
                        <img src="{{ url($link['icon']) }}" alt="{{ $link['name'] }}">
                    </a>
                @else
                    <img class="disabled" src="{{ url($link['icon']) }}" alt="{{ $link['name'] }}">
                @endif
              </li>
            @endforeach
          </ul>
        @endforeach
      </div>
    </section>
  </div>
@endsection