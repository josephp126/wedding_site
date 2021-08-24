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
                <div class="form">
                    

<div class="box__group js-checkout-tabs-wrap">
    <div class="h2">2. Payment method</div>
    <div class="input-label input-label--offset">
        <i class="icon icon--lock icon--color-available"></i>
        <span>It’s safe to pay on Preply. All transactions are protected by SSL encryption.</span>
    </div>
    <div class="row row--middle">
        
            


    <div class="col col--xs-12">
        
        
            
                
                    

<label class="radio radio--image">
    <input class="radio__input js-switcher js-braintree-radio active" type="radio" name="payments" data-name="braintree" data-qa-id="braintree-payments" checked="">
    <span class="radio__label">
        <img src="https://static.preply.com/images/new/visa.svg" width="40" height="11" alt="Visa" title="Visa">
        <img src="https://static.preply.com/images/new/mastercard.svg" width="26" height="22" alt="Mastercard" title="Mastercard">
        <img src="https://static.preply.com/images/new/amex.png" width="30" height="20" alt="American express" title="American express">
        <img src="https://static.preply.com/images/new/discover.svg" width="30" height="18" alt="Discover" title="Discover">
    </span>
    <span class="radio__frame"></span>
    <span class="radio__icon">
        <span class="hint-wrap">
            <i class="icon icon--lock"></i>
            <span class="hint hint--wide">
                Payments are encrypted and securely processed by our provider – Braintree, a PayPal Service. We don’t store any sensitive data on our servers.
            </span>
        </span>
    </span>
</label>

                
            
            
                
            
        
            
                
            
            
                
                    
                        <label class="radio radio--image radio--paypal">
                            <input class="radio__input js-switcher js-paypal-radio" type="radio" name="payments" data-name="paypal" data-qa-id="paypal-payments">
                            <span class="radio__label">
                                
                                    <img src="https://static.preply.com/images/new/paypal-2.71132a8d1312.svg" width="78" height="19" alt="paypal" title="Paypal">
                                
                            </span>
                            <span class="radio__frame"></span>
                            <span class="radio__icon">
                                <span class="hint-wrap">
                                    <i class="icon icon--lock"></i>
                                    <span class="hint">
                                        Secure payments by PayPal
                                    </span>
                                </span>
                            </span>
                        </label>
                    
                
            
        
        



    <label class="radio radio--image js-apple-pay-radio is-hidden">
        <input class="radio__input js-switcher" type="radio" name="payments" data-name="applePay">
        <span class="radio__label">
            <img src="https://static.preply.com/images/new/apple-pay-mark.svg" width="43" height="28" alt="Apple Pay">
        </span>
        <span class="radio__frame"></span>
        <span class="radio__icon">
            <span class="hint-wrap">
                <i class="icon icon--lock"></i>
                <span class="hint hint--wide">
                    Payments are encrypted and securely processed by our provider – Braintree, a PayPal Service. We don’t store any sensitive data on our servers.
                </span>
            </span>
        </span>
    </label>


    </div>


        
    </div>
    <div class="js-bill-buttons form-group">
        
        <label class="checkbox" style="padding-bottom: 10px">
            <input type="checkbox" checked="" class="checkbox__input js-free-transfer-checkbox">
                <span class="checkbox__label">
                    I want a <span class="tag-box tag-box--success" style="font-weight: 500;"> free lesson</span> or a refund if the tutor doesn’t meet my needs
                </span>
        </label>
        
        
            
        
        
            
                <div class="tab-content tab-content--no-animation js-switcher-content active" data-name="braintree">
                    


    
        <button class="btn btn--success btn--l js-submit-braintree js-ga-send" data-pay="Pay" data-ga-action="Checkout" data-ga-label="submitApplePayButtonCheckout" data-qa-id="submit-braintree-checkout-btn">
            
                <span>Continue</span>
            
        </button>
    


                </div>
            
            
                
                    <div class="tab-content tab-content--no-animation js-switcher-content" data-name="paypal">
                        
