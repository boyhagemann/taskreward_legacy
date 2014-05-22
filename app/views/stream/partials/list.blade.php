@foreach($stream as $event)
<article>
    <h5>{{ $event->action->title }} {{ $event->ago }}</h5>
    <p><a href="{{ URL::route('stream.show', $event->id) }}">{{ $event->message }}</a></p>
</article>
@endforeach