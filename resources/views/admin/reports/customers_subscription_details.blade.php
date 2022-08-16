@extends('admin.layouts.layout')
                
@section('content')  
                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                  <div class="row" id="adminList">
                        <div class="col-md-12">

                          
                            <div class="panel panel-default" style="overflow-x:scroll;">
                                
                                
                                    
                                <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                
                                <div class="col-md-12">
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-credit-card"></i> Customer Subscription Report</h5>
                                   
                                        <div class="panel-body">
                                   
                                        <div class="col-md-2"></div>
                                    
                                   <a href="{{url('customers_subscription_details/All')}}">
                                        <div class="col-md-2">
                                    <button class="btn btn-info btn-block">ALL</button>
                                    </div>
                                   </a>
                                   <a href="{{url('customers_subscription_details/Subsription Expired')}}">
                                    <div class="col-md-2">
                                    <button class="btn btn-danger btn-block">Subsription Expired</button>
                                    </div>
                                </a>
                                    <a href="{{url('customers_subscription_details/Subsribed')}}">
                                    <div class="col-md-2">
                                    <button class="btn btn-success btn-block">Subsribed</button>
                                    </div> 
                                </a>
                                    <a href="{{url('customers_subscription_details/Not Subscribed')}}">             
                                    <div class="col-md-2">
                                    <button class="btn btn-default btn-block" style="background-color: #777;color: #fff;">Not Subscribed</button>
                                    </div>
                                </a>

                                <br>
                                <br>
                                <br>
                                    <!-- </form> -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                
                                                <th>Sr.no</th>
                                                <th>Name (Mob No)</th>
                                                <th>City</th>
                                                <th>Status</th>
                                                <!-- <th>Booking Date</th> -->
                                                <th>Monthly Insurance Rs.</th>
                                                <th>Subscription Type</th>
                                                <th>Duration</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>E-Pass No</th>
                                                <th>Paid Amount</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($customers as $key => $all_e_pass)
                                             <tr>
                                                <td>{{$key-=-1}}</td>
                                                <td>{{ $all_e_pass->first_name.' '.$all_e_pass->last_name }} ({{$all_e_pass->contact_no}})</td>
                                                <td>{{ $all_e_pass->city_name }}</td>
                                                <td> 
                                                    @if($all_e_pass->subscription_name) 
                                                        @if($all_e_pass->to_date < date('Y-m-d'))
                                                        <span class="label label-danger label-form">Subsription Expired</span>
                                                        @else                  
                                                        <span class="label label-success label-form">Subsribed</span>
                                                        @endif 
                                                    @else
                                                    <span class="label label-default label-form">Not Subscribed</span>
                                                    @endif
                                                </td>
                                                <!-- <td>{{ $all_e_pass->booking_date }}</td> -->
                                                <td>{{ $all_e_pass->monthly_insurance_amount }}</td>
                                                <td>{{ $all_e_pass->subscription_name }}</td>
                                                <td>{{ $all_e_pass->duration }}</td>
                                                <td>{{ $all_e_pass->from_date }}</td>
                                                <td>{{ $all_e_pass->to_date }}</td>
                                                <td>{{ $all_e_pass->e_pass_no }}</td>
                                                <td>{{ $all_e_pass->amount_to_be_paid }}</td>
                                                <!-- <td>
                                                    <a href="{{ route('e_pass.edit', $all_e_pass->id) }}" class="btn btn-outline-primary btn-sm  faIconsInList" title="Edit">
                                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                    </a>              
                                                    <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('e_pass.destroy', $all_e_pass->id) }}">
                                                        <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>                                            
                                                    </a>
                                                </td> -->
                                            </tr>
                                            @empty
                                            <p align="center" style="margin-top:15px;color: red;font-size: 15px;"><blink>No Record Found</blink></p>
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