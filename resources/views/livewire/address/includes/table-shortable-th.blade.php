<th wire:click="setShortBy( '{{ $columnName }}' )">{{ $label }}
	@if ($shortBy !== $columnName)
	<i class="bi bi-chevron-expand"></i>
	@elseif ($shortDir == 'ASC')
	<i class="bi bi-chevron-up"></i>
	@else
	<i class="bi bi-chevron-down"></i>
	@endif
</th>