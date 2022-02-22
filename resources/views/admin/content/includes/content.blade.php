@include('admin.content.includes.attribute')
{{--@dd(1)--}}

{{--@if($iteration->repeators()->count())--}}
{{--    @foreach($iteration->repeators as $repeater)--}}
@include('admin.content.includes.repeaters', ['parent_id' => $content->id])

{{--    @endforeach--}}
{{--@endif--}}
{{--@if($iteration->repeators()->count())--}}

{{--<div class="row">--}}
{{--    @include('admin.content.includes.repeator', [$parent_id = "b_{$iteration->id}", $parent = $iteration])--}}
{{--</div>--}}
