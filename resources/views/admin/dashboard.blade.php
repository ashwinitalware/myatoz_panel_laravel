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
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('public/css/theme-default.css') }}"/>
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('public/css/notification.css') }}"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
         <!-- Header -->
    @include('admin.layouts.header')
           
               
               
                               
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                               <div class="panel-body">
                                    <div class="form-group">
                                    	<div class="col-md-12" align="center" style="margin-top:-12px;">
                                          <h5 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class="fa fa-users"></span> <strong>Dashboard</strong></h5>
                                        </div>
                                    	
                                          
                      
                                  
                                  
                         <div class="col-md-2" style="border-style: dashed;margin: 2vh;">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-check-circle"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">{{$customers_data}}</div>
                                    <div class="widget-title" style="font-size: small;">Registered Customers</div>
                                   <!--  <div class="widget-subtitle">On your website</div> -->
                                </div>
                                <div class="widget-controls">                                
                                <!--     <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>     -->                        
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                                               
                                             
                                    </div>
                                      <div class="col-md-2" style="border-style: dashed;margin: 2vh;">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-spinner"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">{{$driver_data}}</div>
                                    <div class="widget-title" style="font-size: small;">Registered Driver</div>
                                   <!--  <div class="widget-subtitle">On your website</div> -->
                                </div>
                                <div class="widget-controls">                                
                                <!--     <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>     -->                        
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        </div>
<a href="{{url('customers_subscription_details/Subsription Expired')}}" style="color: red;">
                        <div class="col-md-2" style="border-style: dashed;margin: 2vh;">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-bars"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">{{$sunscription_expired}}</div>
                                    <div class="widget-title" style="font-size: small;">Subscription Expired</div>
                                </div>                 
                            
                            </div>                 
                        </div>
</a>
<a href="{{url('customers_subscription_details/Subsribed')}}" style="color:green;">
                        <div class="col-md-2" style="border-style: dashed;margin: 2vh;">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-bars"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">{{$subsribed}}</div>
                                    <div class="widget-title" style="font-size: small;">Subscribed</div>
                                </div>                
                            
                            </div>                 
                        </div>
                    </a>
                    <a href="{{url('customers_subscription_details/Not Subscribed')}}" style="color:grey;">
                        <div class="col-md-2" style="border-style: dashed;margin: 2vh;">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-bars"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">{{$not_subsribed}}</div>
                                    <div class="widget-title" style="font-size: small;">Not Subscribed</div>
                                </div>                   
                            
                            </div>                 
                        </div>
                    </a>
                    <!-- <a href="{{url('customers_subscription_details/Not Subscribed')}}" style="color:grey;"> -->
                        <div class="col-md-2" style="border-style: dashed;margin: 2vh;">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-rupee"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">{{$total_epass_amount}}</div>
                                    <div class="widget-title" style="font-size: small;">E Pass Collection</div>
                                </div>                   
                            
                            </div>                 
                        </div>
                    <!-- </a> -->
                                  
                                               
                                             
                                    </div>  
                                </div>
                            </div>
                            
                            
                           
                            </div>
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
        <audio id="audio-alert" src="{{ asset('public/audio/alert.mp3')}}" preload="auto"></audio>
        <audio id="audio-fail" src="{{ asset('public/audio/fail.mp3')}}" preload="auto"></audio>
        <!-- END PRELOADS -->

        <!-- START SCRIPTS -->
        <script type="text/javascript" src="{{ asset('public/js/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/jquery/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap.min.js') }}"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->    
        <script type='text/javascript' src="{{ asset('public/js/plugins/icheck/icheck.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
        
        
        
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/bootstrap/bootstrap-select.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
        
        
        <script type="text/javascript" src="{{ asset('public/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>    

        
        <script type="text/javascript" src=" {{asset('public/js/plugins/dropzone/dropzone.min.js')  }}"></script>
        <script type="text/javascript" src=" {{asset('public/js/plugins/fileinput/fileinput.min.js') }}"></script>        
        <script type="text/javascript" src=" {{asset('public/js/plugins/filetree/jqueryFileTree.js') }}"></script>
        <!-- END PAGE PLUGINS -->
        
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{asset('public/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{asset('public/js/actions.js')}}"></script>
        <!-- END TEMPLATE -->
        
      
        
        
   
        
        
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
       
    </body>
</html>
