<!DOCTYPE html>
<html lang="en">
<head>        
        <!-- META SECTION -->
        <title>MyAtoz</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../../logo/favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../../css/theme-default.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="../../css/notification.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
       <div class="page-container page-navigation-top">            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- START X-NAVIGATION VERTICAL -->
                     <ul class="x-navigation x-navigation-horizontal">
                    <li class="xn-logo" style="margin-right:30px;">
                        <a> <img src="../../logo/logo.jpg" alt="My Atoz" width="100px" height="auto"  style="margin-top:-15px;"/></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                   <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="EMR - OPD Software"/>
                        </a>                                                        
                    </li>    
                    <!-- <li class="xn-openable"> -->
                        <li class="xn-openable">
                            <a href="dashboard.html" title="Admin Dashboard"><span class="fa fa-tachometer"></span>Dashboard</a>
                        </li>
                         <li class="xn-openable">
                            <a href="#" title="Employee"><span class="fa fa-navicon"></span>Master</a>
                             <ul>
                                 <li><a href="city.html"><span class="fa fa-plus"></span>Add City</a></li>
                            <li><a href="area.html"><span class="fa fa-plus"></span> Add Area</a></li>
                         
                            <li><a href="root.html"><span class="fa fa-road"></span> Route</a></li>
                             <li><a href="subscription.html"><span class="fa fa-spinner"></span> Add Subscription for customer</a></li>
                            <li><a href="modepayment.html"><span class="fa fa-money"></span> Mode of Payment</a></li>
                        </ul>
                        </li>
                          <li class="xn-openable">
                            <a href="#" title="Employee"><span class="fa fa-users"></span>Employee</a>
                             <ul>
                            <li><a href="emplyoeereg.html"><span class="fa fa-user"></span> Employee Registration</a></li>
                            <li><a href="employemgt.html"><span class="fa fa-info"></span> Employee Management</a></li>
                        </ul>
                        </li>
                         <li class="xn-openable">
                            <a href="#" title="Customer"><span class="fa fa-user"></span>Customer</a>
                             <ul>
                            <li><a href="customerreg.html"><span class="fa fa-edit"></span> Customer Registration</a></li>
                           
                            <li><a href="E-pass.html"><span class="fa fa-ticket"></span> E-Pass</a></li>
                        </ul>
                        </li>
                         <li class="xn-openable">
                            <a href="#" title="Account"><span class="fa fa-university"></span>Account</a>
                             <ul>
                           
                           <!--  <li><a href="payment.html"><span class="fa fa-money"></span> Payment for employee</a></li> -->
                              <li><a href="payment.html"><span class="fa fa-money"></span> Employee Payment</a></li>
                        </ul>
                        </li>
                       <!--   <li class="xn-openable">
                            <a href="#" title="Extras"><span class="fa fa-database"></span>Extras</a>
                             <ul>
                                                    <li>
                            <a href="meassage.html" title="Notification"><span class="fa fa-bell"></span>Notification</a>
                        </li>
                            <li>  <a href="coupon.html" title="Coupon"><span class="fa fa-credit-card"></span>Coupon</a></li>
                        </ul>
                        </li>
 -->
                    
                        <li class="xn-openable">
                            <a href="reports.html" title="Report"><span class="fa fa-file"></span>Reports</a>
                        </li>
                     <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right" style="margin-right:25px; min-width:100px; color:#FFFFFF; padding-top:20px;">
                        Welcome, Sharique Sheikh
                    </li>
                    
                </ul>
                <!-- END X-NAVIGATION -->
                      
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                               <div class="panel-body">
                                    <div class="form-group">
                                              
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <div class="row">
                    <div class="col-md-12" style="margin-top:-15px;">
                        <!-- START DEFAULT TABLE -->
                        <div class="panel panel-default">
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-list-alt"></i> &nbsp;Coupon</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group"> 
                                    <form role="form">
                                        <div class="col-md-12">
                                             
                                            <div class="form-group" style="margin-top:-10px;">  
                                                   <div class="col-md-2" style="margin-top:15px">
                                                          <label style="float:left"> Select Customer<font color="#FF0000"></font></label>
                                                    <select class="form-control select" data-live-search="true">
                                                        <option>All</option>
                                                        <option>Kapil Sharma</option>
                                                        <option>Sharique Shaikh</option>
                                                        <option></option>
                                                        <option></option>
                                                    </select>
                                                    </div>
                                                <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Coupon Code<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder="Coupon Code" class="form-control" required/>
                                                </div> 
                                                
                                                <div class="col-md-1" style="margin-top:15px;">
                                                    <label>Discount<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder="Discount" class="form-control" required/>
                                                </div>

                                            <div class="col-md-1" style="margin-top:33px">
                                                      <!--     <label style="float:left"> Select Customer<font color="#FF0000"></font></label> -->
                                                    <select class="form-control select" data-live-search="true">
                                                        <option>₹</option>
                                                        <option>%</option>
                                                      
                                                    </select>
                                                    </div>
                                                      <div class="col-md-2" align="left" style="margin-top:15px;">
                                                     <div class="input-group">
                                                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                                    </div>
                                                
                                                    <label>Valid Till</label>
                                                    <div class="input-group">
                                                        <input type="text" id="dp-3" class="form-control " value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div> 
                                                   <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Min ride value<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder="Min ride value" class="form-control" required/>
                                                </div>

                                                <div class="col-md-2" style="margin-top:2.8rem;" align="center">
                                                    <div class="input-group" style=" margin-bottom:15px;">
                                                    <button type="button" class="btn btn-primary"><!-- <span class="fa fa-user"></span>  -->
                                                        Submit</button>
                                                    </div>
                                                </div>    
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <div>
            <div>
            <!-- END DEFAULT TABLE -->

            <!-- START DEFAULT DATATABLE -->
            <div class="row">
                <div class="col-md-12" style="margin-top:-15px;">
                    <div class="panel panel-default">
                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i  class="fa fa-list-alt"></i> &nbsp; Coupon</h5>
                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Customer</th>
                                        <th>Coupon Code</th>
                                          <th>Discount</th>
                                        <th>Valid Till</th>
                                          <th>Min ride value</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Customer"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                        <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Customer"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->          
        </div>
        <!-- PAGE CONTENT WRAPPER -->  
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
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
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
        <script type="text/javascript" src="../../js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->    
        <script type='text/javascript' src='../../js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="../../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        
        
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="../../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        
        
        <script type="text/javascript" src="../../js/plugins/datatables/jquery.dataTables.min.js"></script>    

        
        <script type="text/javascript" src="../../js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="../../js/plugins/filetree/jqueryFileTree.js"></script>
        <!-- END PAGE PLUGINS -->
        
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../../js/plugins.js"></script>        
        <script type="text/javascript" src="../../js/actions.js"></script>
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
