@extends('layouts.admin')
@section('content')
<style type="text/css">
 textarea.hideThisField {
  visibility:hidden !important;
  height: 0px;
  width: 0px;
}
</style>
<!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
         <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">CMS Pages</h1>
          </div>
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('dashboard')}}">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Contact Tracing Form - Listing</li>
          </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Contact Tracing Form <i class="fa fa-angle-right"></i> Listing</h2>
              <div class="clearfix"></div>

              @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
              <div id="msgapp">
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
              </div>
              
              <div class="pull-left"> Last updated: <span class="text-blue">

              {{ date("d F Y",strtotime($lastUpdated)) }} @ {{ date("g:i A",strtotime($lastUpdated)) }}

              </span> </div>
              <div class="clearfix"></div>
              <p></p>
              
              
              
              
              <!-- End portlet-->
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Contact Tracing Form Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#" data-target="#modal-delete-selectednot" data-toggle="modal" class="deleteid" rel="{{url();}}/contacttracing/deleteselected" rev="modal-delete-selected">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>
                   
          <div class="tools"> 
                    <i class="fa fa-chevron-up"></i> 
                  </div>
                 


                  <!--Modal delete selected items start-->
                  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                        </div>
                        <div class="modal-body">
                         
                          <div class="form-actions">
                            <div class="col-md-offset-4 col-md-8"> <a href="#"  class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
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

                          {{ Form::open(array('url' => 'contacttracing/deleteall', 'method' => 'post', 'name' => 'deleteallsementra', 'id' => 'deleteallsementra', 'class' => 'form-horizontal','files' => true)) }}

                            <div class="col-md-offset-4 col-md-8"> 


                           

                            {{ Form::button(
                                                'Yes &nbsp;<i class="fa fa-check"></i>',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'type'=>'submit'))
                                            }}



                            <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                             {{ Form::close() }} 
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
                        @if($cntarray1 != 0 )
                   
                    {{ Form::open(array('url' => Request::url(),'class'=> 'form-horizontal','method' => 'get')) }}
  {{ Form::select('noperpage1', $cntarray1, Input::get('noperpage1'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
     &nbsp;
     <label class="control-label">Records per page</label>
   {{ Form::close() }}
         
        
                      
                       @endif
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
                        <th>Mobile Number</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Temperature</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                     <?php $k= $bods->getFrom();?>
                    
                    @foreach ($bods as $bod)
                      <tr>
                         <td><input type="checkbox" class="chkNumber" name="del[]" value="{{$bod->id}}"/></td>
                        <td>{{$k}}</td>
                         <td><span class="label label-sm @if($bod->status == 1) label-success @else label-danger @endif">@if($bod->status == 1) Active @else Inactive @endif</span></td>

                        
                        <td>{{ strip_tags($bod->phone) }}</td>
                        <td>{{ strip_tags($bod->name) }}</td>
                        <td>{{ date("d M, Y",strtotime($bod->created_at)) }} - {{ date("g:i A",strtotime($bod->created_at)) }}</td>
                        <td>{{ strip_tags($bod->temperature) }}</td>
                        
                        <td><a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$bod->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                            
                          <!--Modal delete bod image start-->
                          {{ Form::open(array('url' => 'deletebodimage/'.$bod->id,"method" => "post","class"=>"form-horizontal")) }}
                            <div id="modal-delete-bod-image-{{$bod->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this BOD image? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><img src='{{ asset("uploads/bods/$bod->bod_image")}}' alt="Dato' Syed Norulzama bin Syed Kamarulzaman" class="img-responsive"></p>
                                    <div class="form-actions">
                                      <div class="col-md-offset-4 col-md-8"> 

                                      {{ Form::button(
                                                'Yes &nbsp;<i class="fa fa-check"></i>',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'type'=>'submit'))
                                            }}

                                      &nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          {{ Form::close() }}
                          <!-- modal delete bod image end -->
                          
                            <!--Modal delete start-->
                            {{ Form::open(array('url' => 'deletetracing/'.$bod->id,"method" => "post","class"=>"form-horizontal")) }}
                            <div id="modal-delete-{{$bod->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this director? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#{{$k}}:</strong> {{$bod->bod_name}}</p>
                                    <div class="form-actions">
                                      <div class="col-md-offset-4 col-md-8"> 

                                       {{ Form::button(
                                                'Yes &nbsp;<i class="fa fa-check"></i>',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'type'=>'submit'))
                                            }}

                                      &nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          {{ Form::close() }}
                          <!-- modal delete end -->
                           
                        </td>
                      </tr>
                      <?php $k++; ?>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="7"></td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="tool-footer text-right">
                    <p class="pull-left">

                    Showing {{ $bods->getFrom() }} to {{ $bods->getTo() }} of {{ $bods->getTotal() }} entries</p>
                    {{ $bods->appends(array('noperpage1' => $noperpage1))->links() }}
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <!-- End porlet -->
              
              
            </div>
          </div>
        </div>
        <!--END CONTENT-->
            
            <!--BEGIN FOOTER-->
            <div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                  <div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
                </div>
            </div>
    <!--END FOOTER--></div>
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
         $('#'+idloc+'').find('.form-actions').html('<form method="POST" action="'+page+'" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input type="hidden" name="deleteid[]" value="'+chkId+'"><div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div></form>') 
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

$("#bod_add_form").validationEngine();

//delay function
$('.disod').on('keyup',function () {
    var searchValue = $(this).val();


    var bodId = $(this).attr('id');
    var orderValue = $(this).val();

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkorder')}}",
          
          data: { orderValue: orderValue , bodId:bodId},
          success: function(data){
                                      //$('.updateOrder i').removeClass('fa-spin');

             console.log(data);
             if(data=='trr')
             {
                $('#msgapp').empty();
                $('.updateOrder').attr('disabled', false);
             }else{

              $('.updateOrder').attr('disabled', true);
              var ms='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Warning!</strong><p>Order Number Already Taken</p></div>';

                                      $('#msgapp').append(ms);

             }
                                      

                                      },
          failure: function(errMsg) {
            
                }

  });

       
    },1000);
});




