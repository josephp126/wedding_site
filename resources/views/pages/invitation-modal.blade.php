<div class="modal fade" id="invitationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/template_send') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-md-6 form-title">{{ trans('message.bride_name') }}:</div>
                        <div class="col-md-6">
                            <input id="=brideName" type="text" class="form-control" name="bride_name" value="" required autofocus />
                        </div>
                    </div>
                    <div class="form-group row mt-15">
                        <div class="col-md-6 form-title">{{ trans('message.groom_name') }}:</div>
                        <div class="col-md-6">
                            <input id="=groomName" type="text" class="form-control" name="groom_name" value="" required />
                        </div>
                    </div>
                    <div class="form-group row mt-15">
                        <div class="col-md-6 form-title">{{ trans('message.marriage_date') }}:</div>
                        <div class="col-md-6">
                            <input id="=marriageDate" type="date" class="form-control" name="marriage_date" value="" required />
                        </div>
                    </div>
                    <div class="form-group row mt-15">
                        <div class="col-md-6 form-title">{{ trans('message.bride_picture') }}:</div>
                        <div class="col-md-6">
                            <input id="brideImage" type="file" class="form-control" name="bride_picture" required />
                        </div>
                    </div>
                    <div class="form-group row mt-15">
                        <div class="col-md-6 form-title">{{ trans('message.groom_picture') }}:</div>
                        <div class="col-md-6">
                            <input id="groomImage" type="file" class="form-control" name="groom_picture" required />
                        </div>
                    </div>
                    <div class="form-group mt-25">
                        <div class="col-md-12 form-title mb-6">{{ trans('message.message_guest') }}</div>
                        <div class="col-md-12">
                            <textarea id="messageGuest" name="message_guest" row="80" col="80" style="width:100%"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-15">
                        <div class="col-md-6 form-title">{{ trans('message.Email') }}:</div>
                        <div class="col-md-6">
                            <input id="=senderEmail" type="email" class="form-control" name="sender_email" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="invitationTemplateUrl" name="template_url" />
                    </div>
                    <div class="form-group mt-15">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="float:right">
                                {{ trans('message.save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>