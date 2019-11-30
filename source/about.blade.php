@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')
    <h1>About</h1>

    <img src="/assets/img/avatar.jpg"
        alt="About image"
        class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

    <p class="mb-6">My name is John, I’m 34, and I’ve been building on the web since I was 14. Like many others, I started out with Microsoft Frontpage and a boy's dream of making a web page to host links to my favorite Quake 2 skins. Naturally, I had so much fun doing it that it that I continued soaking up everything I could on the subject.</p>

    <p class="mb-6">Around 2009, I got my first job as a “real” designer/developer. Since then, I've worked my way from making simple brochure-style websites sprinkled with a little bit of jQuery and PHP, to small applications with Codeigniter and jQuery/Mootools, to bigger applications with Laravel, React/Vue, with cacheing, authentication, authorization, job queues, payment gateways, apis, etc.</p>

    <p class="mb-6">Today, I am part of a small remote software company in the healthcare space where I envision, present, plan, design, and then build about half of the pieces of our SAAS product. I work with tools like Laravel, git, React/ Vue, Figma/Sketch, Slack, Basecamp/Notion, etc on a daily basis. We build/sell a “patient experience platform”, which is really just marketing speak for surveys. There’s more to it than that of course with EMR integration, heathcare compliance, incident management, etc. But I’ve learned that surveys are easy for people to digest when explaining what I do.</p>

    <p class="mb-6">In my off-hours, I travel full-time in our RV with my family of 5 plus our dog (who enjoys burrowing in the ground like an Aardvark). We’ve spent the last year and a half exploring and learning about our beautiful nation. (Proof: @freemansboldlygo on Instagram). While we don’t feel like we are done traveling, we’re open to buying a house and settling down again, if the right opportunity comes along.</p>

    <h2>Why you should consider me for your team</h2>

    <p class="mb-6">I believe the person you are looking for is me. Not only do I meet all of Tighten’s must-have requirements, technical and non-technical; I also
    meet most of your nice-to-haves. While I know what React Native and Docker are, I have no meaningful experience yet. But definitely interested in learning more about these!
    Like Matt, all of my technical education is self-taught. I love learning about new technologies and new ways of doing things. A good challenge excites me. By nature, I’m a curious person and take great pride in solving problems. I enjoy paying close attention to detail and sweating the small stuff.</p>

    <h3>Qualifications</h3>

    <ul>
        <li>10 years design/programming professionally, 4 of those remote</li>
        <li>About 4 years of full-time Laravel/React experience</li>
        <li>About a year of Vue experience</li>
        <li>Almost 2 decades of hand written PHP, HTML, and CSS experience</li>
        <li>About 10 years of Javascript experience</li>
        <li>Proficient in modern tooling such as Git, Sublime, Artisan, Webpack, Mix, NPM, Composer, etc.</li>
        <li>About 6 years of testing experience (although I definitely leveled up a few notches with Adam Wathan’s Test Driven Laravel course)</li>
        <li>Recently learning/experimenting with newer technologies like Caleb Porzio’s Livewire and Jonathan Reinink’s Inertia</li>
        <li>And more! I have experience with many other things that may or may not be relevant to Tighten... Let’s chat!</li>
    </ul>

@endsection
