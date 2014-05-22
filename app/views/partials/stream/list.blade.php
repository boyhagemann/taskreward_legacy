@foreach($stream as $moment)
<article>
    <h5>{{ $moment->action->title }} {{ $moment->ago }}</h5>
    <p><a href="{{ URL::route('stream.show', $moment->id) }}">{{ $moment->message }}</a></p>
</article>
@endforeach