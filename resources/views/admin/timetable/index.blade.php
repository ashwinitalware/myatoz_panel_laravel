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
                        <h5 class="panel-title"
                            style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center">
                            <i class="fa fa-users"></i> &nbsp;Time-Table</h5>

                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                            <div class="form-group">



                                <form role="form" method="post" action="{{ route('timetable.store') }}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-10px;">


                                            <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->


                                            <div class="col-md-2" style="margin-top:15px">
                                                <label> Select City<font color="#FF0000"></font></label>
                                                <select class="form-control select" data-live-search="true" name="city_id"
                                                    id="city_id" required>
                                                    <option required>Select</option>
                                                    @forelse($All_Cities as $key => $all_cities) -->
                                                    <option value="{{ @$all_cities->id }}">{{ @$all_cities->city }}</option>
                                                    @empty
                                                    <p>No Record Found</p>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-md-2" style="margin-top:15px">
                                                <label style="float:left"> From To.<font color="#FF0000">*</font>
                                                    </label>
                                                <select class="form-control select2" data-live-search="true"
                                                    name="from_area_id" id="from_area_id">
                                                    

                                                </select>
                                            </div>

                                            <div class="col-md-2" style="margin-top:15px">
                                                <label style="float:left"> To.<font color="#FF0000">*</font>
                                                    </label>
                                                <select class="form-control select2" data-live-search="true"
                                                    name="to_area_id" id="to_area_id">
                                                   

                                                </select>
                                            </div>


                                            <div class="col-md-2" style="margin-top:15px">
                                                <label style="float:left"> Select sub stop<font color="#FF0000">*</font>
                                                    </label>
												<input type="text" name="sub_areas_id" class="form-control" required>
                                               <!-- <select class="form-control select12 " data-live-search="true"
                                                    name="sub_areas_id" id="sub_areas_id"> -->
                                                   

                                                </select>
                                            </div>
                                            
                                            <div class="col-sm-2" style="margin-top: 15px;">
                                                <div class="form-group ">
                                                    <label>Time Slot<font color="#FF0000">*</font></label>
                                                    <select id="person_select" name="timeslots_id[]" class="form-control select" multiple="multiple" required="">
                                                <option value="" disabled> Select </option>
                                                @forelse($All_Timeslot as $key => $all_timeslots) -->
                                                    <option value="{{ @$all_timeslots->timeslot }}">{{ @$all_timeslots->timeslot }}</option>
                                                    @empty
                                                    <p>No Record Found</p>
                                                    @endforelse
                                             </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2" align="center">

                                                <div class="input-group" style="margin-top:32px; margin-bottom:3px;">
                                                    <a href="#"> <button type="submit" class="btn btn-primary"> Submit
                                                        </button></a>

                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-md-2" style="margin-top:15px;"></div>

                                </form>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div>
                            <!-- END DEFAULT DATATABLE -->
                            <div class="row" id="adminList">
                                <div class="col-md-12" style="margin-top:5px;">
                                    <div class="panel panel-default">
                                        <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                        <div class="col-md-12" style="margin-top:15px;">
                                            <h5 class="panel-title"
                                                style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;"
                                                align="center"><i class="fa fa-users"></i> &nbsp;Time-Table</h5>
                                            <div class="panel-body" style="margin-top:5px; margin-bottom:5px;">
                                                <table class="table datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr.No</th>
                                                            <th>City</th>
                                                            <th>From To</th>
                                                            <th>To</th>
                                                            <th>Select sub stop</th>
                                                            <th>Select Time Slot</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($All_Timetables as $key => $timetable)
                                                        <tr>
                                                            <td>{{$key-=-1}}</td>
                                                            <td>{{$timetable->city->city}}</td>
                                                            <td>
																{{!empty($timetable->from_area)?$timetable->from_area->area:''}}
                                                            <td>
																{{!empty($timetable->to_area)?$timetable->to_area->area:''}}
                                                            <td>{{$timetable->sub_areas_id}}</td>
                                                            <td>{{$timetable->timeslots_id}}</td>
                                                            <td>
                                                                
                                                                <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('timetable.destroy', $timetable->id) }}">    	
                                                                    <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></a> 
                                                            </td>

                                                        </tr>
                                                        @empty
                                                        <p>No Record Found</p>
                                                    @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <th>Sr.No</th>
                                                        <th>City</th>
                                                        <th>From To</th>
                                                        <th>Select Stop</th>
                                                        <th>Select sub stop</th>
                                                        <th>Select Time Slot</th>
                                                        <th>Action</th>
                                                    </tfoot>
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
                                 //   $("#sub_areas_id").append("<option value='"+id+"'>"+area+"</option>");
                
                                }
                
                
                                
                            },
                            error:function(e){
                                console.log(e,'error');
                            }
                    });
                    
            });
</script>

@endpush