<form id="paypal-form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="payments@preply.com">
    
        <input type="hidden" name="lc" value="US">
    
    <input type="hidden" name="item_name" value="Payment for the lesson(s) with a Preply tutor.">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="amount" id="paypal_amount" value="0">
    <input type="hidden" name="quantity" id="paypal_quantity" value="1">
    
        <input type="hidden" name="currency_code" value="EUR">
    
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="0">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="return" value="https://preply.com/en/requests/4607396/checkout/waiting/1">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="cbt" value="Return to Preply">
    <input type="hidden" name="cancel_return" value="https://preply.com/en/requests/4607396/checkout">
    <input type="hidden" name="email" value="ivankushnir103@gmail.com">
    <input type="hidden" name="first_name" value="Ivan">
    
    
    <input type="hidden" name="custom" id="custom" value="4607396,0,1,0.8200,False">
    
    <input type="hidden" name="notify_url" value="https://preply.com/payment/ipn">
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
    <div>
        <button class="btn btn--success btn--l js-ga-send js-submit-paypal" data-ga-action="Checkout" data-ga-label="submitPayPalPayButtonCheckout">
            
                <span>Continue</span>
            
        </button>
    </div>
</form>

                    </div>
                
            
            <div class="tab-content tab-content--no-animation js-switcher-content" data-name="savedcard">
                

<button class="btn btn--success btn--l js-submit-savedcard js-ga-send" data-pay="Pay" data-ga-action="Checkout" data-ga-label="submitSavedCardPayButtonCheckout" data-qa-id="submit-saved-card-btn">
    
        <span>Confirm payment · </span>
        <span>
            
                19.93 EUR
            
        </span>
    
</button>

            </div>
        
        
            




    <div class="tab-content tab-content--no-animation js-switcher-content" data-name="applePay">
        <button class="btn btn--success btn--l js-apple-pay-btn js-ga-send" data-pay="Pay" data-ga-action="Checkout" data-ga-label="submitRealApplePayButtonCheckout">
            
                <span>Continue</span>
            
        </button>
    </div>


        
    </div>
        <div class="text-note">
        
                <!-- Handle case when user has saved credit card -->
                    <div class="tab-content tab-content--no-animation js-switcher-content" data-name="savedcard">
                        
                        
                            By clicking "Confirm payment", you agree to Preply's
                            <a class="link" target="_blank" href="/static/Payment_Policy.pdf">
                                Refund Policy
                            </a>
                        
                    </div>
        
        </div>
</div>

                </div>
        </div>
        <div id="js-checkout-bottom-block-mount" class="checkout__bottom-block"><div class="ProtectMessageWrap-k4f2ts-2 iqwxKx"><div class="Message-k4f2ts-3 gHkmhF"><div class="ImgWrap-k4f2ts-4 fZPZZD"><i class="icon icon--guarantee"></i></div><div><div class="Title-k4f2ts-6 gmZyZZ"><span>Learn with 100% satisfaction guarantee</span></div><div class="Description-k4f2ts-7 cPqsAT"><span>If your lesson does not take place, or you are not satisfied with the tutor, we will provide you with a free replacement to another tutor of your choice or offer you a full refund.</span></div></div></div></div></div>
    </div>
    
</div>



                    </div>
                
            
        </div>
        <div class="loader js-loader is-hidden"></div>
        
        
        
    </div>

     
    
    <div class="wrap__footer">
        














<div class="footer footer--checkout">
    <div class="footer__item">
        <div class="footer__item__inner">
            <div class="f-copy">
                <p class="f-copyright">2012-2021 Preply Inc.</p>
            </div>
            <div class="f-copy f-copy--secure">
                <p><i class="icon icon--lock"></i> Payment details are encrypted and securely processed by our providers – Braintree, PayPal.</p>
            </div>
            <div class="f-copy f-copy--menu">
                <div class="f-copy__docs">
                    <a class="f-copy__docs__item" target="_blank" href="/static/Preply-Terms-of-Service.pdf">
                        Terms of Service
                    </a>
                    <a class="f-copy__docs__item" target="_blank" href="/static/Privacy_Policy.pdf">
                        Privacy Policy
                    </a>
                    <a class="f-copy__docs__item" target="_blank" href="/static/Cookie_Policy.pdf">
                        Cookie Policy
                    </a>
                    <a class="f-copy__docs__item" target="_blank" href="/static/Payment_Policy.pdf">
                        Refund Policy
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>

</div>