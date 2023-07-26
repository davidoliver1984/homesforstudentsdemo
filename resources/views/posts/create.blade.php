@extends('layouts.master')

@section('content')

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="font-extrabold text-xl pb-3">Add Blog Entry</h1>
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog
                        title</label>
                    <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900
                    text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                    dark:focus:border-blue-500 form-control @error('title') is-invalid @enderror"
                           placeholder="Your blog title here">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong class="p-2 text-orange-700">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog
                        excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50
                    rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700
                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="Your blog excerpt here" required></textarea>
                    @error('excerpt')
                    <span class="invalid-feedback" role="alert">
                        <strong class="p-2 text-orange-700">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog
                        body</label>
                    <textarea id="body" name="body" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
                    border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="Your blog text here" required></textarea>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong class="p-2 text-orange-700">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image_url">Upload
                        image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
                    dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           aria-describedby="image_url" id="image_url" name="image_url" type="file">
                </div>
                <button type="submit" class="bg-orange-600 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </form>

        </div>
    </section>

@endsection
