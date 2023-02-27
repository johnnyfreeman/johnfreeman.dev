<div class="flex items-center">
    @auth
        <div class="hidden md:block mr-2 text-gray-500">{{ auth()->user()->email }}</div> <div class="font-bold text-orange-300 light:text-orange-600">#</div>
    @else
        <div class="hidden md:block mr-2 text-gray-500">guest@johnfreeman.dev</div> <div class="font-bold text-orange-300 light:text-orange-600">$</div>
    @endauth
</div>