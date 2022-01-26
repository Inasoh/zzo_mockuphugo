@php
    $sentences = collect($post->ingredients['sentences']);
    $images = collect($post->ingredients['images']);
@endphp

<article>
<p><h2><strong>{{ $post->title }}</h2></strong>.</h2></p> <p>{{ $sentences->take(15)->shuffle()->take(2)->implode(' ') }}</p>
@php $image = collect($images)->shuffle()->pop(); @endphp
@if($image)
<br><figure>
    <img src="{{ $image['image'] }}" alt="{{ $image['title'] }}" style="width: 100%; padding: 5px; background-color: grey;"  onerror="this.onerror=null;this.src='{{ $image['thumbnail'] }}';">
            <figcaption>{{ $image['title'] }} from {{ parse_url($image['image'], PHP_URL_HOST) }}</figcaption>
</figure>
@endif
{{ $sentences->shuffle()->take(3)->implode(' ') }}

<h3>{{ $sentences->shuffle()->pop() }}</h3>
    <p>{{ $sentences->shuffle()->pop() }} {{ $sentences->shuffle()->take(30)->implode(' ') }}</p>
</article>

<section>
@foreach(collect($images)->shuffle()->take(15) as $image)
    <aside>
        <a href="{{ $image['image'] }}" target="_blank"><img alt="{{ $image['title'] }}" src="{{ $image['image'] }}" width="100%" onerror="this.onerror=null;this.src='{{ $image['thumbnail'] }}';"></a>
        <small>Source: {{ parse_url($image['image'], PHP_URL_HOST) }}</small>
        <p><h3 id="configuration-of-configtoml">{{ $sentences->shuffle()->pop() }}</h3></p>
    </aside>
@endforeach
</section>
