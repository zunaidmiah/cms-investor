@extends('layouts.admin')
@section('content')

<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->

  <div class="page-header-breadcrumb">
    <div class="page-heading hidden-xs">
      <h1 class="page-title">Careers</h1>
    </div>


    <ol class="breadcrumb page-breadcrumb">
      <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('dashboard')}}">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
      <li class="active">Online Job Applicants - Listing</li>
    </ol>
    </div>
    <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->

    <div class="page-content">
      <div class="row">
        <div class="col-lg-12">
          <h2>Online Job Applicants <i class="fa fa-angle-right"></i> Listing</h2>
          <div class="clearfix"></div>
          @if (Session::has('message'))
          <div class="alert alert-success alert-dismissable">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
            <i class="fa fa-check-circle"></i> <strong>Success!</strong>
            <p>{{ Session::get('message') }}</p>
          </div>
          @endif
          @if (Session::has('error_message'))
          <div class="alert alert-danger alert-dismissable">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
            <i class="fa fa-times-circle"></i> <strong>Error!</strong>
            <p>{{ Session::get('error_message') }}</p>
          </div>
          @endif
          <div class="pull-left"> Last updated: <span class="text-blue">{{$last_updated}}</span> </div>
          <div class="clearfix"></div>
          <p></p>

          <div class="portlet">
            <div class="portlet-header">
              <div class="caption">Page Info</div>
              <br/>
              <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
              <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
            </div>
            <div class="portlet-body">
              <div contenteditable="true">
                <h1>Online Job Applicants</h1>
              </div>
            </div>
          </div>

          <div class="portlet">
            <div class="portlet-header">
              <div class="caption">Online Job Applicants Listing</div>
              <br/>
              <p class="margin-top-10px"></p>

              <div class="btn-group">
                <button type="button" onclick="app_selected_form()" class="btn btn-primary">Delete</button>
                <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="#" data-target="#modal-delete-selected-items" data-toggle="modal" class="deleteid" rel="{{URL::to('app_selected_del')}}" rev="modal-delete-selected-items">Delete selected item(s)</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                </ul>
              </div>

              <div class="tools"> <i class="fa fa-chevron-up"></i> </div>

              <!--Modal delete selected items start-->
              <div id="modal-delete-selected-items" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                      <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                    </div>
                    <div class="modal-body">
                      <!--<p><strong>#1:</strong> Position Applied: Business Development Executive <br/>
                        Applicant Name: Hock Lim
                      </p>-->
                      <div class="form-actions">
                        <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red" onclick="return document.getElementById('app_selected_form').submit()">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal delete selected items end -->
              <!--Modal delete all items start-->
              <div id="modal-delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                      <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all items? </h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-actions">
                        <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal delete all items end -->
            </div>
            <div class="portlet-body">
              <div class="form-inline pull-left">
                <div class="form-group">
                  <form id="form_id" action="{{URL::to('app_selected_pag')}}" method="post">
                    <select name="select" onchange="this.form.submit()" class="form-control">
                      <option 
                      @if(Session::get('app_paginate') == '5')
                      selected = "selected"
                      @endif
                      >5</option>
                      
                      <option
                      @if(Session::get('app_paginate') == '10')
                      selected = "selected"
                      @endif
                      >10</option>
                      
                      <option
                      @if(Session::get('app_paginate') == '15')
                      selected = "selected"
                      @endif
                      >15</option>
                      
                      <option
                      @if(Session::get('app_paginate') == '20')
                      selected = "selected"
                      @endif
                      >20</option>
                      <option
                      @if(Session::get('app_paginate') == '40')
                      selected = "selected"
                      @endif
                      >40</option>
                    </select>
                  </form>

                  &nbsp;
                  <label class="control-label">Records per page</label>
                </div>
              </div>
              <div class="clearfix"></div>
              <br/>
              <br/>
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th width="1%"><input type="checkbox" class="wholecheck"/></th>
                    <th>#</th>
                    <th>Status</th>
                    <th>Date Applied</th>
                    <th>Applicant Name</th>
                    <th>Applied For</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <form id="app_selected_form" action="{{URL::to('app_selected_del')}}" method="post">

                   @foreach ($online_Applications as $online)
                   <tr>
                    <td><input type="checkbox" class="chkNumber" name="checkbox[]" value="{{$online->id}}"/></td>
                    <td>{{$online->id}}</td>
                    <td><span class="label label-sm label-success">Active</span></td>
                    <td>{{ date("d-m-y g:ia",strtotime($online->updated_at)) }}</td>
                    <td>{{$online->name}}</td>
                    <td>
                    @if($online->career()->first())
                    {{ $online->career()->first()->jobtitle }}
                    @endif
                    </td>

                    <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-view-details-{{$online->id}}" data-toggle="modal" title="View Details"><span class="label label-sm label-yellow"><i class="fa fa-search"></i></span></a>
                      <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$online->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                    </td>
                  </tr>
                  @endforeach

                </form>
                <!--Modal view details start-->
                @foreach ($online_Applications as $online)
                <div id="modal-view-details-{{$online->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                  <div class="modal-dialog modal-wide-width">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 id="modal-login-label2" class="modal-title">View Applicant Details</h4>
                      </div>
                      <div class="modal-body">
                        <form action="#" class="form-horizontal">
                          <div class="form-body pal">
                           <h3 class="block-heading">Personal</h3>

                           <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                               <label for="inputFirstName" class="col-md-4 control-label">Name:</label>

                               <div class="col-md-8"><p class="form-control-static">{{$online->name}}</p></div>
                             </div>
                           </div>

                         </div>
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                             <label for="inputEmail" class="col-md-4 control-label">Email:</label>

                             <div class="col-md-8"><p class="form-control-static">{{$online->Email}}</p></div>
                           </div>
                         </div>
                         <div class="col-md-6">
                          <div class="form-group">
                           <label for="selGender" class="col-md-4 control-label">Contact Number:</label>

                           <div class="col-md-8"><p class="form-control-static">{{$online->ContactNumber}}</p></div>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                         <label for="inputBirthday" class="col-md-4 control-label">Date of Birth:</label>

                         <div class="col-md-8"><p class="form-control-static">{{$online->DOB}}</p></div>
                       </div>
                     </div>
                     <div class="col-md-6">
                      <div class="form-group">
                       <label for="inputPhone" class="col-md-4 control-label">Mobile Number:</label>

                       <div class="col-md-8"><p class="form-control-static">{{$online->MobileNumber}}</p></div>
                     </div>
                   </div>
                 </div>
                 <h3 class="block-heading">Address</h3>

                 <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                     <label for="inputAddress1" class="col-md-4 control-label">Address:</label>

                     <div class="col-md-8">
                       <p class="form-control-static">{{$online->Address}}</p></div>
                     </div>
                   </div>
                   <div class="col-md-6">
                    <div class="form-group">
                     <label for="inputAddress2" class="col-md-4 control-label">City:</label>

                     <div class="col-md-8"><p class="form-control-static">{{$online->City}}</p></div>
                   </div>
                 </div>
               </div>
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                   <label for="inputStates" class="col-md-4 control-label">State:</label>

                   <div class="col-md-8"><p class="form-control-static">{{$online->State}}</p></div>
                 </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                 <label for="inputCity" class="col-md-4 control-label">Post Code:</label>

                 <div class="col-md-8"><p class="form-control-static">{{$online->PostalCode}}</p></div>
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
               <label for="inputPostCode" class="col-md-4 control-label">Country:</label>

               <div class="col-md-8"><p class="form-control-static">{{$online->Country}}</p></div>
             </div>
           </div>

         </div>

         <!-- education background start -->
         <h3 class="block-heading">Education Background</h3>
         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
             <label for="inputPostCode" class="col-md-4 control-label">Education Level:</label>

             <div class="col-md-8"><p class="form-control-static">{{$online->EducationLevel}}</p></div>
           </div>
         </div>

       </div>
       <!-- end education background-->
       <!-- CV start -->
       <h3 class="block-heading">Attached CV</h3>
       <div class="row">
        <div class="col-md-6">
          <div class="form-group">
           <label for="inputPostCode" class="col-md-4 control-label">Applicant CV:</label>

           <div class="col-md-8">
             <p class="form-control-static">
              @if($online->CV)
              <a href="{{URL::to('/uploads/cv/'.$online->CV)}}" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download CV </a>
              <a href="{{URL::to('/uploads/cv/'.$online->CV)}}" target="_blank">{{$online->CV}}</a></p></div>


              @endif
              <a href="#" target="_blank"></a></p></div>
            </div>
          </div>

        </div>
        <!-- end CV-->

      </div>
      <div class="form-actions">
        <div class="col-md-offset-5 col-md-8">
         <a href="#" data-dismiss="modal" class="btn btn-green">Close &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
       </div>
     </form>
   </div>
 </div>
