@extends('admin.layouts.layout')
                
@section('content')  
                <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                {{-- <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                                    <a href="modepayment.html"><button type="button" class="btn active"
                                            style="background-color:#db464d; color:#FFFFFF"></i>Time-Table</button></a>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="margin-top:-15px;">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
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
                    <h5 class="panel-title"  style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><span class="fa fa-list-alt"></span></i> &nbsp;Update User-Manegement</h5>


                    <form role="form" method="post" action="{{ route('usermanagement.update', $Usermanagement->id) }}">
                        @csrf   
                        @method('PUT') 
                            <div class="form-group">



                                <form role="form">
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-10px; ">  
                                           

                                            <div class="col-md-2" style="margin-top:15px; margin-left: 10%;">
                                                <label>Username<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Username" name="username" value="{{ @$Usermanagement->username }}" class="form-control" required input/>
                                            </div> 
                                           
                                            <div class="col-md-2" style="margin-top:15px; margin-left: 10%;">
                                                <label>Password<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Password" name="password" value="{{ @$Usermanagement->password }}" class="form-control" required input/>
                                            </div>
                                            <div class="col-md-2" style="margin-top:15px; margin-left: 10%;">
                                                <label>Role Name<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Role Name" name="role_name" value="{{ @$Usermanagement->role_name }}" class="form-control" required input/>
                                            </div>
                                       <div class="col-md-12">
                                        <div class="col-md-1" style="margin-top: 2%; ">
                                            <input type="checkbox" style="float:left" id="add1" name="dashboard" value="1" {{($Usermanagement->dashboard == 1) ? 'checked':''}}>
                                            <label for="add0" ><font color="#FF0000">*&nbsp;</font>Dashboard 
                                            </label>
                                        </div>
                                      <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="add1" name="city" value="1" {{($Usermanagement->city == 1) ? 'checked':''}}>
                                                <label for="add1" ><font color="#FF0000">*&nbsp;</font>Add city 
                                                </label>
                                            </div>

                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="add2" name="area" value="1" {{($Usermanagement->area == 1) ? 'checked':''}}>
                                                <label for="add2" > <font color="#FF0000">*&nbsp;</font>Add Area 
                                                    </label>

                                            </div>

                                            <div class="col-md-2" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="addm1" name="insurance" value="1" {{($Usermanagement->insurance == 1) ? 'checked':''}}>
                                                <label for="addm1" > <font color="#FF0000">*&nbsp;</font>Add Monthly Insurance 
                                                    </label>

                                            </div>

                                            <div class="col-md-3" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="adds1" name="subscription" value="1" {{($Usermanagement->subscription == 1) ? 'checked':''}}>
                                                <label for="adds1" > <font color="#FF0000">*&nbsp;</font>Add Subcription of Customer 
                                                    </label>

                                            </div>

                                            <div class="col-md-2" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="mode1" name="payment" value="1" {{($Usermanagement->payment == 1) ? 'checked':''}}>
                                                <label for="mode1" > <font color="#FF0000">*&nbsp;</font>Mode of Payment 
                                                    </label>

                                            </div>

                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="driver1" name="driver" value="1" {{($Usermanagement->driver == 1) ? 'checked':''}}>
                                                <label for="driver1" > <font color="#FF0000">*&nbsp;</font>Driver 
                                                    </label>

                                            </div>

                                            
                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="customer1" name="customer" value="1" {{($Usermanagement->customer == 1) ? 'checked':''}}>
                                                <label for="customer1" > <font color="#FF0000">*&nbsp;</font>Customer 
                                                    </label>

                                            </div>
                                       </div>
                                       <div class="col-md-12">
                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="account1" name="account" value="1" {{($Usermanagement->account == 1) ? 'checked':''}}>
                                                <label for="account1" > <font color="#FF0000">*&nbsp;</font>Account 
                                                    </label>

                                            </div>

                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="contact1" name="contact_us" value="1" {{($Usermanagement->contact_us == 1) ? 'checked':''}}>
                                                <label for="contact1" > <font color="#FF0000">*&nbsp;</font>Contact Us 
                                                    </label>

                                            </div>

                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="user1" name="timeslot" value="1" {{($Usermanagement->timeslot == 1) ? 'checked':''}}>
                                                <label for="user1" > <font color="#FF0000">*&nbsp;</font>Timeslot 
                                                    </label>

                                            </div>

                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="user1" name="timetable" value="1" {{($Usermanagement->timetable == 1) ? 'checked':''}}>
                                                <label for="user1" > <font color="#FF0000">*&nbsp;</font>Timetable 
                                                    </label>

                                            </div>

                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="user1" name="notes" value="1" {{($Usermanagement->notes == 1) ? 'checked':''}}>
                                                <label for="user1" > <font color="#FF0000">*&nbsp;</font>Notes 
                                                    </label>

                                            </div>

                                            <div class="col-md-2" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="usermanegment1" name="usermanegment" value="1" {{($Usermanagement->usermanegment == 1) ? 'checked':''}}>
                                                <label for="usermanegment1" >  <font color="#FF0000">*&nbsp;</font>User-Manegement 
                                                    </label>

                                            </div>

                                            <div class="col-md-2" style="margin-top: 2%; ">
                                                <input type="checkbox" style="float:left" id="addemp1" name="employee" value="1" {{($Usermanagement->employee == 1) ? 'checked':''}}>
                                                <label for="addemp1" > <font color="#FF0000">*&nbsp;</font>Add-Employee 
                                                    </label>

                                            </div>

                                            <div class="col-md-1" style="margin-top: 2%; ">
                                                <input type="checkbox"  style="float:left" id="reports1" name="reports" value="1" {{($Usermanagement->reports == 1) ? 'checked':''}}>
                                                <label for="reports1">  <font color="#FF0000">*&nbsp;</font>Reports
                                                    </label>

                                            </div>
                                            
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary"
                                                style="margin-top: 13%;"> Update</button></a>
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
                            <!-- START DEFAULT DATATABLE -->
            <div class="row" id="adminList">
                <div class="col-md-12" style="margin-top:-15px;">
                    <div class="panel panel-default">
                        <h5 class="panel-title"  style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><span class="fa fa-list-alt"></span></i> &nbsp; User-Manegement</h5>
                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Name of Role</th>
                                        <th>Page Names</th>
                                        <th>Action</th>
                                   
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($All_Usermanagement as $key => $usermanagement)
                                    <tr>
                                        <td>{{$key-=-1}}</td>
                                        <td>{{$usermanagement->username}}</td>
                                        <td>{{$usermanagement->password}}</td>
                                        <td>{{$usermanagement->role_name}}</td>
                                        <td><?php 
                                        if($usermanagement->dashboard == 1)
                                         echo 'Dashboard/';
                                         if($usermanagement->city == 1)
                                         echo 'Add City/';
                                         if($usermanagement->area == 1)
                                         echo 'Add Area/';
                                         if($usermanagement->insurance == 1)
                                         echo 'Add Monthly Insurance/';
                                         if($usermanagement->subscription == 1)
                                         echo 'Add Subcription of Customer/';
                                         if($usermanagement->payment == 1)
                                         echo 'Mode of Payment/';
                                         if($usermanagement->driver == 1)
                                         echo 'Driver/';
                                         if($usermanagement->customer == 1)
                                         echo 'Customer/';
                                         if($usermanagement->account == 1)
                                         echo 'Account/';
                                         if($usermanagement->contact_us == 1)
                                         echo 'Contact Us/';
                                         if($usermanagement->timeslot == 1)
                                         echo 'Timeslot/';
                                         if($usermanagement->timetable == 1)
                                         echo 'Timetable/';
                                         if($usermanagement->notes == 1)
                                         echo 'Notes/';
                                         if($usermanagement->usermanegment == 1)
                                         echo 'Usermanegment/';
                                         if($usermanagement->employee == 1)
                                         echo 'Add Employee/';
                                         if($usermanagement->reports == 1)
                                         echo 'Reports';
                                        ?></td>
                                        
                                        <td>@if($usermanagement->role == 1)
                                            
                                            @else
                                            <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Customer"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                            <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('usermanagement.destroy', $usermanagement->id) }}">    	
                                                <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></a> 
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <p>No Record Found</p>
                                @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Name of Role</th>
                                        <th>Page Names</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->  
                        </div>
                    </div>
                    <!-- PAGE CONTENT WRAPPER -->
                </div>
                <!-- END PAGE CONTENT -->
                    
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
    $('#city_id').change(function() {
                    var city_id=$("#city_id").val();
                         //alert(city_id);
                    $.ajax({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            dataType: "json",
                            url: '{{ route('driver_management.get_area_details') }}',
                            data: {'city_id': city_id},
                            success: function(data){
                                console.log(data)
                                $("#from_area_id").empty();
                                $("#to_area_id").empty();
                                $("#sub_areas_id").empty();
                                var len = data.length;
                                console.log(len)
                                for( var i = 0; i<len; i++){
                                    var id = data[i]['id'];
                                    var area = data[i]['area'];
                                console.log(id)
                                console.log(area)
                                    
                                    $("#from_area_id").append("<option value='"+id+"'>"+area+"</option>");
                                    $("#to_area_id").append("<option value='"+id+"'>"+area+"</option>");
                                    $("#sub_areas_id").append("<option value='"+id+"'>"+area+"</option>");
                
                                }
                
                
                                
                            },
                            error:function(e){
                                console.log(e,'error');
                            }
                    });
                    
            });
</script>

@endpush

