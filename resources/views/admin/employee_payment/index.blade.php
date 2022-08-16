@extends('admin.layouts.layout')
                
@section('content')  
                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                               <div class="panel-body">
                                    <div class="form-group">
                                    	<div class="col-md-12" align="center" style="margin-top:-12px;">
                                        
                                        </div>
                                     </div>       
                                             
                                    
                                </div>
                            </div>
                            
                            
                           
                            
                        </div>
                    </div>
                
                
                  <div class="row">
                        <div class="col-md-12" style="margin-top:-15px;">
                	 <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                
                                    <!--<h5 class="panel-title" style="color:#FFFFFF; background-color:#; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> &nbsp;Spilicer</h5> -->
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Employee Payment</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                    <div class="form-group"> 
                                    
                                    	
                                    
                                    	<form role="form">
                                        <div class="col-md-12">
                                             <div class="col-md-4" style="margin-top:15px"></div>
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
                                                   
                                          
                                            
            
                                                <div class="col-md-2" align="left">
                                                    
                                                    <div class="input-group" style="margin-top:5vh; margin-bottom:15px;">
                                                       
                                                        <button type="button" class="btn btn-primary"></span> Search </button>
                                                    </div>
                                                </div>    
                                               
                                                 <div class="col-md-4" style="margin-top:15px"></div>

                                               
                                                   
                                        
                                    </div>
                                    <div class="col-md-12">
                                    <div class="col-md-2" style="margin-top:15px">
                                                          <label style="float:left">Name: <font color="#FF0000">Kapil Sharma</font></label>
                                                    
                                                    </div>
                                                    <div class="col-md-2" style="margin-top:15px">
                                                          <label style="float:left">Mobile Number: <font color="#FF0000">9579915551</font></label>
                                                    
                                                    </div>
                                                    <div class="col-md-2" style="margin-top:15px">
                                                          <label style="float:left">UserId: <font color="#FF0000">KP101</font></label>
                                                    
                                                    </div>
                                                    <div class="col-md-2" style="margin-top:15px">
                                                          <label style="float:left">Auto Number: <font color="#FF0000">MH 27 AU 5216</font></label>
                                                    
                                                    </div>
                                                     <div class="col-md-4" style="margin-top:15px"></div>
                                                 </div>
                                                        <div class="col-md-2" align="left" style="margin-top:15px;">
                                                     <div class="input-group">
                                                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                                    </div>
                                                
                                                    <label>From Date</label>
                                                    <div class="input-group">
                                                        <input type="text" id="dp-3" class="form-control " value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div> 
                                                <div class="col-md-2" align="left" style="margin-top:15px;">
                                                     <div class="input-group">
                                                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                                    </div>
                                                
                                                    <label>To Date</label>
                                                    <div class="input-group">
                                                        <input type="text" id="dp-3" class="form-control " value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div> 
                                                 <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Amount to pay<font color="#FF0000"></font></label>
                                                    <input type="number" placeholder="Amount to pay" class="form-control" required input/>
                                                </div>
                                                 <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Reading (KM)<font color="#FF0000"></font></label>
                                                    <input type="number" placeholder="Reading" class="form-control" required input/>
                                                </div>
                                                  <div class="col-md-2" align="left">
                                                    
                                                    <div class="input-group" style="margin-top:5vh; margin-bottom:15px;">
                                                       
                                                        <button type="button" class="btn btn-primary"></span> Pay Now </button>
                                                    </div>
                                                </div>    

                                    </form>
                                </div>
                              </div>
                            </div>
                         
                         
                         <div>
                       <div>
                            <!-- END DEFAULT DATATABLE -->
                            
                            
                            
                
                    <div class="row">
                        <div class="col-md-12" style="margin-top:-15px;">

                          
                            <div class="panel panel-default">
                                
                                
                                	
                                <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                
                                <div class="col-md-12" style="margin-top:15px;">
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Employee Payment</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>sr.no</th>
                                                <th>Customer Name</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Amount Pay</th>
                                               <th>Reading</th>
                                           <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                	<button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                                	<button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>                                              
                                                </td>
                                            </tr>
                                          
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                
                                <div class="col-md-3" style="margin-top:15px;"></div>
                                
                                
                            </div>
                           

                        </div>
                    </div>            
                    
                    
                    
                    
                    
                    </div>                                
                </div>
                <!-- PAGE CONTENT WRAPPER -->   
                @endsection

@push('script')


<script>
    $(document).ready(function() {
        $('#adminList').on('click', '.openDeleteModal', function() {
            
            $('#deleteModal').modal('show');
        });
    });
</script>

@endpush