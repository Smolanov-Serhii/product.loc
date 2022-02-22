@php
    $alt = $alt ?? '';
@endphp
<picture>
    @if($image->value)
        @php
            $folder_name = 'contents';
            $storagePath = \Illuminate\Support\Facades\Storage::disk('public')->path($folder_name);
            $basename = pathinfo($image->value, PATHINFO_FILENAME);
        @endphp
        @switch(true)
            @case (file_exists("{$storagePath}/1024/{$image->value}"))
                <source srcset="{{ "/uploads/{$folder_name}/1024/{$basename}.webp"}}" media="(max-width: 1024px)" type="image/webp">
                <source srcset="{{ "/uploads/{$folder_name}/1024/{$image->value}"}}" media="(max-width: 1024px)">
            @case (file_exists("{$storagePath}/768/{$image->value}"))
                <source srcset="{{ "/uploads/{$folder_name}/768/{$basename}.webp"}}" media="(max-width: 768px)" type="image/webp">
                <source srcset="{{ "/uploads/{$folder_name}/768/{$image->value}"}}" media="(max-width: 768px)">
            @case (file_exists("{$storagePath}/480/{$image->value}"))
                <source srcset="{{ "/uploads/{$folder_name}/480/{$basename}.webp"}}" media="(max-width: 480px)" type="image/webp">
                <source srcset="{{ "/uploads/{$folder_name}/480/{$image->value}"}}" media="(max-width: 480px)">
        @endswitch
        <source srcset="{{ "/uploads/{$folder_name}/{$basename}.webp"}}" >
        <img src="{{ url('/img/admin/1x1.png') }}" data-src="{{ "/uploads/{$folder_name}/{$image->value}"}}" alt="">
    @elseif($image->default_value)
        @php
            $folder_name = 'block_template_attributes';
            $storagePath = \Illuminate\Support\Facades\Storage::disk('public')->path($folder_name);
            $basename = pathinfo($image->default_value, PATHINFO_FILENAME);
        @endphp
        @switch(true)
            @case (file_exists("{$storagePath}/1024/{$image->default_value}"))
                <source srcset="{{ "/uploads/{$folder_name}/1024/{$basename}.webp"}}" media="(max-width: 1024px)" type="image/webp">
                <source srcset="{{ "/uploads/{$folder_name}/1024/{$image->default_value}"}}" media="(max-width: 1024px)">
            @case (file_exists("{$storagePath}/768/{$image->default_value}"))
                <source srcset="{{ "/uploads/{$folder_name}/768/{$basename}.webp"}}" media="(max-width: 768px)" type="image/webp">
                <source srcset="{{ "/uploads/{$folder_name}/768/{$image->default_value}"}}" media="(max-width: 768px)">
            @case (file_exists("{$storagePath}/480/{$image->default_value}"))
                <source srcset="{{ "/uploads/{$folder_name}/480/{$basename}.webp"}}" media="(max-width: 480px)" type="image/webp">
                <source srcset="{{ "/uploads/{$folder_name}/480/{$image->default_value}"}}" media="(max-width: 480px)">
        @endswitch
        <source srcset="{{ "/uploads/{$folder_name}/{$basename}.webp"}}" >
        <img src="{{ url('/img/admin/1x1.png') }}" data-src="{{ "/uploads/{$folder_name}/{$image->value}"}}" alt="">
    @endif
</picture>