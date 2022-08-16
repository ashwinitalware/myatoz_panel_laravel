<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>MyAtoz</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="{{asset('public/logo/favicon.ico')}}" type="image/x-icon" />
        <!-- END META SECTION -->
        <!-- bootstrap Toggle -->
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('public/css/theme-default.css') }}"/>
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('public/css/notification.css') }}"/>
        <!-- EOF CSS INCLUDE -->                                     
        <style>
            .none {
    display:none;
}
        </style>
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
       <div class="page-container page-navigation-top">            
            <!-- PAGE CONTENT -->
            <div class="page-content">


            <!-- Header -->
    @include('admin.layouts.header')

    <!-- Main Home.blade -->
    @yield('content')


    </div>            
    <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{url('/')}}" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->             
        
    <!-- START SCRIPTS -->
        <script type="text/javascript" src="{{ asset('public/js/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/jquery/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap.min.js') }}"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->    
        <script type='text/javascript' src="{{ asset('public/js/plugins/icheck/icheck.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
        
        
        
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
        <script type="text/javascript" src="{{asset('public/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/js/plugins/bootstrap/bootstrap-select.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
        
        
        <script type="text/javascript" src="{{asset('public/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>    

        
        <script type="text/javascript" src="{{asset('public/js/plugins/dropzone/dropzone.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/js/plugins/fileinput/fileinput.min.js')}}"></script>        
        <script type="text/javascript" src="{{asset('public/js/plugins/filetree/jqueryFileTree.js')}}"></script>
        <!-- END PAGE PLUGINS -->
        
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{asset('public/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{asset('public/js/actions.js')}}"></script>
        <!-- END TEMPLATE -->
        
       <!-- bootstrap Toggle -->
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script>
            $(function(){
                $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "any"
                });            
                $("#filetree").fileTree({
                    root: '/',
                    
                    expandSpeed: 100,
                    collapseSpeed: 100,
                    multiFolder: false                    
                }, function(file) {
                    alert(file);
                }, function(dir){
                    setTimeout(function(){
                        page_content_onresize();
                    },200);                    
                });                
            });            
        </script>
       @stack('script')
       @yield('script')
    </body>
</html>