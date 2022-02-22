@foreach($model->attrs as $attribute)
    <i class="fas fa-envelope-open-text"></i>
    {{ $attribute->name }}
    <br>
@endforeach

@foreach($model->repeaters as $repeater)
    <div class="attribute-fields">
        <h5>{{ $repeater->name }}</h5>
        @include('admin.modules.includes.attributes_index_list', [$model = $repeater])
    </div>
@endforeach
