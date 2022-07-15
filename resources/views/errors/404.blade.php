@extends('client.layouts.main')

@section('content')
    @foreach($page->blocks as $block)
        @if($block->enabled)

            <?php
            /** @var $block \App\Models\Block; */
            $view = explode('.', $block->template->path)[0];
            ?>

            @includeIf('client.block_templates.templates.'.$view)
        @endif
    @endforeach
@endsection