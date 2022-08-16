@extends('admin/layouts/layout')
                
@section('content')  
                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                  <div class="row" id="adminList">
                        <div class="col-md-12">

                          
                            <div class="panel panel-default" style="overflow-x:scroll;">
                                
                                
                                    
                                <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                
                                <div class="col-md-12" style="margin-top:15px;">
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-credit-card"></i> Cancelled Rides</h5>
                                   <!-- {{$all_rides}} -->
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                
                                                <th>Sr.no</th>
                                                <th>Cust Name</th>
                                                <th>Mob No</th>
                                                <!-- <th>City</th> -->
                                                <th>Booking Date</th>
                                                <th>Booking Time</th>
                                                <th>From Area</th>
                                                <th>To Area</th>
                                                <th>Total Persons</th>
                                                <th>Driver.</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php 
                                            $i=0;
                                            @endphp
                                            @foreach($all_rides as $data)
                                            @php 
                                            $i++;
                                            @endphp
                                           <tr>
                                                <td>{{$i}}</td>
                                                <td>{{!empty($data->customer_details)?$data->customer_details->first_name.' '.$data->customer_details->middle_name.' '.$data->customer_details->last_name:''}}</td>
                                                <td>{{!empty($data->customer_details)?$data->customer_details->contact_no:''}}</td>
                                                <!-- <td>{{$data->id}}</td> -->
                                                <td>{{date('d-m-Y',strtotime($data->ride_booking_date))}}</td>
                                                <td>{{$data->ride_booking_time}}</td>
                                                <td>{{!empty($data->pickup_details)?$data->pickup_details->area:''}}</td>
                                                <td>{{!empty($data->dropoff_details)?$data->dropoff_details->area:''}}</td>
                                                <td>{{$data->ride_total_person}}</td>
                                                <td>{{!empty($data->driver_details)?$data->driver_details->first_name.' '.$data->driver_details->middle_name.' '.$data->driver_details->last_name:''}}</td>
                                           </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
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