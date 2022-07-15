<div class="border border-primary rounded new-iteration {{ $repeater->class }}" id="{{ $u_id }}">
    <div class="iteration-buttons">
        <div class="move btn">+</div>
        <div class="devider-block" style="flex: 1"></div>
        <button
                data-id="{{ $u_id }}"
                class="btn btn-danger btn-icon content remove-new-iteration"
        >
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        <div class="hide btn">
            <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7.5 6L14 1" stroke="#0D0E17" stroke-width="2"/>
            </svg>
        </div>
    </div>
    
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
            name="iterations[{{ $u_id }}][lang_id]"
            value="{{ $language->id }}"
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
            'parent_u_id' => $u_id,
            'parent_type' => $parent_type,
        ])
    @endforeach

</div>
