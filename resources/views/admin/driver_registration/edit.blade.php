@extends('admin.layouts.layout')
                
@section('content')  
                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12" style="margin-top:3vh">
                           
                            </div>
                
                        
                        </div>
                    </div>

                  <div class="row">
                        <div class="col-md-12" >
                	 <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                 
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Update Driver Registration Details</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                    <div class="form-group">
                                    
                                    	
                                    
                              
                                <form role="form" method="post" action="{{ route('driver_registration.update', $driver->id) }}" enctype="multipart/form-data">
                                                    @csrf   
                                                    @method('PUT')
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-top:-10px;">   
                                                          
                                                <div class="col-md-3" style="margin-top:15px">
                                                    <label style="float:left"> Select City<font color="#FF0000">*</font></label>
                                                    @error('city_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <select class="form-control select @error('city_id') is-invalid @enderror" data-live-search="true" name="city_id">
                                                        <option value="{{ @$driver->city_id }}">{{ @$driver->city_name }}</option>
                                                    @forelse($All_Cities  as $key => $cities) -->
                                                    <option value="{{ @$cities->id }}">{{ @$cities->city }}</option>
                                                    @empty
                                                    <p>No Record Found</p>
                                                    @endforelse
                                                    </select>
                                                </div>
                                             
                                              <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                               <div class="col-md-3" style="margin-top:15px;">
                                                	<label>First Name<font color="#FF0000">*</font></label>
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="first_name" value="{{@$driver->first_name}}" placeholder="Enter first Name" class="form-control @error('first_name') is-invalid @enderror" required input/>
                                                </div> 

                                                <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Middle Name<font color="#FF0000">*</font></label>
                                                    @error('middle_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="middle_name" value="{{@$driver->middle_name}}" placeholder="Middle Name" class="form-control @error('middle_name') is-invalid @enderror" required input/>
                                                </div> 
                                                
                                                <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Last Name<font color="#FF0000">*</font></label>
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="last_name" value="{{@$driver->last_name}}" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" required input/>
                                                </div>
                                          <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Auto No.<font color="#FF0000">*</font></label>
                                                    @error('auto_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="auto_no" value="{{@$driver->auto_no}}" placeholder="Enter Auto No" class="form-control @error('auto_no') is-invalid @enderror" required input/>
                                                </div> 
                                                 <div class="col-md-3" align="left" style="margin-top:15px;">
                                                     <div class="input-group">
                                                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                                    </div>
                                                
                                                    <label>Auto insurance validity date</label>
                                                    @error('auto_insurance_validity_expire_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <div class="input-group">
                                                        
                                                        <div class="col-md-3" style="padding-right: 10px;">
                                                     <div class="input-group" >
                                                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"  />
                                                    </div>
                                                    <div class="input-group col-md-12" >
                                                        <input type="date" class="form-control @error('auto_insurance_validity_expire_date') is-invalid @enderror" style="width: 100%;" value="{{@$driver->auto_insurance_validity_expire_date}}" name="auto_insurance_validity_expire_date" value="{{date('Y-m-d')}}" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" required/>
                                                    </div>
                                                </div>
                                                    </div>
                                                </div> 
                                                <div class="col-md-3" style="margin-top:15px;">
                                                	<label>User Id<font color="#FF0000">*</font></label>
                                                    @error('user_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="user_id" value="{{@$driver->user_id}}" placeholder="Enter User Id" class="form-control @error('user_id') is-invalid @enderror" required input/>
                                                </div> 

                                          
                                                  <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Address<font color="#FF0000">*</font></label>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="address" value="{{@$driver->address}}" placeholder="Address" class="form-control @error('address') is-invalid @enderror" required input/>
                                                </div>

                                                <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Contact No.<font color="#FF0000">*</font></label>
                                                    @error('contact_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="number" name="contact_no" value="{{@$driver->contact_no}}" placeholder="Contact No." class="form-control @error('contact_no') is-invalid @enderror" required input/>
                                                </div>

                                            
                                              <div class="col-md-3" style="margin-top:15px;">
                                                    <label>Account Holder Name<font color="#FF0000">*</font></label>
                                                    @error('account_holder_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="account_holder_name" value="{{@$driver->account_holder_name}}" placeholder="Account holder name" class="form-control @error('account_holder_name') is-invalid @enderror" required input/>
                                                </div>
                                                 <div class="col-md-3" style="margin-top:15px;">
                                                    <label>Account Number<font color="#FF0000">*</font></label>
                                                    @error('account_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="account_number" value="{{@$driver->account_number}}" placeholder="Account number" class="form-control @error('account_number') is-invalid @enderror" required input/>
                                                </div>
                                                 <div class="col-md-3" style="margin-top:15px;">
                                                    <label>IFSC Code<font color="#FF0000">*</font></label>
                                                    @error('ifsc_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="ifsc_code" value="{{@$driver->ifsc_code}}" placeholder="IFSC code" class="form-control @error('ifsc_code') is-invalid @enderror"  input/>
                                                </div>
                                                  <div class="col-md-3" style="margin-top:15px;">
                                                    <label>Bank Name<font color="#FF0000">*</font></label>
                                                    @error('bank_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                    <input type="text" name="bank_name" value="{{@$driver->bank_name}}" placeholder="Bank name" class="form-control @error('bank_name') is-invalid @enderror"  input/>
                                                </div>
                                                 <div class="col-md-3" style="margin-top:15px;">
                                                	<label>Nominee Details<font color="#FF0000">*</font></label>
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                     <!-- <input type="textarea" placeholder="Nominee Detail" class="form-control" required/> -->
                                                     <textarea name="nominee_details"  class="form-control" cols="2" rows="2">{{@$driver->nominee_details}}</textarea>
                                                   
                                     
                                                </div>
                                            

                                                    <div class="col-md-3" style="margin-top:6vh;">
                                                       <!--  <label><Upload class="csv"></Upload></label> -->
                                                       @error('driver_photo_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                           <div class="input-group">
                                                               <input type="file"class="fileinput btn-primary @error('driver_photo_name') is-invalid @enderror" name="driver_photo_name" data-filename-placement="inside"title="Photo Upload"width="100 input/">
                                                           </div>
                                                           <div class="row">
                                                           <img src="{{asset($driver->driver_photo_name)}}" style="width: 25px;height: 25px">
                                                           </div>
                                                    </div>

                                                    <div class="col-md-3" style="margin-top:6vh;">
                                                        @error('driver_aadhar_photo_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <font color="#FF0000" style="font-size: 10px"><strong>{{ $message }}</strong></font>
                                                    </span>
                                                    @enderror
                                                     
                                                           <div class="input-group">

                                                               <input type="file"class="fileinput btn-primary @error('driver_aadhar_photo_name') is-invalid @enderror" name="driver_aadhar_photo_name" data-filename-placement="inside" title="Aadhar Upload"width="100 input/">
                                                           </div>
                                                           <div class="row">
                                                           <img src="{{asset($driver->driver_aadhar_photo_name)}}" style="width: 25px;height: 25px">
                                                           </div>
                                                    </div>
        
                                            <div class="col-md-3" style="margin-top:6vh;">
          
                                                    <div class="input-group" align="right">
                                                       
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

                          
                            <div class="panel panel-default"style="overflow-x:scroll;">
                                
                                
                                	
                                <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                
                                <div class="col-md-12" style="margin-top:15px;">
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i>  Registered Drivers</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                
                                                <th>Sr.No</th>
                                                <th>Full Name</th>
                                                <th>Auto No.</th>
                                                <th>Insurance Validity Dt.</th>
                                                <th>User Id</th>
                                                <th>Address</th>
                                                <th>Contact No.</th>
                                                <th>Acc holder name</th>
                                                <th>Acc No</th>
                                                <th>IFSC Code</th>
                                                <th>Bank Name</th>
                                                <th>Nominee Details</th>
                                                <th>P1</th>
                                                <th>P2</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($All_Drivers as $key => $drivers)
                                            <tr>
                                                <td>{{$key-=-1}}</td>
                                                <td>{{$drivers->first_name.' '.$drivers->middle_name.' '.$drivers->last_name}}</td>
                                                <td>{{$drivers->auto_no}}</td>
                                                <td>{{$drivers->auto_insurance_validity_expire_date}}</td>
                                                <td>{{$drivers->user_id}}</td>
                                                <td>{{$drivers->address}}</td>
                                                <td>{{$drivers->contact_no}}</td>
                                                <td>{{$drivers->account_holder_name}}</td>
                                                <td>{{$drivers->account_number}}</td>
                                                <td>{{$drivers->ifsc_code}}</td>
                                                <td>{{$drivers->bank_name}}</td>
                                                <td>{{$drivers->nominee_details}}</td>
                                                <td><a href="{{asset($drivers->driver_photo_name)}}" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><img src="{{asset($drivers->driver_photo_name)}}" style="width: 25px;height: 25px"></a></td>
                                                <td><a href="{{asset($drivers->driver_aadhar_photo_name)}}" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><img src="{{asset($drivers->driver_aadhar_photo_name)}}" style="width: 25px;height: 25px"></a></td>
                                                <td>{{ucfirst($drivers->status)}}</td>
                                                <td>
                                                	<button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>              
                                                	
                                                    <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('driver_registration.destroy', $drivers->id) }}">    	
                                                    <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;">
                                                    </i></button>   
                                                    </a>    

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
                <span aria-hidden="true">×</span>
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

