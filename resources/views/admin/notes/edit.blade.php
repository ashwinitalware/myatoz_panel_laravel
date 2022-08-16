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

                    <h5 class="panel-title"
                        style="color:#FFFFFF; background-color:#8b1212; width:100%; font-size:14px;"
                        align="center"><i class="fa fa-users"></i> &nbsp;Update Note</h5>

                    <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                        <div class="form-group">



                            <form role="form" method="post" action="{{ route('notes.update', $notes->id) }}" enctype="multipart/form-data">
                                @csrf   
                                @method('PUT') 
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-top:-10px;">


                                        <div class="col-md-3" style="margin-top:15px;">
                                            <label>Add Note English<font color="#FF0000">*</font></label>
                                            <!-- <input type="textarea" placeholder="Nominee Detail" class="form-control" required/> -->
                                            <textarea name="english_notes" class="form-control" cols="2"
                                                rows="2">{{ @$notes->english_notes }}</textarea>


                                        </div>


                                        <div class="col-md-3" style="margin-top:15px;">
                                            <label>Add Note Hindi<font color="#FF0000">*</font></label>
                                            <!-- <input type="textarea" placeholder="Nominee Detail" class="form-control" required/> -->
                                            <textarea name="hindi_notes" class="form-control" cols="2"
                                                rows="2">{{ @$notes->hindi_notes }}</textarea>


                                        </div>


                                    </div>

                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary"
                                            style="margin-top: 18%;">Update </button></a>
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

