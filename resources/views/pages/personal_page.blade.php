@extends('layouts.app')

@section('custom_css')
@endsection

@section('content')
<div class="content pb-100" align="center">
    <div class="row mt-40">
        <div class="col-md-6 col-xs-12">
            <label>{{trans('message.your_invitation')}}</label>
            <img src="{{$template_url}}" />
        </div>
        <div class="col-md-6 col-xs-12 mt-150 pr-55">
            <div class="form-group row">
                <div class="col-md-6 form-title">{{ trans('message.bride_name') }}:</div>
                <div class="col-md-6">
                    <input id="=brideName" type="text" class="form-control" name="bride_name" value="{{$bride_name}}" required />
                </div>
            </div>
            <div class="form-group row mt-15">
                <div class="col-md-6 form-title">{{ trans('message.groom_name') }}:</div>
                <div class="col-md-6">
                    <input id="=groomName" type="text" class="form-control" name="groom_name" value="{{$groom_name}}" required />
                </div>
            </div>
            <div class="form-group row mt-15">
                <div class="col-md-6 form-title">{{ trans('message.marriage_date') }}:</div>
                <div class="col-md-6">
                    <input id="=marriageDate" type="date" class="form-control" name="marriage_date" value="{{$marriage_date}}" required />
                </div>
            </div>
            <div class="form-group mt-25">
                <div class="col-md-12 form-title mb-6">{{ trans('message.message_guest') }}</div>
                <div class="col-md-12">
                    <textarea id="messageGuest" name="message_guest" row="80" col="80" value="{{$message_guest}}" style="width:100%"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="send-email mt-30">
        <div >
            {{ trans('message.Email') }}:<input type="text" val="" />
            <a>send</a>
        </div>
        <div >
            {{ trans('message.Telegram') }}:<input type="text" val="" />
            <a>send</a>
        </div>
        <div >
            {{ trans('message.WhatsApp') }}:<input type="text" val="" />
            <a>send</a>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script>
    
</script>
@endsection