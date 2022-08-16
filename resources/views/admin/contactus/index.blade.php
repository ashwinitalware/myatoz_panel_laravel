@extends('admin.layouts.layout')
                
@section('content')  
               <!-- PAGE CONTENT WRAPPER -->
               <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                           <div class="panel-body">
                               
                                        {{-- <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                                         <a href="modepayment.html"><button type="button" class="btn active" style="background-color:#db464d; color:#FFFFFF"></i>Contact Us</button></a>
                                         </div>            --}}
                                  
                            </div>
                        </div>
                    </div>
                </div>
            
              <div class="row">
                    <div class="col-md-12" style="margin-top:-15px;">
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
                        <div class="panel panel-default">
                            
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> &nbsp;Contact Us</h5>
                               
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group"> 
                                
                                    
                                
                                    <form role="form" method="post" action="{{ route('contactus.store') }}" enctype="multipart/form-data">
                                        @csrf
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-10px;">   
                                                      
                                         
                                          <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->
                                           <div class="col-md-2" style="margin-top:15px;">
                                                <label> Name<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Name" name="name" class="form-control" required input/>
                                            </div> 

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Contact No.<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Contact no." name="contact_no" class="form-control" required input/>
                                            </div> 
                                            
                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>E-mail Id<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="E-mail Id Id" name="email_id" class="form-control" required input/>
                                            </div>

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Address<font color="#FF0000">*</font></label>
                                                <input type="text" placeholder="Address" name="address" class="form-control" required input/>
                                            </div>
                                            <!-- <div class="col-md-2" style="margin-top:15px;">

                                            <label>Date</label>
                                            <div class="input-group">
                                                <input type="text" id="dp-3" class="form-control " value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"input/>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                            </div> -->


                                      </div>
                                            
                                      <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary"
                                     style="margin-top: 18%;">Submit </button></a>
                                  </div>  
                                    </div>
                                    
                                  
                                    <div class="col-md-3" style="margin-top:15px;"></div> 
                                     
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
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-users"></i> &nbsp;Contact Us</h5>
                               
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Name</th>
                                            <th>Contact No</th>
                                            <th>Email Id</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($All_Contact_Us as $key => $Contact_Us)
                                         <tr>
                                            <td>{{$key-=-1}}</td>
                                            <td>{{$Contact_Us->name}}</td>
                                            <td>{{$Contact_Us->contact_no}}</td>
                                            <td>{{$Contact_Us->email_id}}</td>
                                            <td>{{$Contact_Us->address}}</td>  
                                            <td>
                                                <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('contactus.destroy', $Contact_Us->id) }}">    	
                                                    <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></a> 
                                            </td>                                             
                                          
                                        </tr>
                                        @empty
                                    <p>No Record Found</p>
                                @endforelse
                                    </tbody>
                                    <tfoot>
                                            <th>Sr.No</th>
                                            <th>Name</th>
                                            <th>Contact No</th>
                                            <th>Email Id</th>
                                            <th>Address</th>
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

