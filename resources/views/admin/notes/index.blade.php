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

                    {{-- <h5 class="panel-title"
                        style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;"
                        align="center"><i class="fa fa-users"></i> &nbsp;Add Note</h5> --}}

                    {{-- <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;"> --}}
                        {{-- <div class="form-group">



                                <form role="form" method="post" action="{{ route('notes.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-top:-10px;">


                                        <div class="col-md-3" style="margin-top:15px;">
                                            <label>Add Note English<font color="#FF0000">*</font></label>
                                            <!-- <input type="textarea" placeholder="Nominee Detail" class="form-control" required/> -->
                                            <textarea name="english_notes" class="form-control" cols="2"
                                                rows="2"></textarea>


                                        </div>


                                        <div class="col-md-3" style="margin-top:15px;">
                                            <label>Add Note Hindi<font color="#FF0000">*</font></label>
                                            <!-- <input type="textarea" placeholder="Nominee Detail" class="form-control" required/> -->
                                            <textarea name="hindi_notes" class="form-control" cols="2"
                                                rows="2"></textarea>


                                        </div>


                                    </div>

                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary"
                                            style="margin-top: 18%;">Submit </button></a>
                                    </div>
                                </div>


                            <div class="col-md-3" style="margin-top:15px;"></div>

                        </div> --}}
                        {{-- </form>
                        </div>
                        </div> --}}
                        {{-- </div>
                     
                     
                     <div>
                   <div> --}}
                        <!-- END DEFAULT DATATABLE -->
                        
                        
                        
            
                        <div class="row" id="adminList">
                            <div class="col-md-12" style="margin-top:-15px;">


                                <div class="panel panel-default">



                                    <!-- <div class="col-md-3" style="margin-top:15px;"></div> -->

                                    <div class="col-md-12" style="margin-top:15px;">
                                        <h5 class="panel-title"
                                            style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;"
                                            align="center"><i class="fa fa-users"></i> &nbsp;Added Note</h5>

                                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                            <table class="table datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.No</th>
                                                        <th>Note english</th>
                                                        <th>Note Hindi</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($All_Notes as $key => $Notes)
                                                    <tr>

                                                        <td>{{$key-=-1}}</td>                                                        
                                                        <td>{{$Notes->english_notes}}</td>
                                                        <td>{{$Notes->hindi_notes}}</td>
                                                        <td>
                                                            {{-- <a href="Javascript:void(0)" class="btn btn-outline-danger  btn-sm faIconsInList openDeleteModal" title="Delete" data-deleteMOdalText="Are you sure you want to delete this?" data-deleteUrl="{{ route('notes.destroy', $Notes->id) }}">    	
                                                                <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></a>  --}}
                                                                <a href="{{ route('notes.edit', $Notes->id) }}" class="btn btn-outline-primary btn-sm  faIconsInList" title="Edit">
                                                                    <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button></a>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <p>No Record Found</p>
                                                @endforelse
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Sr.No</th>
                                                        <th>Note english</th>
                                                        <th>Note Hindi</th>
                                                        <th>Action</th>
                                                    </tr>
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

