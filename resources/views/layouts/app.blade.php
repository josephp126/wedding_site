<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>Wedding</title>
    <meta name="description" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/off-canvas.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/scmenu-main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sc-spacing.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    @yield('custom_css')
</head>

<body class="defult-home">
    <div class="full-width-header   header-style1 home1-modifiy">
        <header id="sc-header" class="sc-header">
            <div class="topbar-area">
                <div class="container">
                    <div class="row align-items-center" style="text-align:center">
                        <!-- <div class="col-md-7">
                            <ul class="topbar-contact">
                                <li>
                                    <i class="flaticon flaticon-call"></i>
                                    <a href="tel:+(111)256352">Call: +(111)256 352</a>
                                </li>
                                <li>
                                    <i class="flaticon flaticon-mail"></i>
                                    <a href="mailto:support@rstheme.com">support@softcoders.net</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5 text-end">
                            <ul class="topbar-right">
                                @if(Auth::guest())
                                <li class="login-register">
                                    <i class="fa fa-sign-in"></i>
                                    <a href="/login">Login</a> / <a href="/register">Register</a>
                                </li>
                                @else
                                <li class="login-register">
                                    <i class="fa fa-sign-in"></i>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @endif
                            </ul>
                        </div> -->
                        <p class="landingpage-title">{{ trans('message.page_title') }}</p>
                    </div>
                </div>
            </div>
            <div class="menu-area menu-sticky">
                <div class="container" style="text-align: center">
                    <div class="row align-items-center">
                        <p class="landingpage-subtitle">{{ trans('message.page_subtitle') }}</p>
                    </div>
                </div>
            </div>
        </header>
    </div>
    @yield('content')
    @include('pages.invitation-modal')
    <script src="{{asset('assets/js/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/scmenu-main.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/main1.js')}}"></script>
    @yield('custom_js')
    <script>
        $('.invitation-template').on('click', '.template-group', function(){
            var src = $(this).children().attr('src');
            $('#invitationTemplateUrl').val(src);
            $("#invitationModal").modal();
        });
        var url = "{{ route('changeLang') }}";
        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });
    </script>
</body>

</html>
