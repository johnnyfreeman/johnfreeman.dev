<div class="flex items-center space-x-2">
    @auth
    <div class="text-gray-600">{{ auth()->user()->email }}</div> <div class="font-bold text-orange-300 light:text-orange-600">#</div>
    @else
    <div class="text-gray-400">guest@johnfreeman.dev</div> <div class="font-bold text-orange-300 light:text-orange-600">$</div>
    @endauth
</div>