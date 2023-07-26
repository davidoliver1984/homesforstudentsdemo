

@foreach($posts as $post)
    <p><strong>{{ $post->title }}</strong></p>
    <p>{{ $post->excerpt }}</p>
    <p><small>{{ $post->created_at }}</small></p>
@endforeach


