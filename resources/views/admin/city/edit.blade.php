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
                        <div class="panel panel-default">
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-list-alt"></i> &nbsp;Update City</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group"> 
                                    <form role="form" method="post" action="{{ route('city.update', $cities->id) }}">
                                        @csrf   
                                        @method('PUT') 
                                        <div class="col-md-12">
                                             <div  class="col-md-4"></div>
                                            <div class="form-group" style="margin-top:-10px;">  
                                              
                                                
                                                <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Update City<font color="#FF0000">*</font></label>
                                                    <input type="text" name="city" value="{{@$cities->city}}" placeholder="Add City" class="form-control" required/>
                                                </div>


                                                <div class="col-md-2" style="margin-top:2.8rem;" align="center">
                                                    <div class="input-group" style=" margin-bottom:15px;">
                                                    <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span> 
                                                        Update</button>
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
            <div class="row">
                <div class="col-md-12" style="margin-top:-15px;">
                    <div class="panel panel-default">
                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i  class="fa fa-list-alt"></i> &nbsp; Added City</h5>
                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Add City</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($All_Cities as $key => $cities)
                                    <tr>
                                        <td>{{$key-=-1}}</td>
                                        <td>{{$cities->city}}</td>
                                        <td>{{$cities->status}}</td>
                                        <td>
                                    <a href="{{ route('city.edit', $cities->id) }}" class="btn btn-outline-primary btn-sm  faIconsInList" title="View">    
                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit ">
                                        <i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    </a>
                                        <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></td>
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