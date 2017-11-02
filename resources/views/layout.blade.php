<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-control" content="public">
        <meta http-equiv="Cache-control" content="private">
        <meta http-equiv="Cache-control" content="no-cache">
        <meta http-equiv="Cache-control" content="no-store">

        <title>Twitter | @yield('title')</title>
        <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery-ui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.datetimepicker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome.min.css') }}">
        <style type="text/css">
            body{
                background-color: #f2f0f0;
            }
            button.dropdown-toggle{
                margin-top: -45px;
            }
            #divider{
                border-bottom: 3px solid #ccc;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .form-twitter h4{
                color: #c2bebe;
                font-weight: bold;
            }
            .input-status{
                background-color: #dbdbdb;
                padding-top: 20px;
                padding-bottom: 40px;

            }
            .input-status input{
                margin-top: 20px;
                padding-right: 25px;
            }
            .user-post{
                margin-top: 20px;
            }
            .clearfix:before, .clearfix:after{
                display: table;
                content: " ";
            }
            .chat {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .chat li {
                margin-bottom: 10px;
                padding: 5px;
                border:1px solid #999;
                background-color: #FFF;
                box-shadow: 1px 5px 8px #888888;
                border-radius: 2px;
            }

            .chat li.right {
                margin-bottom: 10px;
                padding: 5px;
                border:1px solid #999;
                background-color: #EDF5E5;
                box-shadow: 1px 5px 8px #888888;
                border-radius: 2px;
            }

            .chat li.left .chat-body {
                margin-left: 60px;
            }

            .chat li.right .chat-body {
                margin-right: 60px;
            }

            .chat li .chat-body p {
                margin: 0;
            }

            .panel .slidedown .glyphicon,
            .chat .glyphicon {
                margin-right: 5px;
            }

            .chat-panel .panel-body {
                height: 350px;
                overflow-y: scroll;
            }
            .chat-img{
                width: 50px;
                height: 50px;
            }
            .loading_twitter{
                display:none;
                position: fixed;
                z-index: 1000;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background: rgba( 255, 255, 255, .8 ) url('/img/loading.gif') 50% 50% no-repeat;
                overflow: hidden;
            }
            .bg-profile {
                margin-bottom: 20px;
                padding: 35px;
                border:1px solid #999;
                background-color: #EDF5E5;
                box-shadow: 1px 5px 8px #888888;
                border-radius: 2px;
            }
            .img-profile{
                width: 150px;
                height: 150px;
            }
            .img-profile:hover{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="loading_twitter"></div>
        <div class="header">
            <div class="col-sm-12 col-md-12" style="padding: 0;">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <h4><a href="{{ Session('id') ? URL::to('/post') : URL::to('/') }}" style="text-decoration: none;">Twitter Application</a></h4>

                        @if(Session('id'))
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-user fa-fw"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="{{ URL::to('profile') }}">Profile</a></li>
                                        <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>

        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        @yield('script')
    </body>
</html>
