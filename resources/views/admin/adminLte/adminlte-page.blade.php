@extends('adminlte::page')
@section('adminlte_css')
    @parent
    @include('admin.inc.css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop
@section('body')
    <div class="wrapper">
        <header class="main-header">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>A</b>LT') !!}</span>
                <span class="logo-lg">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="hidden-xs">
                                    {{ $user->activeTranslation->l_name . ' ' . $user->activeTranslation->f_name }}
                                </span>
                                @if(!empty($user->img))
                                    <img src="{{ url('uploads/'.$user->img) }}" class="user-image">
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    @if(!empty($user->img))
                                        <img src="{{ url('uploads/'.$user->img) }}" class="img-circle">
                                    @endif
                                    <p>
                                        {{ $user->activeTranslation->l_name . ' ' . $user->activeTranslation->f_name }}
                                        <small>{{ $user->role['label'] }}</small>
                                    </p>
                                </li>
                                <li class="user-footer text-center">
                                    <a
                                        href="{{ route('user.edit', ['id' => $user->id]) }}"
                                        class="btn btn-default btn-flat"
                                    >
                                        {{ __('title.profile') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                            </a>
                            <form id="logout-form"
                                  action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}"
                                  method="POST" style="display: none;">
                                @if(config('adminlte.logout_method'))
                                    {{ method_field(config('adminlte.logout_method')) }}
                                @endif
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @if(config('adminlte.layout') != 'top-nav')
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        @each('admin/adminLte/partials.menu-item', $adminLteMenu, 'item')
                    </ul>
                </section>
            </aside>
        @endif
        <div class="content-wrapper">
            <section class="content-header">
                @yield('content_header')
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        @hasSection('footer')
            <footer class="main-footer">
                @yield('footer')
            </footer>
        @endif
        @include('admin.inc.footer')
    </div>
@stop
@section('adminlte_js')
    @include('admin.inc.js')
@stop