</div>
</div>
@endforeach
<!--END MODAL view details-->
<!--Modal delete start-->
@foreach ($online_Applications as $online)
{{ Form::open(array('url' => 'delete_application/'.$online->id,"method" => "post","files"=>true,"class"=>"form-horizontal")) }}
<div id="modal-delete-{{$online->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
        <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this applicant? </h4>
      </div>
      <div class="modal-body">
      <p><strong>#{{ $online->id }}:</strong> Position Applied: 
      @if($online->career()->first())
      {{ $online->career()->first()->jobtitle }} 
      @endif
      <br/>
          Applicant Name: {{ $online->name }}
        </p>
        <div class="form-actions">
          <div class="col-md-offset-4 col-md-8">
           {{ Form::button(
           'Yes &nbsp;<i class="fa fa-check"></i>&nbsp;',
           array(
           'class'=>'btn btn-red',
           'type'=>'submit'))
         }}
         &nbsp;<a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
{{ Form::close() }}
@endforeach
<!-- modal delete end -->
</tbody>
<tfoot>

</tfoot>
</table>
<div class="tool-footer text-right">

  <p class="pull-left">Showing {{$start}} to {{$end}} of {{$count}} entries</p>
  {{$online_Applications->links()}}
</div>
<div class="clearfix"></div>
</div>
</div>
<!-- end portlet -->
</div>
</div>
</div>

