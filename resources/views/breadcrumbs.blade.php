
@if(count($breadcrumbs) > 0)
    <section class="content-header">
        <!-- Структура согласно AdminLTE -->
        <h1>
            @foreach ($breadcrumbs as $item)
                @if ($loop->last)
                    {{ $item['label'] }}
                @endif
            @endforeach
        </h1>

        <ol class="breadcrumb">
            @foreach($breadcrumbs as $item)
                <li>
                    @if($item['url'] ?? false)
                        <a href="{{ $item['url'] }}">
                            {{ $item['label'] }}  {!! "&nbsp;" !!}
                        </a>
                    @else
                        <span>
                            {{ $item['label'] }}
                        </span>
                    @endif
                </li>
            @endforeach
        </ol>
    </section>
@endif
