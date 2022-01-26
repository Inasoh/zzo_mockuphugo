@php
    $sentences = collect($post->ingredients['sentences']);
    $images = collect($post->ingredients['images']);
@endphp

<article>
## **{{ $post->title }}**. {{ $sentences->take(15)->shuffle()->take(2)->implode(' ') }}
@php $image = collect($images)->shuffle()->pop(); @endphp
@if($image)

\n<figure>
    ![{{ $image['title'] }}](<img src="{{ $image['image'] }}" style="width: 100%; padding: 5px; background-color: grey;"  onerror="this.onerror=null;this.src='{{ $image['thumbnail'] }}';"></a>)
            <figcaption>{{ $image['title'] }} from {{ parse_url($image['image'], PHP_URL_HOST) }}</figcaption>
</figure>
@endif
{{ $sentences->shuffle()->take(3)->implode(' ') }}

### {{ $sentences->shuffle()->pop() }}
    {{ $sentences->shuffle()->pop() }} {{ $sentences->shuffle()->take(30)->implode(' ') }}
</article>

<section>
@foreach(collect($images)->shuffle()->take(15) as $image)
    <aside>
        ![{{ $image['title'] }}](<a href="{{ $image['image'] }}" target="_blank"><img src="{{ $image['image'] }}" width="100%" onerror="this.onerror=null;this.src='{{ $image['thumbnail'] }}';"></a>)

        
        <small>Source: {{ parse_url($image['image'], PHP_URL_HOST) }}</small>
        ### {{ $sentences->shuffle()->pop() }}
    </aside>
@endforeach
</section>