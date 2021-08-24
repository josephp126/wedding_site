<div class="modal fade" id="paypalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel"></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="w3-container">
                    @if ($message = Session::get('success'))
                    <div class="w3-panel w3-green w3-display-container">
                        <span onclick="this.parentElement.style.display='none'"
                                class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                        <p>{!! $message !!}</p>
                    </div>
                    <?php Session::forget('success');?>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="w3-panel w3-red w3-display-container">
                        <span onclick="this.parentElement.style.display='none'"
                                class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                        <p>{!! $message !!}</p>
                    </div>
                    <?php Session::forget('error');?>
                    @endif

                    <form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form"
                    action="{!! URL::to('paypal') !!}">
                        <div class="w3-container w3-teal w3-padding-16">{{trans('message.pay_with_paypal')}}</div>
                        {{ csrf_field() }}
                        <p> </p>
                        <label class="w3-text-blue"><b>{{trans('message.pay_amount')}}</b></label>
                        <input class="w3-input w3-border" id="amount" type="text" name="amount" value="{{$price}}" readonly />
                        <p></p>
                        <input type="hidden" val="" name="dataId" class="data-id" />
                        <button class="w3-btn w3-blue btn btn-primary">{{trans('message.pay_with_paypal')}}----</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>