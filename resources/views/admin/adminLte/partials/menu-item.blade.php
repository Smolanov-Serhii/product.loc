@if (is_string($item))
    <li class="header">
        @lang($item)</li>
@elseif (isset($item['header']))
    <li class="header">@lang($item['header'])</li>
@else
    <li class="{{ $item['class'] }}">
        <a href="{{ $item['href'] }}">
            <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }}"></i>
            <span>@lang($item['text'])</span>
            @if (isset($item['label']) || isset($item['label_secondary']))
                <span class="pull-right-container">
                    @if(isset($item['label']))
                        <small class="label bg-{{ $item['label_color'] ?? 'red' }} pull-right"
                        >{{ $item['label'] }}</small>
                    @endif
                    @if(isset($item['label_secondary']))
                        <small class="label bg-{{ $item['label_secondary_color'] ?? 'red' }} pull-right"
                        >{{ $item['label_secondary'] }}</small>
                    @endif
                </span>
            @elseif (isset($item['submenu']))
                <span class="pull-right-container">
                    <i class="fas fa-angle-left pull-right"></i>
                </span>
            @endif
        </a>
        @if (isset($item['submenu']))
            <ul class="{{ $item['submenu_class'] }}">
                @each('admin/adminLte/partials.menu-item', $item['submenu'], 'item')
            </ul>
        @endif
    </li>
@endif
