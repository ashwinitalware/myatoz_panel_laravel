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
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-book"></i> &nbsp;Day Wise Reports</h5>
                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                <div class="form-group"> 
                                    <form role="form">
                                        <div class="col-md-12">
                                             <div  class="col-md-3"></div>
                                            <div class="form-group" style="margin-top:-10px;">  
                                                
                                                <div class="col-md-2" align="left" style="margin-top:10px;">
                                                     <div class="input-group">
                                                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                                    </div>
                                                
                                                    <label>From Date</label>
                                                    <div class="input-group">
                                                        <input type="text" id="dp-3" class="form-control " value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div> 
                                                 <div class="col-md-2" align="left" style="margin-top:10px;">
                                                     <div class="input-group">
                                                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                                    </div>
                                                
                                                    <label>To Date</label>
                                                    <div class="input-group">
                                                        <input type="text" id="dp-3" class="form-control " value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div> 

                                                <div class="col-md-2" style="margin-top:3.1rem;" align="center">
                                                    <div class="input-group" style="margin-top:-10px; margin-bottom:15px;">
                                                    <button type="button" class="btn btn-primary"><!-- <span class="fa fa-user"></span>  -->
                                                        Submit</button>
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
                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;" align="center"><i class="fa fa-book"></i> &nbsp; Reports</h5>
                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                        <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></td>
                                    </tr>
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
