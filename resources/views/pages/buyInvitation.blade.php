@extends('layouts.app')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/buyInvitation.css')}}">
@endsection

@section('content')
    
<div class="content">
    <div class="invitation-template" align="center">
        <div class="row bride-groom-img">
            <div class="col-md-6 col-xs-12 mb-10">
                <label class="hidden-xs">{{ trans('message.Bride') }}</label>
                <img src="{{asset(''.$bride_img.'')}}" />
            </div>
            <div class="col-md-6 col-xs-12">
                <label class="hidden-xs">{{ trans('message.Groom') }}</label>
                <img src="{{asset(''.$groom_img.'')}}" />
            </div>
        </div>
        <div class="invitation-content" align="center" style="background: url('{{$template_url}}') no-repeat center center;">
            <div class="invitation-detail">
                <p>{{$bride_name}} & {{$groom_name}}</p>
                <p>{{ trans('message.save_date') }}</p>
                <p>{{ $marriage_date }}</p>
                <p>{{ $message_guest }}</p>
            </div>
            <div class="share-buttons" align="center">
                <img src="{{asset('assets/images/gmail_icon.png')}}"/>
                <img src="{{asset('assets/images/telegram_icon.png')}}"/>
                <img src="{{asset('assets/images/whatsapp_icon.png')}}"/>
            </div>
        </div>
        <div class="mt-25 invitee_info" align="center">
            <div class="mb-15">
            {{ trans('message.are_you_coming') }}:&nbsp;&nbsp;&nbsp;<label class="switch">
                <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="mb-15">
            {{ trans('message.Email') }}: <input type="text" class="sender-email" />
            </div>
            <div class="mb-15">
            {{ trans('message.Name') }}: <input type="text" class="sender-name" />
            </div>
            <div class="pay-button">
                <button id="pay_button" class="btn btn-primary">{{ trans('message.pay_btn') }}</button>
            </div>
        </div>
    </div>
</div>
@include('pages.paypal-modal')
@endsection

@section('custom_js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    $(document).ready(function() {
        if ($(window).width() < 760) {
            $('.invitation-content p').css('font-size', '27px');
            $('.invitation-content p:last-child').css('font-size', '18px');
            $('.invitation-content p:first-child').css('margin-top', '90%');
            $('.invitation-detail').css('width', '100%');
            $('.share-buttons img').css('width', '40px');
            $('.share-buttons img:last-child').css('width', '34px');
            $('.hidden-xs').css('display', 'none');
        } else if($(window).width() > 1366){
            $('.invitation-content p').css('font-size', '44px');
            $('.invitation-content p:last-child').css('font-size', '26px');
            $('.invitation-content p:first-child').css('margin-top', '11%');
            $('.invitation-detail').css('width', '50%');
            $('.share-buttons img').css('width', '64px');
            $('.share-buttons img:last-child').css('width', '53px');
            $('.hidden-xs').css('display', 'block');
        }
        else{
            $('.invitation-content p').css('font-size', '44px');
            $('.invitation-content p:last-child').css('font-size', '26px');
            $('.invitation-content p:first-child').css('margin-top', '18%');
            $('.invitation-detail').css('width', '50%');
            $('.share-buttons img').css('width', '64px');
            $('.share-buttons img:last-child').css('width', '53px');
            $('.hidden-xs').css('display', 'block');
        }
        $(window).on('resize', function(){
            var win = $(this); //this = window
            if (win.width() <= 760) {
                $('.invitation-content p').css('font-size', '27px');
                $('.invitation-content p:last-child').css('font-size', '18px');
                $('.invitation-content p:first-child').css('margin-top', '90%');
                $('.hidden-xs').css('display', 'none');
                $('.invitation-detail').css('width', '100%');
                $('.share-buttons img').css('width', '40px');
                $('.share-buttons img:last-child').css('width', '34px');
            } else if(win.width() > 1366){
                $('.invitation-content p').css('font-size', '44px');
                $('.invitation-content p:last-child').css('font-size', '26px');
                $('.invitation-content p:first-child').css('margin-top', '11%');
                $('.hidden-xs').css('display', 'block');
                $('.invitation-detail').css('width', '50%');
                $('.share-buttons img').css('width', '64px');
                $('.share-buttons img:last-child').css('width', '53px');
            }
            else{
                $('.invitation-content p').css('font-size', '44px');
                $('.invitation-content p:last-child').css('font-size', '26px');
                $('.invitation-content p:first-child').css('margin-top', '18%');
                $('.hidden-xs').css('display', 'block');
                $('.invitation-detail').css('width', '50%');
                $('.share-buttons img').css('width', '64px');
                $('.share-buttons img:last-child').css('width', '53px');
            }
        });
        $('.pay-button').on('click', '#pay_button', function(){
            $('.data-id').val({{$dataId}});
            $('#paypalModal').modal();
        });
    });
</script>
@endsection