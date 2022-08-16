@extends('admin.layouts.layout')

@section('content')

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

            </div>
        </div>
    </div>
</div>


    <div class="col-md-12" style="margin-top:10px;">

        <div class="panel panel-default">

            <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;"
                align="center"><i class="fa fa-users"></i> &nbsp;Update Driver Management</h5>

            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
            <div class="row">
                <div class="form-group">



                    <form role="form" method="post" action="{{ route('driver_management.update', $driver_management->id) }}">
                        @csrf   
                        @method('PUT')
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top:-10px;">



                                


                                <div class="col-md-2" align="left">


                                </div>


                                <div class="col-md-10" align="left"></div>
                                <div class="col-md-12" style="margin-top:5px;">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3" style="margin-top:5px;">
                                        <label style="float:left"> Driver Name : <font color="#FF0000" id="first_name">
                                            </font></label>

                                    </div>

                                    <div class="col-md-3" style="margin-top:5px;">
                                        <label style="float:left"> Contact Number : <font color="#FF0000"
                                                id="contact_no">+</font></label>

                                    </div>
                                    <div class="col-md-3" style="margin-top:5px;">
                                        <label style="float:left"> Auto Number : <font color="#FF0000" id="auto_no">
                                            </font></label>

                                    </div>
                                    <div class="col-md-3" style="margin-top:5px;">
                                        <label style="float:left"> Address : <font color="#FF0000" id="address"></font>
                                            </label>

                                    </div>
                                    <div class="col-md-12" style="margin-top:2px;">
                                        <hr>
                                    </div>
                                    <div class="col-md-12" style="margin-top:2px;">
                                        <div class="col-md-3" style="margin-top:10px;">
                                            <label> Select City<font color="#FF0000"></font></label>
                                            <select class="form-control select" data-live-search="true" name="city_id"
                                                id="city_id" required>
                                                <option value="{{ @$driver_management->city_id }}">{{ @$driver_management->city_name }}</option>
                                                @forelse($All_Cities as $key => $all_cities) -->
                                                <option value="{{ @$all_cities->id }}">{{ @$all_cities->city }}</option>
                                                @empty
                                                <p>No Record Found</p>
                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="col-md-3" style="margin-top:10px;">
                                            <label style="float:left"> Search Driver<font color="#FF0000"></font></label>
                                            <select class="form-control select" data-live-search="true" name="driver_id"
                                                id="driver_id" required>
                                                <option value="{{ @$driver_management->driver_id }}">{{ @$driver_management->driver_first_name.' '.$driver_management->driver_last_name }}</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-3" style="margin-top:10px;">
                                            <label>Area Running From <font color="#FF0000">*</font></label>
                                            <select class="form-control select1" data-live-search="true" name="area_id"
                                                id="area_id" required>
                                                @forelse($All_Areas as $areas)
                                                <option value="{{ $areas->id }}" {{ ($driver_management->area_id == $areas->id) ? 'selected' : '' }}>
                                                    {{ $areas->area }}
                                                </option>
                                                @empty
                                                    <option >Area Running From Not Available </option>
                                                @endforelse

                                            </select>
                                        </div>
                                        <div class="col-md-3" style="margin-top:10px;">
                                            <label>Area Running To <font color="#FF0000">*</font></label>
                                            <select class="form-control select1" data-live-search="true" name="to_area_id"
                                                id="to_area_id" required>
                                                @forelse($All_Areas as $areas)
                                                <option value="{{ $areas->id }}" {{ ($driver_management->to_area_id == $areas->id) ? 'selected' : '' }}>
                                                    {{ $areas->area }}
                                                </option>
                                                @empty
                                                    <option >Area Running To Not Available </option>
                                                @endforelse
                                            </select>
                                        </div>
@php
$substops=explode(',',$driver_management->subStop_id);
@endphp
                                        <div class="col-md-3" style="margin-top:10px;">
                                            <label>Select Substops <font color="#FF0000">*</font></label>
                                                <select id="person_select" name="substops[]" class="form-control select" multiple="multiple" required="">
                                                @foreach($All_Areas as $areas)
                                                <option value="{{ $areas->id }}" {{ (in_array($areas->id,$substops) == $areas->id) ? 'selected' : '' }}>
                                                    {{ $areas->area }}
                                                </option>
                                                @endforeach
<option></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3" style="margin-top:10px;">
                                            <label>Amount Per/Km <font color="#FF0000">*</font></label>
                                            <input type="text" value="{{$driver_management->amount_per_km}}" name="amount_per_km" placeholder="Enter Amount "
                                                class="form-control" required input />
                                        </div>
                                        
                                        <div class="col-md-3" style="margin-top:10px;">
                                            <label> Select Mode of Payment<font color="#FF0000"></font></label>
                                            <select class="form-control select" data-live-search="true"
                                                name="mode_of_payment_id" id="" required>
                                                <option value="{{ @$driver_management->mode_of_payment_id }}">{{ @$driver_management->mode_of_payment_name }}</option>

                                                @forelse($All_Payments_Mode as $key => $all_payments_mode) -->
                                                <option value="{{ @$all_payments_mode->id }}">
                                                    {{ @$all_payments_mode->mode_of_payment }}</option>
                                                @empty
                                                <p>No Record Found</p>
                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="col-md-2" align="left">

                                            <div class="input-group" style="margin-top:2vh">

                                                <button type="submit" class="btn btn-primary"></span> Update </button>
                                            </div>
                                        </div>
                                    </div>
                    </form>
                </div>
            </div>
            <div class="row" id="adminList">
                       



                                    <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->

                                    <div class="col-md-12" style="margin-top:15px;">
                                        <h5 class="panel-title"
                                            style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;"
                                            align="center"><i class="fa fa-users"></i> Driver Management List</h5>

                                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                            <table class="table datatable">
                                                <thead>
                                                    <tr>

                                                        <th>Sr.No</th>
                                                        <th>Name</th>
                                                        <th>City</th>
                                                        <th>Amount Per/Km</th>
                                                        <th>Area Running From</th>
                                                        <th>Area Running To</th>
                                                        <th>Mode of Payment</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($All_Driver_Management as $key => $all_driver_management)
                                                    <tr>
                                                        <td>{{$key-=-1}}</td>
                                                        <td>{{ $all_driver_management->driver_first_name.' '.$all_driver_management->driver_last_name }}</td>
                                                        <td>{{ $all_driver_management->city_name }}</td>
                                                        <td>{{ $all_driver_management->amount_per_km }}</td>
														<td>
						{{!empty($all_driver_management->pickup_details) ? $all_driver_management->pickup_details->area:''}}</td>
                                                        <td>
						{{!empty($all_driver_management->drop_details) ? $all_driver_management->drop_details->area:''}}
														</td>
                                                        <td>{{ $all_driver_management->mode_of_payment_name }}</td>
                                                        <td>
                                                            <a href="{{ route('driver_management.edit', $all_driver_management->id) }}" class="btn btn-outline-primary btn-sm  faIconsInList" title="Edit">
                                                            <button
                                                                style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                                data-placement="top" title="Edit "><i class="fa fa-edit"
                                                                    style="margin-left:5px;"></i></button>
                                                            </a>
                                                            <button
                                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                                data-placement="top" title="Delete "><i
                                                                    class="fa fa-trash-o"
                                                                    style="margin-left:5px;"></i></button>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <p>No Record Found</p>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                           
            </div>
        </div>


        <div>
            <div>

            </div>


        </div>



    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

                    <a class="btn btn-primary" data-toggle="modal" data-target="#deleteModal" href="Javascript:void(0)"
                        onclick="event.preventDefault();
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
    
            $('#driver_id').change(function() {
            var driver_id=$("#driver_id").val();
            // alert(driver_id);
         $.ajax({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                  type: "POST",
                  dataType: "json",
                  url: '{{ route('driver_management.get_driver_details') }}',
                  data: {'driver_id': driver_id},
                  success: function(data){
                    console.log(data)
                    $("#first_name").empty();
                    $("#contact_no").empty();
                    $("#auto_no").empty();
                    $("#address").empty();
                    $("#first_name").append(data.first_name+' '+data.last_name);
                    $("#contact_no").append(data.contact_no);
                    $("#auto_no").append(data.auto_no);
                    $("#address").append(data.address);
                    
                  },
                error:function(e){
                    console.log(e,'error');
                }
              });
                    });
    
                $('#city_id').change(function() {
                    var city_id=$("#city_id").val();
                            // alert(driver_id);
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
                                $("#area_id").empty();
                                $("#to_area_id").empty();
                                $("#person_select").empty();
                                    $("#person_select").selectpicker('refresh');
                                var len = data.length;
                                console.log(len)
                                for( var i = 0; i<len; i++){
                                    var id = data[i]['id'];
                                    var area = data[i]['area'];
                                console.log(id)
                                console.log(area)
                                    
                                    $("#area_id").append("<option value='"+id+"'>"+area+"</option>");
                                    $("#to_area_id").append("<option value='"+id+"'>"+area+"</option>");
                                    $("#person_select").append("<option value='"+id+"'>"+area+"</option>");
                                    $("#person_select").selectpicker('refresh');
                
                                }
                
                
                                
                            },
                            error:function(e){
                                console.log(e,'error');
                            }
                    });
                });
        });
    </script>

    @endpush