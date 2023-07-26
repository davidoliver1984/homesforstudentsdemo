
<nav class="bg-[#E8A35C] p-2 mt-0 fixed w-full z-10 top-0">
    <div class="container mx-auto flex flex-wrap items-center">
        <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                <span class="text-2xl pl-2"><a href="/"><img src="/homes_for_students_logo.png" alt="Homes For Students"></a></span>
            </a>
        </div>
        <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">

                <li class="mr-3">
                    @auth
                        <a href="{{ url('/create') }}"
                           class="font-semibold bg-[#E8A35C] px-4 text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Add Blog Post</a>
                        <a href="{{ url('/dashboard') }}"
                           class="font-semibold bg-[#E8A35C] px-4 text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="font-semibold text-white p-4 bg-[#E8A35C] hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 font-semibold p-4 bg-[#E8A35C] text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </li>
                <li class="mr-3">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <input type="text" id="query" name="query"/>
                        <button class="bg-orange-600 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded">
                            Search
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
