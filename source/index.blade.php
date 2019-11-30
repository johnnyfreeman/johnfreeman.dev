@extends('_layouts.master')

@section('body')
    <header class="flex flex-col md:flex-row items-center mb-20">
        <img src="/assets/img/avatar.jpg"
        alt="About image"
        class="flex rounded-full h-48 w-48 bg-contain mx-auto my-6 md:mr-10">

        <div>
            <h1 class="">Hey, I’m John, a details-oriented, full-stack maker of things.</h1>
            <ul class="list-none flex items-center">
                <li class="mr-1">Find me on:</li>
                <li class="mr-1"><a href="https://twitter.com/TherelsNoTry" class="h-4 w-4 inline-block fill-current"><svg id="Bold" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.32,6.44a.5.5,0,0,0-.2-.87l-.79-.2A.5.5,0,0,1,22,4.67l.44-.89a.5.5,0,0,0-.58-.7l-2,.56a.5.5,0,0,1-.44-.08,5,5,0,0,0-3-1,5,5,0,0,0-5,5v.36a.25.25,0,0,1-.22.25c-2.81.33-5.5-1.1-8.4-4.44a.51.51,0,0,0-.51-.15A.5.5,0,0,0,2,4a7.58,7.58,0,0,0,.46,4.92.25.25,0,0,1-.26.36L1.08,9.06a.5.5,0,0,0-.57.59,5.15,5.15,0,0,0,2.37,3.78.25.25,0,0,1,0,.45l-.53.21a.5.5,0,0,0-.26.69,4.36,4.36,0,0,0,3.2,2.48.25.25,0,0,1,0,.47A10.94,10.94,0,0,1,1,18.56a.5.5,0,0,0-.2,1,20.06,20.06,0,0,0,8.14,1.93,12.58,12.58,0,0,0,7-2A12.5,12.5,0,0,0,21.5,9.06V8.19a.5.5,0,0,1,.18-.38Z"/></svg></a></li>
                <li class="mr-1"><a href="https://github.com/johnnyfreeman" class="h-4 w-4 inline-block fill-current"><svg id="Bold" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22.13,9.48c.52-1.06,2.21-5.1-.86-7.61A.5.5,0,0,0,21,1.75C19,1.75,16.51,4.2,15.74,5A14.61,14.61,0,0,0,8.3,5C7.51,4.19,5,1.75,3.08,1.75a.5.5,0,0,0-.32.11C.12,4,.92,7.52,1.89,9.44a9.41,9.41,0,0,0-1.31,5.8c.26,3.31,3,7,6.48,7h9.89c3.5,0,6.23-3.69,6.48-7A9.4,9.4,0,0,0,22.13,9.48ZM16,19.75H8a3.5,3.5,0,0,1-3.5-3.5c0-5.91,4.13-3.53,7.5-3.53s7.5-2.44,7.5,3.53A3.5,3.5,0,0,1,16,19.75Z"/><ellipse cx="15.52" cy="16.25" rx="1" ry="1.5"/><ellipse cx="8.52" cy="16.25" rx="1" ry="1.5"/></svg></a></li>
            </ul>
        </div>
    </header>

    @foreach ($posts->where('featured', true) as $featuredPost)
        <div class="w-full mb-6">
            @if ($featuredPost->cover_image)
                <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image" class="mb-6">
            @endif

            <p class="text-gray-700 font-medium my-2">
                {{ $featuredPost->getDate()->format('F j, Y') }}
            </p>

            <h2 class="text-3xl mt-0">
                <a href="{{ $featuredPost->getUrl() }}" title="Read {{ $featuredPost->title }}" class="text-gray-900 font-extrabold">
                    {{ $featuredPost->title }}
                </a>
            </h2>

            <p class="mt-0 mb-4">{!! $featuredPost->getExcerpt() !!}</p>

            <a href="{{ $featuredPost->getUrl() }}" title="Read - {{ $featuredPost->title }}" class="uppercase tracking-wide mb-4">
                Read
            </a>
        </div>

        @if (! $loop->last)
            <hr class="border-b my-6">
        @endif
    @endforeach

    @include('_components.newsletter-signup')

    @foreach ($posts->where('featured', false)->take(6)->chunk(2) as $row)
        <div class="flex flex-col md:flex-row md:-mx-6">
            @foreach ($row as $post)
                <div class="w-full md:w-1/2 md:mx-6">
                    @include('_components.post-preview-inline')
                </div>

                @if (! $loop->last)
                    <hr class="block md:hidden w-full border-b mt-2 mb-6">
                @endif
            @endforeach
        </div>

        @if (! $loop->last)
            <hr class="w-full border-b mt-2 mb-6">
        @endif
    @endforeach
@stop
