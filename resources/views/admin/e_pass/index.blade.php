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
                     <form role="form" method="post" action="{{ route('e_pass.store') }}" >
                        @csrf 
                            <div class="panel panel-default">
                        
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Create E-Pass</h5>
                                   
                                <div class="panel-body">
                                    <div class="form-group">
                              
                                        <div class="col-md-12">
                                            <div class="form-group">   
                                                          
                                             <div class="col-md-4"></div>
                                             <div class="col-md-3">
                                                <label style="float:left"> Search Customer<font color="#FF0000"></font></label>
                                                <select class="form-control select" data-live-search="true" name="customer_id" id="customer_id" required>
                                                        <option required>Select</option>
                                                        @forelse($All_Customers  as $key => $all_customers) -->
                                                        <option value="{{ @$all_customers->id }}">{{ @$all_customers->first_name.' '.$all_customers->last_name }}</option>
                                                        @empty
                                                        <p>No Record Found</p>
                                                        @endforelse
                                                    </select>
                                                </div> 
                                                

                                               <div class="col-md-10" align="left"></div>    
                                            </div>
                                           <div class="col-md-12" style="margin-top:5px;"><hr></div> 

                                            <div class="col-md-12" >
                                          <div class="col-md-3" style="margin-top:5px;">
                                                <label style="float:left"> Customer Name : <font color="#FF0000" id="full_name"></font></label>
                                                 
                                                </div>
                                                
                                                <div class="col-md-3" style="margin-top:5px;">
                                                <label style="float:left"> Contact Number : <font color="#FF0000" id="contact_no"></font></label>
                                                 
                                                </div> 
                                                <div class="col-md-3" style="margin-top:5px;">
                                                <label style="float:left"> Aadhar Number : <font color="#FF0000" id="aadhar_number"></font></label>
                                                 
                                                </div>
                                                <div class="col-md-3" style="margin-top:5px;">
                                                <label style="float:left"> Address : <font color="#FF0000" id="address"></font></label>
                                                 
                                                </div>

                                                </div>  
                                    
                                            <div class="col-md-12" style="margin-top:5px;"><hr></div> 

                                                <div class="col-md-3" >
                                                    <label> Select City<font color="#FF0000"></font></label>
                                                    <select class="form-control select" data-live-search="true" name="city_id" id="city_id" required>
                                                        <option required>Select</option>
                                                        @forelse($All_Cities  as $key => $all_cities) -->
                                                        <option value="{{ @$all_cities->id }}">{{ @$all_cities->city }}</option>
                                                        @empty
                                                        <p>No Record Found</p>
                                                        @endforelse
                                                    </select>
                                                </div> 
                                                <div class="col-md-3" >
                                                <label> Select Booking Date</label>
                                                    <input type="date" id="dp-3" name="booking_date" class="form-control " value="{{date('Y-m-d')}}" required/>
                                                </div>
                                                <div class="col-md-3" >
                                                    <label>Select Subscription Package<font color="#FF0000"></font></label>
                                                    <select class="form-control select1" data-live-search="true" name="subscription_id" id="subscription_id" required>
                                                        <option value="">Select</option>
                                                        
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-3" >
                                                    <label>Duration <font color="#FF0000"></font></label>
                                                    <input type="text" placeholder=" " name="duration" id="duration" class="form-control" required readonly input/>
                                                </div>
                                                <div class="col-md-3" style="margin-top:20px">
                                                    <label>Monthly Insurance <font color="#FF0000"></font></label>
                                                    <label for="male">No</label>
                                                    <input type="radio" name="monthly_insurance_taken" id="No" value="No" data-id="myRadioGroupYes" checked>
                                                    <label for="female">Yes</label>
                                                    <input type="radio" name="monthly_insurance_taken" id="Yes" value="Yes" data-id="myRadioGroupNo">
                                                </div>
                                                <div id="myRadioGroupNo" class="none"></div>
                                                <div id="myRadioGroupYes" class="none">
                                                    <div class="col-md-3">
                                                        <label>Monthly Insurance Amount<font color="#FF0000"></font></label>
                                                        <input type="hidden" name="monthly_insurance_id" value="{{ @$All_Insurance->id }}" id="monthly_insurance_id" placeholder="" class="form-control" required input/>
                                                        <input type="text" name="monthly_insurance_amount" value="{{ @$All_Insurance->monthly_insurance }}" id="monthly_insurance_value" placeholder="" class="form-control" required readonly input/>
                                                        
                                                    </div> 
                                                    <div class="col-md-3" style="margin-top:10px">
                                                        <label> Nominee Name <font color="#FF0000"></font></label>
                                                        <input type="text" name="name" id="name" placeholder="" class="form-control"  input/>
                                                    </div>
                                                    <div class="col-md-3" style="margin-top:10px">
                                                        <label> Nominee Address <font color="#FF0000"></font></label>
                                                        <input type="text" name="address" id="address" placeholder="" class="form-control"  input/>
                                                    </div>
                                                    <div class="col-md-3" style="margin-top:10px">
                                                        <label> Nominee Mobile Number <font color="#FF0000"></font></label>
                                                        <input type="number" name="mobile_number" id="mobile_number" placeholder="" class="form-control"  input/>
                                                    </div>
                                                    <div class="col-md-3" style="margin-top:10px">
                                                        <label> Nominee Relation with Customer <font color="#FF0000"></font></label>
                                                        <input type="text" name="relation_with_customer" id="relation_with_customer" placeholder="" class="form-control"  input/>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-3"  style="margin-top:10px">
                                                    <label> From Date</label>
                                                            <input type="date" id="from_date" name="from_date" class="form-control " value="{{date('Y-m-d')}}"  required/>
                                                </div>
                                                <div class="col-md-3"  style="margin-top:10px">
                                                    <label> To Date</label>
                                                            <input type="date" id="to_date" name="to_date" class="form-control " value="{{date('Y-m-d')}}" required/>
                                                </div>
                                                 
                                                  
                                                <div class="col-md-3" style="margin-top:10px">
                                                    <label>E-Pass No. <font color="#FF0000"></font></label>
                                                    <input type="text" name="e_pass_no" placeholder=" " value="{{$e_pass_no}}" class="form-control" required input readonly/>
                                                </div> 
                                                <div class="col-md-3" style="margin-top:10px">
                                                    <label> Amount To Be Paid <font color="#FF0000"></font></label>
                                                    <input type="text" name="amount_to_be_paid" id="amount_to_be_paid" placeholder="" class="form-control" required input/>
                                                </div> 
                                                  <div class="col-md-3" style="margin-top:10px">
                                                    <label> Select Mode of Payment<font color="#FF0000"></font></label>
                                                    <select class="form-control select" data-live-search="true" name="mode_of_payment_id" id="mode_of_payment_id" required>
                                                        <option required>Select</option>
                                                        @forelse($All_Payments_Mode  as $key => $all_payments_Mmde) -->
                                                        <option value="{{ @$all_payments_Mmde->id }}">{{ @$all_payments_Mmde->mode_of_payment }}</option>
                                                        @empty
                                                        <p>No Record Found</p>
                                                        @endforelse
                                                    </select>
                                                </div> 
                                            </div>
                                       
                                            <div class="col-md-9"  align="right" style="margin-top:5vh;">
          
                                                    <div class="input-group" >
                                                       
                                                    	<button type="submit" class="btn btn-primary"><i class="fa fa-ticket" aria-hidden="true"></i>Generate E-Pass </button>
                                                    </div>
                                               
                                                
                                                 
                                            </div> 
                                        
                                        </div>
                                    
                                    </div>
                                
                                </div>
                              </form> 
                        
                              </div>
                            </div>
                     
                         
                         <div>
                       <div>
                            <!-- END DEFAULT DATATABLE -->
                            
                            
                            
                
                    <div class="row" id="adminList">
                        <div class="col-md-12" style="margin-top:-15px;">

                          
                            <div class="panel panel-default" style="overflow-x:scroll;">
                                
                                
                                	
                                <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                
                                <div class="col-md-12" style="margin-top:15px;">
                                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> Registered E-Pass</h5>
                                   
                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                
                                                <th>Sr.no</th>
                                                <th>Name (Mob No)</th>
                                                <th>City</th>
                                                <th>Booking Date</th>
                                                <th>Monthly Insurance Rs.</th>
                                                <th>Subscription Type</th>
                                                <th>Duration</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>E-Pass No</th>
                                                <th>Paid Amount</th>
                                                <th>Mode of Payment</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($All_E_Pass as $key => $all_e_pass)
                                             <tr>
                                                <td>{{$key-=-1}}</td>
                                                <td>{{ $all_e_pass->customer_first_name.' '.$all_e_pass->customer_last_name }} ( {{$all_e_pass->customer_contact_no}} )</td>
                                                <td>{{ $all_e_pass->city_name }}</td>
                                                <td>{{ $all_e_pass->booking_date }}</td>
                                                <td>{{ $all_e_pass->monthly_insurance_amount }}</td>
                                                <td>{{ $all_e_pass->subscription_name }}</td>
                                                <td>{{ $all_e_pass->duration }}</td>
                                                <td>{{ $all_e_pass->from_date }}</td>
                                                <td>{{ $all_e_pass->to_date }}</td>
                                                <td>{{ $all_e_pass->e_pass_no }}</td>
                                                <td>{{ $all_e_pass->amount_to_be_paid }}</td>
                                                <td>{{ $all_e_pass->mode_of_payment_name }}</td>
                                                <td>{{ $all_e_pass->status }}</td>
                                                <td>
                                                	<a href="{{ route('e_pass.edit', $all_e_pass->id) }}" class="btn btn-outline-primary btn-sm  faIconsInList" title="Edit">
                                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button></a>              
                                                        <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('e_pass.destroy', $all_e_pass->id) }}"><button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>                                              
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

    $('#customer_id').change(function() {
        var customer_id=$("#customer_id").val();
        // alert(driver_id);
        $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              type: "POST",
              dataType: "json",
              url: '{{ route('e_pass.get_customer_details') }}',
              data: {'customer_id': customer_id},
              success: function(data){
                console.log(data)
                $("#full_name").empty();
                $("#aadhar_number").empty();
                $("#contact_no").empty();
                $("#address").empty();
                $("#full_name").append(data.first_name+' '+data.last_name);
                $("#aadhar_number").append(data.aadhar_number);
                $("#contact_no").append(data.contact_no);
                $("#address").append(data.address);
                
              },
            error:function(e){
                console.log(e,'error');
            }
             });
    });

    $('#subscription_id').change(function() {
        var subscription_id=$("#subscription_id").val();
        var monthly_insurance_taken = $('input[type=radio][name=monthly_insurance_taken]').val();
         //alert(monthly_insurance_taken);
        $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              type: "get",
              dataType: "json",
              url: '{{ route('e_pass.get_subscription_detail') }}',
              data: {'subscription_id': subscription_id},
              success: function(data){
                console.log(data)
                $("#duration").empty();
                $("#duration").val(data.duration);
                let total = (parseFloat(data.amount)).toFixed(2);
                $("#amount_to_be_paid").val(total);

                var from_date = new Date($('#from_date').val());
                var days=parseInt(data.duration, 10);
                from_date.setDate(from_date.getDate() + days);

                $("#to_date").val(from_date.toInputFormat());

                
              },
            error:function(e){
                console.log(e,'error');
            }
             });
    });

    Date.prototype.toInputFormat = function() {
       var yyyy = this.getFullYear().toString();
       var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
       var dd  = this.getDate().toString();
       return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
    };

                $('#city_id').change(function() {
        var city_id=$("#city_id").val();
        // alert(driver_id);
     $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              type: "get",
              dataType: "json",
              url: '{{ route('e_pass.get_subscriptions') }}',
              data: {'city_id': city_id},
              success: function(data){
                console.log(data)
                $("#amount_to_be_paid").val(0);
                $("#subscription_id").empty();
                $("#subscription_id").append("<option value=''>Select</option>");
                var len = data.length;
                console.log(len)
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var subscription_type = data[i]['subscription_type'];
                console.log(id)
                    
                    $("#subscription_id").append("<option value='"+id+"'>"+subscription_type+"</option>");

                }


                
              },
            error:function(e){
                console.log(e,'error');
            }
          });
                });

            $(':radio').change(function (event) {
                var id = $(this).data('id');
                $('#' + id).addClass('none').siblings().removeClass('none');
            });

            $('input[type=radio][name=monthly_insurance_taken]').on('change', function() {
                var id_value = $(this).attr('id');
                var amount_to_be_paid = $("#amount_to_be_paid").val();
                if (id_value == 'Yes') {
                let mi = $("#monthly_insurance_value").val();
                let total = (parseFloat(amount_to_be_paid) + parseFloat(mi)).toFixed(2);
                $("#amount_to_be_paid").val(total);

                }
                else if (id_value == 'No') {
                    let mi = $("#monthly_insurance_value").val();
                    let total = (parseFloat(amount_to_be_paid) - parseFloat(mi)).toFixed(2);
                    $("#amount_to_be_paid").val(total);
                    
                }
            });
    });
</script>

@endpush
