@csrf
{{--{{ dd($model) }}--}}
{{--@include('admin.inc.errors')--}}
@section('content')
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('title.general_elements') }}</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Name</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input
                            type="text"
                            class="form-control pull-right"
                            name="name"
                            placeholder=""
                            value="{{ ''}}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input
                            type="text"
                            class="form-control pull-right"
                            name="name"
                            placeholder=""
                            value="{{ ''}}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input
                            type="text"
                            class="form-control pull-right"
                            name="name"
                            placeholder=""
                            value="{{ ''}}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input
                            type="text"
                            class="form-control pull-right"
                            name="name"
                            placeholder=""
                            value="{{ ''}}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input
                            type="text"
                            class="form-control pull-right"
                            name="name"
                            placeholder=""
                            value="{{ ''}}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label>input</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input
                            type="text"
                            class="form-control pull-right"
                            name="name"
                            placeholder=""
                            value="{{ ''}}"
                        >
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
