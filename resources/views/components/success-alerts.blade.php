@props(['success'])

<div {{ $attributes }}>
    <div class="font-medium text-green-600">
        Успех
    </div>

    <ul class="mt-3 list-disc list-inside text-sm text-green-600">
        <li>{{ $success }}</li>
    </ul>
</div>
