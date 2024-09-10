@if ($errors->any())
<div {{ $attributes }}>
    <div class="px-4 py-2 rounded-lg text-sm bg-red-500 text-white">
        <div class="font-medium">{{ __('Uppss! Terjadi Kesalahan.') }}</div>
        <ul class="mt-1 list-disc list-inside text-sm">
            <!-- Error terhubung ke lang/en/auth.php -->
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif