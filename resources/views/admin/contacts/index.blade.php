<?php
/**
 * @var $model \Illuminate\Database\Eloquent\Collection
 * @var $page \App\Models\Pages;
 */
?>
@extends('adminlte::page')
@section('title', __('pages.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.contacts.list')
        ],
        [
            'label' => __('contacts.list'),
        ]
    ])
@endsection

@section('content')
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-sm btn-info"> @lang('contacts.add') </a>
    @if($model->count() > 0)
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title"> @lang('contacts.list') </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th> @lang('contacts.name') </th>
                            <th> @lang('contacts.value') </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $var)
                            <tr>
                                <td>
                                    {{ $var->name }}
                                </td>
                                <td>
                                    @if($var->type == 0)
                                        <img src="/uploads/variables/{{ $var->translate->value }}" alt="">
                                    @else
                                        {{ $var->translate->value }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.contacts.edit', ['variable' => $var]) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                    <form class="btn btn-danger btn-icon" method="POST" action="{{ route('admin.contacts.delete', [ 'variable'=> $var ]) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Are you sure?')" style="padding:0;">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="{{ route('admin.contacts.create') }}" class="btn btn-sm btn-info float-left"> @lang('contacts.add') </a>
            </div>
            <!-- /.card-footer -->
        </div>
    @else
        <div>Значений ещё не создано ...</div>
    @endif
@endsection
@section('adminlte_js')

@endsection
