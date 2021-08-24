@extends('layouts.admin_app');

@section('sidebar_list')
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading"><a href = "properties_list">Properties</a></li>
        <li class="app-sidebar__heading active"><a href = "create">Create Property</a></li>
        <li class="app-sidebar__heading"><a href = "user_list">Users</a></li>
    </ul>
@endsection

@section('content')
<div class="container lst">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div> 
    @endif
    <h3 class="create-title">Property Create</h3>
    <form class="create-form" action="{{url('create-property')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row col-md-12">
            <div class="col-md-4 col-xs-12">
                <label>City</label>
                <input type="text" name="city" class="city form-control" value="" required/>
            </div>
            <div class="col-md-4 col-xs-12">
                <label>State</label>
                <input type = "text" name='state' class="state form-control" value="" required />
            </div>
            <div class="col-md-4 col-xs-12">
                <label>Zip Code</label>
                <input type="number" name="zipCode" class="zip-code form-control" value="" required />
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-4 col-xs-6">
                <label>Bedrooms</label>
                <input type="number" name="bedroom" class="bedroom form-control" value="" required />
            </div>
            <div class="col-md-4 col-xs-6">
                <label>Bath</label>
                <input type = "number" name="bath" class="bath form-control" value="" required />
            </div>
            <div class="col-md-4 col-xs-6">
                <label>Wifi</label>
                <input type="number" name="wifi" class="wifi form-control" value="" required />
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-4 col-xs-6">
                <label>Ac</label>
                <input type="number" name="ac" class="ac form-control" value="" required />
            </div>
            <div class="col-md-4 col-xs-6">
                <label>Kitchen</label>
                <input type = "number" name="kitchen" class="kitchen form-control" value="" required />
            </div>
            <div class="col-md-4 col-xs-6">
                <label>Nightly Rate</label>
                <input type="number" name="nightlyRate" class="nightly-rage form-control" value="" required />
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-12 col-xs-12">
                <label>Airbnb link</label>
                <input type="text" name="airbnb" class="airbnb form-control" value="" required />
            </div>
        </div>
        <div class="property-upload col-md-12">
            <label>Image for advertisement </label>
            <div class="upload-list" style="display:flex"></div>
            <button class="btn btn-primary add">choose file</button>
        </div>
        <button class="btn btn-primary" type="submit">Create Property</button>
    </form>        
</div>
@endsection

@section('custom_js')
<script language="javascript" type="text/javascript">
    $(function () {
        $('form button.add').click(function(e) {
        e.preventDefault();
        var nb_attachments = $('form input').length;
        var $input = $('<input type="file" name=attachment-' + nb_attachments + ' required>');
        $input.on('change', function(evt) {
            var f = evt.target.files[0];
            $('form').append($(this));
            var reader = new FileReader();
            $(reader).on("load", function() {
                $('.upload-list').append($("<img/>", {src:this.result, height:100, class:'upload-image'}));
            });
            reader.readAsDataURL(f);
        });
        $input.hide();
        $input.trigger('click');
    });
    });
</script>
@endsection