@if ($annotations)
    <div class="list-group">
        <li class="list-group-item list-group-item-warning">Seleziona un evento</li>

        @foreach($annotations as $item)
            @set('active', (isset($name) and $name === $item->name))

            <a href="{{ route('annotations.show', $item->name) }}" class="list-group-item text-uppercase {{ $active ? 'active' : 'inactive' }}">
                {{ $item->date->format('l j F') }}
            </a>
        @endforeach
    </div>
@endif
