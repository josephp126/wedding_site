@extends('layouts.app')

@section('content')
<div class="pt-100" align="center">
    <div class="col-md-8 col-md-offset-2 main-window">
        <div class="panel panel-default second-window ">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin_login') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="email" class="col-md-4 control-label">{{trans('message.Email')}}:</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row mt-25">
                        <label for="password" class="col-md-4 control-label">{{trans('message.password')}}:</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-group mt-25">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                {{trans('message.login')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection