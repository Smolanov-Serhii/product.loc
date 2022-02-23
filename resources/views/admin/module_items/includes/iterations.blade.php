@foreach($iterations as $iteration)
    @php
        $parent = $parent_iteration_id ?? 'Module_items';
    @endphp
    @include('admin.module_items.includes.iteration')
@endforeach
<button
    type="button"
    class="btn btn-primary btn-icon add-iteration"
    data-template_url="{{ route('admin.module_repeaters.template', [
        'moduleRepeater' => $iteration->repeater,
        'parent_iteration_id' => $parent]) }}"
{{--    data-iteration_id="{{ $iteration->id }}"--}}
>
    <i class="fa fa-plus-square" aria-hidden="true"></i>
</button>
