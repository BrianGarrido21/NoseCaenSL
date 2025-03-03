@foreach ($statuses as $status)
    <span class="px-2 py-1 rounded text-white text-xs font-bold"
    
        style="background-color: {{ $status->color ?? '#000000' }}">
        {{ ucfirst($status->name) }}
    </span>
@endforeach
