@extends('admin.layouts.layout')
                
@section('content')  
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
                            <div class="panel panel-default">
                                 
                                    <!--<h5 class="panel-title" style="color:#FFFFFF; background-color:#; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> &nbsp;Spilicer</h5> -->
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Update Customer Registration Details</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                    <div class="form-group">
                                    
                                    	
                                    
                                <form role="form" method="post" action="{{ route('customer_registration.update', $customer->id) }}" enctype="multipart/form-data">
                                                    @csrf   
                                                    @method('PUT') 
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-top:-10px;">   
                                                          
                                             
                                              <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                              <div class="col-md-3" style="margin-top:15px">
                                                <label style="float:left"> Select City<font color="#FF0000">*</font></label>
                                          <select class="form-control select" data-live-search="true" name="city_id">
                                            <option value="{{ @$customer->city_id }}">{{ @$customer->city_name }}</option>
                                              @forelse($All_Cities  as $key => $cities) -->
                                              <option value="{{ @$cities->id }}">{{ @$cities->city }}</option>
                                              @empty
                                              <p>No Record Found</p>
                                              @endforelse
                                          </select>
                                      </div>
                                               <div class="col-md-3" style="margin-top:15px;">
                                                	<label> First Name<font color="#FF0000">*</font></label>
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="first_name" value="{{@$customer->first_name}}" placeholder="Enter first Name" class="form-control"  input/>
                                                </div> 

                                                <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Middle Name<font color="#FF0000">*</font></label>
                                                    @error('middle_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="middle_name" value="{{@$customer->middle_name}}" placeholder="Middle Name" class="form-control"  input/>
                                                </div> 
                                                
                                                <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Last Name<font color="#FF0000">*</font></label>
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="last_name" value="{{@$customer->last_name}}" placeholder="Last Name" class="form-control"  input/>
                                                </div>

                                                <div class="col-md-3" style="margin-top:15px;">
                                                	<label>User Id<font color="#FF0000">*</font></label>
                                                    @error('user_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="user_id" value="{{@$customer->user_id}}" placeholder="Enter User Id" class="form-control"  input/>
                                                </div> 

                                                <div class="col-md-3" style="margin-top:15px;">
                                                    <label>Aadhar Number<font color="#FF0000">*</font></label>
                                                    @error('aadhar_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="number" name="aadhar_number" value="{{@$customer->aadhar_number}}" placeholder="Enter User Id" class="form-control"  input/>
                                                </div> 
                                                  <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Address<font color="#FF0000">*</font></label>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="address" value="{{@$customer->address}}" placeholder="Address" class="form-control"  input/>
                                                </div>

                                                <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Contact No.<font color="#FF0000">*</font></label>
                                                    @error('contact_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="number" name="contact_no" value="{{@$customer->contact_no}}" placeholder="Contact No." class="form-control"  input/>
                                                </div>




                                                 <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Nominee Details<font color="#FF0000">*</font></label>
                                                    @error('nominee_details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                     <!-- <input type="textarea" placeholder="Nominee Detail" class="form-control" required/> -->
                                                     <textarea name="nominee_details" class="form-control" cols="2" rows="2">{{@$customer->nominee_details}}</textarea>
                                                   
                                     
                                                </div>
                                            

                                                    <div class="col-md-3" style="margin-top:25px;">
                                                        <label><Upload class="csv"></Upload></label>
                                                        @error('customer_photo_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                           <div class="input-group">
                                                               <input type="file" class="fileinput btn-primary" name="customer_photo_name" data-filename-placement="inside" title="Photo Upload" width="100 input/">
                                                           </div>
                                                           <div class="row">
                                                           <img src="{{asset($customer->customer_photo_name)}}" style="width: 25px;height: 25px">
                                                           </div>
                                                    </div>

                                                    <div class="col-md-3" style="margin-top:25px;">
                                                        <label><Upload class="csv"></Upload></label>
                                                        @error('aadhar_photo_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                           <div class="input-group">
                                                               <input type="file" class="fileinput btn-primary" name="aadhar_photo_name" data-filename-placement="inside" title="Aadhar Upload" width="100 input/" >
                                                           </div>
                                                           <div class="row">
                                                           <img src="{{asset($customer->aadhar_photo_name)}}" style="width: 25px;height: 25px">
                                                           </div>
                                                    </div>

                                                    <div class="col-md-3" style="margin-top:25px;">
                                                        <label>Daily Limit</label>
                                                               <input type="number" name="daily_limit" value="{{@$customer->daily_limit}}" placeholder="Daily Limit" class="form-control"  input/>

                                                    </div>
        
                                            <div class="col-md-5"></div>
                                            <div class="col-md-2" align="center">
          <br>
                                                    <div class="input-group" >
                                                       <button type="submit" class="btn btn-primary"> <span class="fa fa-user"></span> Update </button>
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
                            
                            
                            
                
                    <div class="row" id="adminList">
                        <div class="col-md-12" style="margin-top:-15px;">

                          
                            <div class="panel panel-default">
                                
                                
                                	
                                <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                
                                <div class="col-md-12" style="margin-top:15px;">
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i>  Registered Customer</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                
                                                <th>Sr.No</th>
                                                <th>Date</th>
                                                <th>City</th>
                                                <th>Name</th>
                                                <th>User Id</th>
                                                <th>Aadhar No.</th>
                                                <th>Address</th>
                                                <th>Contact No.</th>
                                                <th>Nominee Details</th>
                                                <th>Photo</th>
                                                <th>Aadhar</th>
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($All_Customers as $key => $customers)
                                             <tr>
                                                <td>{{$key-=-1}}</td>
                                                <td width="8%">{{date('d-m-Y',strtotime($customers->created_at))}}</td>
                                                <td>{{$customers->city_name}}</td>
                                                <td>{{$customers->first_name}} {{$customers->middle_name}} {{$customers->last_name}}</td>
                                                <td>{{$customers->user_id}}</td>
                                                <td>{{$customers->aadhar_number}}</td>
                                                <td>{{$customers->address}}</td>
                                                <td>{{$customers->contact_no}}</td>
                                                <td>{{$customers->nominee_details}}</td>
                                                <td><a href="{{asset($customers->customer_photo_name)}}" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><img src="{{asset($customers->customer_photo_name)}}" style="width: 25px;height: 25px"></a></td>
                                                <td><a href="{{asset($customers->aadhar_photo_name)}}" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><img src="{{asset($customers->aadhar_photo_name)}}" style="width: 25px;height: 25px"></a></td>
                                                <!-- <td>{{ucfirst($customers->status)}}</td> -->
                                                <td>
                                                	<button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                            
                                                    <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('customer_registration.destroy', $customers->id) }}">    	
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
                    
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">??</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="deleteWarningText"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>               

                <a class="btn btn-primary" data-toggle="modal" data-target="#deleteModal" href="Javascript:void(0)" onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();">Yes</a>
            
                <form id="delete-form" action="" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('script')


<script>
    $(document).ready(function() {
        $('#adminList').on('click', '.openDeleteModal', function() {
            var deleteModalText = $(this).attr('data-deleteMOdalText');
            var deleteUrl = $(this).attr('data-deleteUrl');
            $('#deleteWarningText').text(deleteModalText);
            $('#delete-form').attr('action', deleteUrl);
            $('#deleteModal').modal('show');
        });
    });
</script>

@endpush

