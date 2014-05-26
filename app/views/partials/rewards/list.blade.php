@foreach($rewards as $reward)
<article>
    <h3>{{ $reward->token->task->product_title }}</h3>
    <p>{{ $reward->value }} {{ $reward->currency }}</p>
</article>
@endforeach