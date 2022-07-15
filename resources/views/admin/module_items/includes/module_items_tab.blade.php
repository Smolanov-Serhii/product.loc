<div class="form-group clearfix icheck-primary-items module-attributes-synch">
    <label>{{ $neighbour_module->name }}</label>
    @foreach($neighbour_module->items as $item)
        @php
            /**
            * @var $item \App\Models\ModuleItem
             */
            $properties = $item->props->mapWithKeys(function ($prop) {
                return [$prop->type->key => $prop->value];
            });
        @endphp
        <div class="icheck-primary-synch">
            <label>
                <input
                        type="checkbox"
                        name="module_items[]"
                        value="{{ $item->id }}"
                        @isset($mapped[$item->id]) checked @endif
                >
                @if($neighbour_module->name == "treners")
                    <span>{{ $properties['item-title'] }}</span>
                @elseif($neighbour_module->name == "subscriptions")
                    <span>{{ $properties['subscription-name'] }}</span>
                @elseif($neighbour_module->name == "trainings")
                    <span>{{ $properties['title'] }}</span>
                @else
                    <span>{{ $properties['item-title'] }}</span>
                @endif
            </label>
        </div>
    @endforeach
</div>