@extends('layouts.app')

@section('content')
    
<div class="content">
        <div style = "text-align: right">
            <div style="display:flex; justify-content: right; font-size: 18px; font-family:'Arial';">
                <select class="form-control changeLang" style="cursor:pointer">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="he" {{ session()->get('locale') == 'he' ? 'selected' : '' }}>Hebrew</option>
                </select>
            </div>
        </div>
        <div class="content-title">
            <h1>{{ trans('message.template_choose') }}</h1>
        </div>
        <div class="invitation-template">
            <div class="row invitation">
                <div class="template-group col-md-6 col-xs-12" align="center">
                    <img src="{{asset('assets/images/invitation1.jpg')}}" />
                </div>
                <div class="template-group col-md-6 col-xs-12" align="center">
                    <img src="{{asset('assets/images/invitation2.jpg')}}" />
                </div>
            </div>
            <div class="row invitation">
                <div class="template-group col-md-6 col-xs-12" align="center">
                    <img src="{{asset('assets/images/invitation3.jpg')}}" />
                </div>
                <div class="template-group col-md-6 col-xs-12" align="center">
                    <img src="{{asset('assets/images/invitation4.jpg')}}" />
                </div>
            </div>
            <div class="row invitation">
                <div class="template-group col-md-6 col-xs-12" align="center">
                    <img src="{{asset('assets/images/invitation5.jpg')}}" />
                </div>
                <div class="template-group col-md-6 col-xs-12" align="center">
                    <img src="{{asset('assets/images/invitation6.jpg')}}" />
                </div>
            </div>
            <!-- <div class="row invitation">
                <div class="template-group col-md-6 col-xs-12">
                    <img src="{{asset('assets/images/invitation7.jpg')}}" />
                </div>
                <div class="template-group col-md-6 col-xs-12">
                    <img src="{{asset('assets/images/invitation8.jpg')}}" />
                </div>
            </div>
            <div class="row invitation">
                <div class="template-group col-md-6 col-xs-12">
                    <img src="{{asset('assets/images/invitation9.jpg')}}" />
                </div>
                <div class="template-group col-md-6 col-xs-12">
                    <img src="{{asset('assets/images/invitation10.jpg')}}" />
                </div>
            </div> -->
        </div>
    </div>
@endsection