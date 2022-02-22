@php
    $role_slug = auth()->user()->roles[0]->slug;
@endphp

@include("client.cabinet.{$role_slug}s.detail")