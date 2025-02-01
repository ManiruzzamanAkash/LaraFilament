@props(['record'])

<div style="display: flex; align-items: center;">
    @if ($record->image)
        <img src="{{ asset('storage/' . $record->image) }}" alt="{{ $record->name }}" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
    @endif
    <div>
        <div style="font-weight: bold;">{{ $record->name }}</div>
        <div style="font-size: 0.9em; color: gray;" title="{{ $record->slug }}">{{ Str::limit($record->slug, 30) }}</div>
    </div>
</div>
