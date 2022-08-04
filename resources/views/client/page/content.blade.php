
<?php
/**
 * @var $block \App\Models\Block;
 */
?>
@extends('client.layouts.main')

@section('breadcrumbs')
    @include('client.includes.breadcrumbs')
@endsection

@section('content')
    @foreach($page->blocks as $block)
        @if($block->enabled)
            <?php $view = explode('.', $block->template->path)[0]; ?>
            @if($view == 'header' && $loop->count == 0)
                <main class="main" id="main">
                    <article>
            @endif
            @includeIf('client.block_templates.templates.'.$view)
        @endif
    @endforeach
@endsection

@section('client_js')

@endsection
