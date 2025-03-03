@foreach ($roles as $role)
    <span class="px-2 py-1 rounded text-white text-xs font-bold"
        style="background-color: {{ $role->color ?? '#000000' }}">
        {{ ucfirst($role->name) }}
    </span>
@endforeach
