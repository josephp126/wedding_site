@extends('layouts.payment_cal')

@section('content')

<!-- display success message -->
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="wrap">
    <div class="container-pay">
        <div class="towards_title">
            <div class="towards_p">
                <h2>AIRBNB,Inc</h2>
            </div>
        </div>
        <div class="towards_main">
            <div class="main_1">
                <p id="main_1">Purchase details</p>
            </div>
            <div class="main_2">
                <div class="main_2_des">
                    <p> Description</p>
                    <p> Payment for the Arts </p>
                </div>
                <form class="main_2_form">
                    {{ csrf_field() }}
                    <div class="row form_price flex-container">
                        <div class="col-md-9 col-sm-9 flex-container_first">
                            <p class="flex-1">Price per item</p>
                            <p class="flex-2"> EUR</p>
                        </div>
                        <div class="color col-md-3 col-sm-3 flex_container_second">
                            <div class="quantity">
                                <p> Quantity </p>
                                <p> 1 </p>
                            </div>
                        </div>
                    </div>
                    <div class="button_continue">
                        <button type="submit">Continue</button>
                        <a class="btn_1" href="/payment_select"> Cancel </a>
                    </div>
                </form>
                <div class="logo">
                    <span></span>
                    <span></span>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="towards_footer">
    <a href="">Policies</a>
    <a href="">Policies</a>
    <a href="">Policies</a>
    <a href="">Policies</a>
    <span> </span>
</div>
</div>
@stop