@if (Auth::user()->like_post($micropost->id))
    {!! Form::open(['route' => ['post.unlike', $micropost], 'method' => 'delete']) !!}
    {!! Form::submit('Unlike', ['class' => "btn btn-default  btn-xs"]) !!}
    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['post.like', $micropost]]) !!}
    {!! Form::submit('Like', ['class' => "btn btn-default  btn-xs"]) !!}
    <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
    {!! Form::close() !!}
@endif
