@extends('layouts.app')

@section('custom_css')
<style>
    .content{
        font-family: Arial, Helvetica, sans-serif;
    }
    .pay-thanks p{
        font-size: 46px;
    }
    .your-link p{
        font-size: 30px;
    }
    .goto-mysite{
        margin-top: 300px;
        margin-bottom: 200px;
    }
</style>
@endsection

@section('content')
<div class="content" align="center">
    <div class="pay-thanks mt-100">
        <p>{{trans('message.pay_thanks')}}</p>
    </div>
    <div class="your-link mt-50">
        <p>{{trans('message.your_link')}}</p>
        <p>{{$link}}<p>

        <p>{{trans('message.admin_link')}}</p>
        <p>{{$admin_link}}<p>
    </div>
    <div class="goto-mysite">
        <button class="btn btn-primary" id="goToMySite">{{trans('message.go_mysite')}}<button>
    </div>
</div>
@endsection

@section('custom_js')
<script>
    $(document).ready(function(){
        $(".goto-mysite").on('click', '#goToMySite', function(){
            window.location.href = '/personal_page/{{$dataId}}/{{$bride_name}}&{{$groom_name}}';
        });
    })
</script>
@endsection