<!--END CONTENT-->

<!--BEGIN FOOTER-->
<div class="page-footer">
  <div class="copyright"><span class="text-15px">2014 &copy; <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
   <div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
 </div>
</div>
<!--END FOOTER--></div>
<!--END PAGE WRAPPER-->
@stop

@section('scripts')
<script>
  $('.deleteid').click(function () {
       var page = $(this).attr('rel');
       var idloc = $(this).attr('rev');
       if ($('.chkNumber:checked').length) {
          var chkId = '';
          $('.chkNumber:checked').each(function () {
            chkId += $(this).val() + ",";
          });
          chkId = chkId.slice(0, -1);
        //  alert(chkId);
        $('#'+idloc+'').modal('show');
         $('#'+idloc+'').find('.form-actions').html('<form method="POST" action="'+page+'" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input type="hidden" name="checkbox[]" value="'+chkId+'"><div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div></form>') 
        }
        else {
          $('#'+idloc+'').modal('show');
         $('#'+idloc+'').find('.form-actions').html('<form method="POST" action="'+page+'" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input type="hidden" name="deleteid[]" value="'+chkId+'"><div class="col-md-12"> <div class="alert alert-danger">Please select at least one item to delete.</div> </div></form>') 
         
        }
       
      
    });

$('.wholecheck').change(function () {
    if ($(this).prop('checked')) {
    $('.chkNumber').prop('checked', true);
    }
    else {
        $('.chkNumber').prop('checked', false);
    }
});
$('.wholecheck').trigger('change');
</script>
@stop