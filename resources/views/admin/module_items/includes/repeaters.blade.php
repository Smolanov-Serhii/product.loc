@foreach($repeaters as $moduleRepeater)
    @php
        $parent = $parent_iteration_id ?? 'Module_items';
    @endphp
    @include('admin.module_items.includes.repeater')

{{--    @dd($module_repeater)--}}
    <button
        type="button"
        class="btn btn-danger btn-icon add-iteration"
        data-template_url="{{ route('admin.module_repeaters.template', [
            'moduleRepeater' => $moduleRepeater,
            'parent_iteration_id' => $parent
        ]) }}">
        <i class="fa fa-plus-square" aria-hidden="true"></i>
    </button>
@endforeach
