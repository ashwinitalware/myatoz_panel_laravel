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
                                
                                
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i>Update Subscription for customer</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                    <div class="form-group"> 
                                    <form role="form" method="post" action="{{ route('subscription.update', $subscription->id) }}">
                                       @csrf
                                       @method('PUT') 
                                        <div class="col-md-12">

                                            <div class="col-md-2" style="margin-top:15px">
                                                <label style="float:left"> Select City<font color="#FF0000">*</font></label>
                                          <select class="form-control select" data-live-search="true" name="city_id">
                                            <option value="{{ @$subscription->city_id }}">{{ @$subscription->city_name }}</option>
                                              @forelse($All_Cities  as $key => $cities) -->
                                              <option value="{{ @$cities->id }}">{{ @$cities->city }}</option>
                                              @empty
                                              <p>No Record Found</p>
                                              @endforelse
                                          </select>
                                      </div> 
                                             <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Add Subscription Type<font color="#FF0000"></font></label>
                                                    <input type="text" name="subscription_type" placeholder="" value="{{@$subscription->subscription_type}}" class="form-control" required/>
                                                </div>
                                                <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Duration<font color="#FF0000"></font></label>
                                                    <input type="text" name="duration" placeholder="" value="{{@$subscription->duration}}" class="form-control" required/>
                                                </div>
                                                <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Amount<font color="#FF0000"></font></label>
                                                    <input type="number"name="amount" placeholder="" value="{{@$subscription->amount}}" class="form-control" required/>
                                                </div>
                                                          
                                          
                                            
            
                                                <div class="col-md-2" align="left">
                                                    
                                                    <div class="input-group" style="margin-top:5vh; margin-bottom:15px;">
                                                       
                                                    	<button type="submit" class="btn btn-primary"></span> Update </button>
                                                    </div>
                                                </div>    
                                               
                                                 

                                               
                                                 
                                            </div> 
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
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Subscription for customer</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>sr.no</th>
                                                <th>City Name</th>
                                                <th>Subscription Type</th>
                                                <th>Duration</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($All_Subscriptions as $key => $subscriptions)
                                             <tr>
                                                
                                                <td>{{$key-=-1}}</td>
                                                <td>{{$subscriptions->city_name}}</td>
                                                <td>{{$subscriptions->subscription_type}}</td>
                                                <td>{{$subscriptions->duration}}</td>
                                                <td>{{$subscriptions->amount}}</td>
                                                <td>{{$subscriptions->status}}</td>
                                                <td>
                                                <a href="{{ route('subscription.edit', $subscriptions->id) }}" class="btn btn-outline-primary btn-sm  faIconsInList" title="View">   
                                                	<button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit ">
                                                    <i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                                </a>	
                                                    <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>                                              
                                                </td>
                                            </tr>
                                            @empty
                                    <p>No Record Found</p>
                                @endforelse                                              
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