//delay function
$('.ddr').on('keyup',function () {

    var searchValue = $(this).val();


    var bodId = $(this).attr('id');
    var orderValue = $(this).val();

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkorder')}}",
          
          data: { orderValue: orderValue , bodId:bodId},
          success: function(data){
                                      //$('.updateOrder i').removeClass('fa-spin');

             console.log(data);
             if(data=='trr')
             {
                $('#msgupd'+bodId+'').empty();
                $('#btnedit'+bodId+'').attr('disabled', false);
             }else{

              $('#btnedit'+bodId+'').attr('disabled', true);
              var ms='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Warning!</strong><p>Order Number Already Taken</p></div>';

                                      $('#msgupd'+bodId+'').append(ms);

             }
                                      

                                      },
          failure: function(errMsg) {
            
                }

  });

       
    },1000);
});


$('#display_order').on('keyup',function () {
    
    var orderValue = $(this).val();

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkorderall')}}",
          
          data: { orderValue: orderValue },
          success: function(data){
                                      //$('.updateOrder i').removeClass('fa-spin');

             console.log(data);
             if(data=='trr')
             {
                $('#msgadd').empty();
                $('#btnadd').attr('disabled', false);
             }else{

              $('#btnadd').attr('disabled', true);
              var ms='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Warning!</strong><p>Order Number Already Taken</p></div>';

                                      $('#msgadd').append(ms);

             }
                                      

                                      },
          failure: function(errMsg) {
            
                }

  });

       
    },1000);
});












$('.updateOrder').click(function() {
    $('.updateOrder i').addClass('fa-spin');
   var Model = $('#updateOrdermname').val();
   var serData = '{';

   $('.display_order').each(function () {



    var $current = $(this);

    $('.display_order').each(function() {
        if ($(this).val() == $current.val() && $(this).attr('id') != $current.attr('id'))
        {
            alert('duplicate order number. please enter another order number.');
            throw new Error("Stopping the function!");
        }

    });
           
             serData += '"'+$(this).attr('id')+'":'+$(this).val()+',';
          });
          serData = serData.slice(0, -1);
          serData = serData+'}';
		  var jsonPost = serData;
          $.ajax({
                   type: "POST",
                   url: "{{ url('/admin/updateorder')}}",
				  // The key needs to match your method's input parameter (case-sensitive).
				  data: { OrderData: jsonPost , model:Model},
				  success: function(data){
                                      $('.updateOrder i').removeClass('fa-spin');
                                      
var ms='<div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Success!</strong><p>Updated Successfully</p></div>';

                                      $('#msgapp').append(ms);
                                      },
				  failure: function(errMsg) {
					  
                }
          });
    });


</script>


@stop
