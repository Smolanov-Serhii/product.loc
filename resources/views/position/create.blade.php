@extends('adminlte::page')
@section('title', 'Додавання партнера')
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель керування',
            'url' => route('')
        ],
        [
            'label' => 'Партнери',
            'url' => route('')
        ],
        [
            'label' => 'Добавление картины'
        ]
    ])
@endsection

@php($locales = config('app.locales'))

@section('content')
    <form action="{{ route('admin.position.create') }}" method="post" enctype="multipart/form-data">

        <div class="box">
            <div class="box-header">
                <h1>Додавання партнера</h1>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Зображення</label>
                            <input type="file" name="image" id="image" class="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="priority">Пріоритет</label>
                            <input id="priority" name="priority" type="number" class="form-control" value="0">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="box">
            <div class="box-body">
                @foreach($locales as $locale)
                    <h3>{{ strtoupper($locale) }}</h3>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ПІБ</label>
                                <input type="text" name="i18n[{{ $locale }}][full_name]" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Короткий опис</label>
                                <input type="text" name="i18n[{{ $locale }}][description_short]" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Повний опис</label>
                                <textarea class="form-control ckeditor" name="i18n[{{ $locale }}][description_full]" id="editor-{{$locale}}"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Слаг</label>
                        <input type="text" name="i18n[{{ $locale }}][slug]" class="form-control">
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="i18n[{{ $locale }}][active]" checked>
                            <span>Активна</span>
                        </label>
                    </div>

                    <hr>
                @endforeach

                @csrf
                <button class="btn btn-primary">Save</button>
            </div>
        </div>

    </form>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', 'laravel-filemanager')) }}";
        var options = {
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{ csrf_token() }}'
        };
        @foreach($locales as $locale)
        CKEDITOR.replace('editor-{{$locale}}', {...options});
        @endforeach
    </script>
@endsection
