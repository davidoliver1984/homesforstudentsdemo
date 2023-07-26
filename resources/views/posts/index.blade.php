@extends('layouts.master')

@section('content')

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">

            @if (session('status'))
                <div class="alert alert-success border-2 p-4 text-center text-orange-500 border-orange-600">
                    {{ session('message') }}
                </div>
            @endif

            @php
                $x = 1;
            @endphp

            @if($query)
                <h1 class="font-extrabold text-xl pb-3">Search results for: {{ $query }}</h1>
            @else
                <img src="homes_for_students_text.png" alt="Homes For Students">
            @endif
{{--            @dd($posts)--}}
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                @if($posts)
                    @foreach($posts as $post)
                        <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full"
                                     src="@if($post->image_url) /storage/images/{{ $post->image_url }} @else https://source.unsplash.com/random/200x200?sig={{$x}} @endif">
                            </div>

                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{ $post->title }}</h1></h2>
                            <p class="text-base leading-relaxed mt-2">{{ $post->excerpt }}</p>
                            <a class="text-orange-600 inline-flex items-center mt-3" href="/posts/{{ $post->id }}">Learn
                                More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>


                            @auth
                                @if(auth()->id() == $post->user_id or Auth::user()->is_admin > 0)
                                    <a class="text-orange-600 inline-flex items-center mt-3"
                                       href="/posts/{{$post->id}}/edit">Edit
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>

                                    <a class="text-orange-600 inline-flex items-center mt-3"
                                       href="/posts/{{$post->id}}/delete">Delete
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endif
                            @endauth
                        </div>

                        @php
                            $x++;
                        @endphp

                    @endforeach
                @else
                    <p class="text-black">No results to display</p>
                @endif
            </div>
        </div>
    </section>


    <div class="pt-2">
        {{ $posts->links()}}
    </div>

@endsection
