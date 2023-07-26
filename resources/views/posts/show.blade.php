@extends('layouts.master')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div><h1 class="font-extrabold text-6xl pb-3 text-orange-400">Viewing: {{ $post->title }}</h1></div>
            <div><h2
                    class="text-bas e leading-relaxed mt-2 font-extrabold text-4xl text-transform: uppercase text-gray-300 ">{{ $post->excerpt }}</h2>
            </div>
            <div>
                <p class="text-2xl text-orange-600">
                    <time>{{ $post->created_at->format('j F, Y') }}</time>
                </p>
            </div>
            <div class="">
                <div class="rounded-lg h-64 overflow-hidden m-6">
                    <img alt="content" class="object-cover object-center h-full w-full"
                         src="@if($post->image_url) /storage/images/{{ $post->image_url }} @else https://source.unsplash.com/random/200x200?sig={{$x}} @endif">
                </div>
                <p class="text-base leading-relaxed mt-2">{{ $post->body }}</p></div>
            <div class="mb-20">
                @auth
                    <form action="/comments/{{ $post->id }}" method="post">
                        @csrf
                        <h2 class="text-base leading-relaxed mt-4 font-extrabold text-2xl text-transform: uppercase text-gray-500 ">
                            Leave a comment</h2>
                        <textarea id="body" name="body" rows="8" class="block p-2.5 w-full text-sm text-gray-900
                    bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                  placeholder="Leave comment..." required></textarea>
                        <button type="submit"
                                class="bg-orange-600 hover:bg-orange-500 text-white font-bold py-2 px-4 mt-2 rounded">
                            Add Comment
                        </button>
                    </form>
                @endauth
                <hr>
                <div>
                    <section class="mt-5 space-y-6 mx-6">
                        @foreach ($post->comments()->latest()->paginate(10) as $comment)
                            <div class="border-2 p-2 m-1">
                                <p>{{ $comment->author->name }}</p>
                                <p>{{ $comment->body }}</p>
                                <p class="text-sm">{{ $comment->created_at->format('j F, Y') }}</p>
                                @auth
                                    @if(auth()->id() == $comment->user_id or Auth::user()->is_admin > 0)
                                        <a href="/comments/{{ $comment->id }}/delete" class="text-orange-600 text-sm">Delete
                                            Comment</a>
                                    @endif
                                @endauth

                            </div>
                        @endforeach
                    </section>
                </div>
            </div>


        </div>
        </div>
    </section>

@endsection
