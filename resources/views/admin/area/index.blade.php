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
                    
                <div class="row">
                    <div class="col-md-12" style="margin-top:-15px;">
                        <!-- START DEFAULT TABLE -->
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
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-list-alt"></i> &nbsp;Add Area</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                
                                <div class="form-group"> 
                                    <form role="form" method="post" action="{{ route('area.store') }}">
                                    @csrf    
                                    <div class="col-md-12">
                                             <div  class="col-md-4"></div>
                                            <div class="form-group" style="margin-top:-10px;">  
                                               
                                                <div class="col-md-2" style="margin-top:15px">
                                                          <label style="float:left"> Select City<font color="#FF0000">*</font></label>
                                                    <select class="form-control select" data-live-search="true" name="city_id">
                                                        <option required>Select</option>
                                                        @forelse($All_Cities  as $key => $cities) -->
                                                        <option value="{{ @$cities->id }}">{{ @$cities->city }}</option>
                                                        @empty
                                                        <p>No Record Found</p>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Add Area<font color="#FF0000">*</font></label>
                                                    <input type="text" name="area" placeholder="Add Area" class="form-control" required/>
                                                </div>


                                                <div class="col-md-2" style="margin-top:2.8rem;" align="center">
                                                    <div class="input-group" style=" margin-bottom:15px;">
                                                    <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span> 
                                                        Add</button>
                                                    </div>
                                                </div>    
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <div>
            <div>
            <!-- END DEFAULT TABLE -->

            <!-- START DEFAULT DATATABLE -->
            <div class="row" id="adminList">
                <div class="col-md-12" style="margin-top:-15px;">
                    <div class="panel panel-default">
                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i  class="fa fa-list-alt"></i> &nbsp; Added Area</h5>
                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>City</th>
                                        <th>Added Area</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($All_Areas as $key => $areas)
                                    <tr>
                                        <td>{{$key-=-1}}</td>
                                        <td>{{$areas->city_name}}</td>
                                        <td>{{$areas->area}}</td>
                                        <td>{{ucfirst($areas->status)}}</td>
                                        <td>
                                            <a href="{{ route('area.edit', $areas->id) }}" class="btn btn-outline-primary btn-sm  faIconsInList" title="View">
                                          <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button></a>
                                            <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('area.destroy', $areas->id) }}">
                                            <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;">
                                            </i></button></a></td>
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
            <!-- END DEFAULT DATATABLE -->          
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
