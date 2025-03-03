<div class="flex items-center space-x-2">
    @if (!empty($color))
        <i class="fa-solid fa-palette fa-xl" style="color: {{ $color }};"></i>
    @else
        <span class="px-2 py-1 rounded text-white text-xs font-bold bg-gray-500">Not selected yet</span>
    @endif
</div>