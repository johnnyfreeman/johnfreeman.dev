<div class="flex items-center space-x-2">
    @auth
    <span class="text-gray-400">{{ auth()->user()->email }}</span> <span class="font-bold text-orange-300 light:text-orange-600">#</span>
    @else
    <span class="font-bold text-orange-300 light:text-orange-600">$</span>
    @endauth
</div>