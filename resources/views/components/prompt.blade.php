<div class="flex items-center space-x-2">
    @auth
        <div class="hidden md:block text-vonCount">{{ auth()->user()->email }}</div> <div class="font-bold text-blade-300 light:text-blade-600">#</div>
    @else
        <div class="hidden md:block text-vonCount">guest@johnfreeman.dev</div> <div class="font-bold text-blade-300 light:text-blade-600">$</div>
    @endauth
</div>