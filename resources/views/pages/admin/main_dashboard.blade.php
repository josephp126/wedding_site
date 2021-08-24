@extends('layouts.app')

@section('content')
<div class="pt-100 ">
    <div>
        {{trans('message.password')}}:<input id="change_password" type="password" class="form-control" name="change_password" />
    </div>
    <div>
        <button class="change_save">{{trans('message.change')}}</button>
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            {{trans('message.invitee_amount')}}:<input class="invitee_amount" value="" readonly/>
        </div>  
        <div class="col-md-6 col-xs-12">
            {{trans('message.paticipator_amount')}}:<input class="paticipator_amount" value="" readonly/>
        </div>  
    </div>
</div>
@endsection