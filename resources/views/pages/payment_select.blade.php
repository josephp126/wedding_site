@extends('layouts.payment')

@section('content')

<!-- display success message -->
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<body>
    <div class="container3">
        <div class="wrap">
            <div class="l-page-layout l-page-layout--checkout">
                <div class="l-center l-center--checkout">


                    <div class="l-cols l-cols--checkout">


                        <div class="l-col l-col--main">
                            <div class="box checkout">
                                <div class="box__head box__head--medium">
                                    <div class="checkout__title">Secure checkout</div>
                                </div>
                                <div class="box__content">
                                    <Form class="form" action="/payment_select1" method="POST">
                                        {{ csrf_field() }}
                                        <div class="box__group js-checkout-tabs-wrap">
                                            <div class="h2">Payment method</div>
                                            <div class="input-label input-label--offset">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                <span data-nsfw-filter-status="swf">It’s safe to pay on Preply. All transactions are protected by SSL encryption.</span>
                                            </div>
                                            <div class="row row--middle">
                                                <div class="col col--xs-12">
                                                    <label class="radio radio--image">
                                                        <div class="form-check check_pay">
                                                            <input type="radio" id="select_pay" name="select_pay" value="0" checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                        
                                                            </label>
                                                        </div>
                                                        <span class="radio__label" data-nsfw-filter-status="swf">
                                                            <img src="https://static.preply.com/images/new/visa.svg" width="40" height="11" alt="Visa" title="Visa">
                                                            <img src="https://static.preply.com/images/new/mastercard.svg" width="26" height="22" alt="Mastercard" title="Mastercard">
                                                            <img src="https://static.preply.com/images/new/amex.png" width="30" height="20" alt="American express" title="American express">
                                                            <img src="https://static.preply.com/images/new/discover.svg" width="30" height="18" alt="Discover" title="Discover">
                                                        </span>
                                                        <span class="radio__frame" data-nsfw-filter-status="swf"></span>
                                                        <span class="radio__icon" data-nsfw-filter-status="swf">
                                                            <span class="hint-wrap" data-nsfw-filter-status="swf">
                                                                <i class="fa fa-lock"></i>
                                                                <span class="hint hint--wide" data-nsfw-filter-status="swf">
                                                                    Payments are encrypted and securely processed by our provider – Braintree, a PayPal Service. We don’t store any sensitive data on our servers.
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>

                                                    <!-- <label class="radio radio--image radio--paypal">
                                                        <div class="form-check check_pay">
                                                            <input type="radio" id="select_pay" name="select_pay" value="1" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                
                                                            </label>
                                                        </div>
                                                        <span class="radio__label" data-nsfw-filter-status="swf">

                                                            <img src="https://static.preply.com/images/new/paypal-2.71132a8d1312.svg" width="78" height="19" alt="paypal" title="Paypal">

                                                        </span>
                                                        <span class="radio__frame" data-nsfw-filter-status="swf"></span>
                                                        <span class="radio__icon" data-nsfw-filter-status="swf">
                                                            <span class="hint-wrap" data-nsfw-filter-status="swf">
                                                                <i class="fa fa-lock"></i>
                                                                <span class="hint" data-nsfw-filter-status="swf">
                                                                    Secure payments by PayPal
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label> -->
                                                </div>

                                            </div>
                                            <div class="js-bill-buttons form-group">

                                                <div class="tab-content tab-content--no-animation js-switcher-content active" data-name="braintree">

                                                    <button type="submit" class="btn btn--success btn--l js-submit-braintree js-ga-send" data-pay="Pay" data-ga-action="Checkout" data-ga-label="submitApplePayButtonCheckout" data-qa-id="submit-braintree-checkout-btn">
                                                        <span data-nsfw-filter-status="swf">Continue</span>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    </Form>
                                </div>
                                <div id="js-checkout-bottom-block-mount" class="checkout__bottom-block">
                                    <div class="ProtectMessageWrap-k4f2ts-2 iqwxKx">
                                        <div class="Message-k4f2ts-3 gHkmhF">
                                            <div class="ImgWrap-k4f2ts-4 fZPZZD"></div>
                                            <div><i class="fa fa-balance-scale" aria-hidden="true"></i>
                                                <span class="Title-k4f2ts-6 gmZyZZ"><span data-nsfw-filter-status="swf">Learn with 100% satisfaction guarantee</span></span>
                                                <span class="Description-k4f2ts-7 cPqsAT"><span data-nsfw-filter-status="swf">If your lesson does not take place, or you are not satisfied with the tutor, we will provide you with a free replacement to another tutor of your choice or offer you a full refund.</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>


                </div>
                <div class="loader js-loader is-hidden"></div>



            </div>


        </div>
    </div>
</body>

</html>

@push('scripts')



<script type="text/javascript">
    // for bootstrap file input
    $(function() {
        $("input.fileinput").fileinput({
            allowedFileExtensions: ["jpg", "jpeg"], // set allowed file format
            maxFileSize: 3000, //set file size limit, 1000 = 1MB
        });
    });
</script>
@endpush

@stop