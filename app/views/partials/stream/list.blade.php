@foreach($stream as $moment)
<article>
    <h6>{{ $moment->ago }}</h6>
    <h4><a href="{{ URL::route('stream.show', $moment->id) }}">{{ $moment->text }}</a></h4>
</article>
@endforeach