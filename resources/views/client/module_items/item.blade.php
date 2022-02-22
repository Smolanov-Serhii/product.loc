<?php
/**
 * @var $program \App\Models\Module_items;
 */

//$attributes = $program->attrs();
$properties = $program->props->mapWithKeys(function ($prop) {
    return [$prop->type->key => $prop->value];
});

?>

@extends('client.layouts.main')
@section('content')
    {!! $properties['content'] !!}
@endsection
