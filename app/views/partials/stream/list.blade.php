@foreach($stream as $moment)
<article>
    <h6>{{ $moment->action->title }} <strong>{{ $moment->ago }}</strong></h6>
    <h4><a href="{{ URL::route('stream.show', $moment->id) }}">{{ $moment->message }}</a></h4>
</article>
@endforeach