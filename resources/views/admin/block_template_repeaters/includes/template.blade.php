<div class="border border-primary rounded new-iteration {{ $repeater->class }}"id="{{ $u_id }}">
    <button
        data-id="{{ $u_id }}"
        class="btn btn-danger btn-icon content remove-new-iteration"
    >
        <i class="fa fa-trash" aria-hidden="true"></i>
    </button>
    
    <input
        type="hidden"
        name="iterations[{{ $u_id }}][parent_id]"
        value="{{ $parent_u_id }}"
    >
    <input
        type="hidden"
        name="iterations[{{ $u_id }}][repeater_id]"
        value="{{ $repeater->id }}"
    >
    <input
        type="hidden"
        name="iterations[{{ $u_id }}][order]"
        class="order"
        value="0"
    >
    @include('admin.content.includes.attributes.new_iteration_attribute', [
        'repeater' => $repeater
    ])

    @foreach($repeater->repeaters as $sub_repeater)
        @include('admin.content.includes.repeater', [
            'repeater' => $sub_repeater,
            'parent_u_id' => $parent_u_id,
            'parent_type' => $parent_type,
        ])
    @endforeach

</div>
