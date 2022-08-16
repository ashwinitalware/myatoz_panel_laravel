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
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Employee Datewise Login Report</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                    <div class="form-group"> 
                                    
                                    	
                                    
                                    	<form role="form" action="{{url('driver_login_logout_report')}}" method="GET">
                                        <div class="col-md-12">
                                             <div class="col-md-4" style="margin-top:15px"></div>
                                                <div class="col-md-2" align="left" style="margin-top:15px;">
                                                    <label>From Date</label>
                                                    <div class="input-group">
                                                        <input type="date" id="dp-3" name="from_date" class="form-control " value="{{isset($_GET['from_date'])?$_GET['from_date']:''}}" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div> 
                                                <div class="col-md-2" align="left" style="margin-top:15px;">
                                                
                                                    <label>To Date</label>
                                                    <div class="input-group">
                                                        <input type="date" id="dp-3" name="to_date" class="form-control " value="{{isset($_GET['to_date'])?$_GET['to_date']:''}}" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div> 
                                                   
                                          
                                            
            
                                                <div class="col-md-2" align="left">
                                                    
                                                    <div class="input-group" style="margin-top:6vh;">
                                                       
                                                        <button type="submit" name="search" class="btn btn-primary">Search </button>
                                                    </div>
                                                </div>    
                                               
                                                 <div class="col-md-4" style="margin-top:15px"></div>

                                               
                                                   
                                        
                                    </div>   

                                    </form>
                                </div>
                              </div>   
@if(isset($_GET['search']))
                              <!-- START ACCORDION --> 
                   <!-- {{$All_Drivers}}                 -->
                            <div class="panel-group accordion accordion-dc">
            @foreach($All_Drivers as $data)  
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#{{$data->id}}">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="30%">{{$data->first_name.' '.$data->middle_name.' '.$data->last_name}}</td>
                                                        <td width="30%">( Total Km : {{$data->total_km}}</td>
                                                        <td width="30%">Total Hrs : {{$data->total_hrs}} )</td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </h4>
                                    </div>                                
                                    <div class="panel-body" id="{{$data->id}}">
                                        
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr class="info">
                                                    <th rowspan="1"></th>
                                                    <th colspan="3" align="center">Login</th>
                                                    <th colspan="3" align="center">Logout</th>
                                                    <th rowspan="1"></th>
                                                    <th rowspan="1"></th>
                                                </tr>
                                            <tr>
                                                    <th rowspan="1">Sr No</th>
                                                    <th align="center">Date & Time</th>
                                                    <th align="center">Meter Reading</th>
                                                    <th>Photo</th>
                                                    <th align="center">Date & Time</th>
                                                    <th align="center">Meter Reading</th>
                                                    <th>Photo</th>
                                                    <th rowspan="1">Total Km</th>
                                                    <th rowspan="1">Total Hrs</th>
                                                </tr>
                                        </thead>
                                        @if($data->dailyLoginDetails)
                                        @php $i=0; @endphp
                                        @foreach($data->dailyLoginDetails as $loginData)
@php $i++; @endphp
                                        <tbody>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{date('d-m-Y h:i:s a',strtotime($loginData->login_day_date))}}</td>
                                                <td>{{$loginData->meter_reading_login}}</td>
                                                <td>
                                                    <a target="_blank" href="{{'public/'.$loginData->meter_photo_login}}">
                                                    <button type="button" class="btn btn-primary btn-rounded">Preview</button></a>
                                                </td>
                                                <td>
                                                    @if($loginData->logout_day_date)
                                                    {{date('d-m-Y h:i:s a',strtotime($loginData->logout_day_date))}}
                                                    @endif
                                                </td>
                                                <td>{{$loginData->meter_reading_logout}}</td>
                                                <td>
                                                    @if($loginData->logout_day_date)
                                                    <a target="_blank" href="{{'public/'.$loginData->meter_photo_logout}}">
                                                    <button type="button" class="btn btn-primary btn-rounded">Preview</button></a>
                                                    @endif
                                                </td>

                                                <td>{{$loginData->total_run_km}}</td>
                                                <td>{{$loginData->total_hrs}}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                        @endif
                                    </table>
                                    </div>                                
                                </div>
            @endforeach
                            </div>
@endif
                           
                            </div>
                         
                         
                         <div>
                       <div>
                            <!-- END DEFAULT DATATABLE -->
                            
                            
                            
                
                    <div class="row">
                        <div class="col-md-12" style="margin-top:-15px;">

                          
                            <div class="panel panel-default">
                                
                                
                                	
                                <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                
                                
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