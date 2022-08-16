@extends('admin.layouts.layout')
                
@section('content')  
<style type="text/css">
    #pageloader
{
  background: rgba( 255, 255, 255, 0.8 );
  display: none;
  height: 100%;
  position: fixed;
  width: 100%;
  z-index: 9999;
}

#pageloader img
{
  left: 50%;
  margin-left: -32px;
  margin-top: -32px;
  position: absolute;
  top: 50%;
}
</style>
<div id="pageloader">
   <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
</div>
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
                    </div>

                  <div class="row">
                        <div class="col-md-12" >
                     <!-- START DEFAULT DATATABLE -->
                            @if(Session::has('success'))
                                    <div class="alert alert-dismissible alert-success" role="alert">
                                        {{ Session::get('success') }}
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>    
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-dismissible alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>    
                                    </div>
                                @endif
                            <div class="panel panel-default">
                                 
                                    <!--<h5 class="panel-title" style="color:#FFFFFF; background-color:#; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> &nbsp;Spilicer</h5> -->
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-bell"></i> Notifications</h5>
                                   
                                <div class="panel-body">
                                    <div class="form-group">
                                    
                                        
                                    
                                <form id="myform" role="form" method="post" action="{{ url('sendNotificationToCustomers') }}">
                                    @csrf
                                        <div class="col-md-12" style="margin:10px;">
                                            <div class="form-group" >
                                               <div class="col-md-3"></div>
                                               <div class="col-md-6">
                                                    <label> Title<font color="#FF0000">*</font></label>
                                                    <input type="text" required name="title" placeholder="Enter Title" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" input/>
                                                    
                                                </div>
                                               <div class="col-md-3"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin:10px;">
                                            <div class="form-group" >
                                               <div class="col-md-3"></div>
                                               <div class="col-md-6">
                                                    <label>Message<font color="#FF0000">*</font></label>
                                                    <textarea rows="13" placeholder="Enter Message" name="message" class="form-control" required></textarea>
                                                    
                                                </div> 
                                               <div class="col-md-3"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin:10px;">
                                            <div class="form-group" >
                                               <div class="col-md-3"></div>
                                            <div class="col-md-6" align="center">
                                                       <button type="submit" class="btn btn-primary"> <span class="fa fa-envelope"></span> Send </button>
                                               
                                                
                                                 
                                            </div> 
                                        </div>
                                    </div>
                                </form>
                                </div>
                              </div>
                            </div>
                         
                         
                         <div>
                       <div>
                    </div>                                
                </div>
                <!-- PAGE CONTENT WRAPPER -->   
                    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
  $("#myform").on("submit", function(){
    $("#pageloader").fadeIn();
  });//submit
});//document ready
</script>
@endsection

