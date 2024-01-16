@extends('layouts.admin')
@section('title', 'Pop Up')
@section('styles')
    <link href="https://unpkg.com/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
    <style>
        .footer-position{
            position: absolute !important;
            bottom: 0 !important;
            height: 62px !important;
        }
    </style>
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <div id="page-wrapper" style="min-height: 100vh"><!--BEGIN PAGE HEADER & BREADCRUMB-->

        <div class="page-header-breadcrumb">
            <div class="page-heading hidden-xs">
                <h1 class="page-title">Index Pop Up</h1>
            </div>
            <ol class="breadcrumb page-breadcrumb">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('web88cms/dashboard') }}">Dashboard</a>&nbsp<i
                            class="fa fa-angle-right"></i>&nbsp;
                </li>
                <li>Global Setup <i class="fa fa-angle-right"></i>&nbsp;
                </li>
                <li class="active">Index Pop Up - Listing</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Index Pop Up - Listing </h2>
                    <div class="clearfix" id="flash_message"></div>
                    <p>
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" data-dismiss="alert" aria-hidden="true"
                                    onClick="$('.form-horizontal').trigger('reset');" class="close">&times;
                            </button>
                            <i class="fa fa-check-circle"></i>
                            <strong>Success!</strong> {{ Session::get('flash_message') }}
                        </div>
                        @endif
                        </p>

                    <!-- {{ $error = Session::get('error') }}
                        {{ Session::get('error') }}-->
                        @if($error)
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" data-dismiss="alert" aria-hidden="true"
                                        onClick="$('.form-horizontal').trigger('reset');" class="close">&times;
                                </button>
                                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                                <p>{{ $error }}</p>
                            </div>
                        @endif

                        <div class="clearfix"></div>
                        <p></p>
                        <div class="clearfix"></div>
                        <div class="portlet">
                            <div class="portlet-header">
                                <div class="caption">PopUp</div>
                                <br/>
                                <p class="margin-top-10px"></p>

                                <!-- <a href="#" data-target="#modal-add-popup" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp; -->


                                <div class="row">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($pop) > 0)
                                        @foreach($pop as $p)
                                            <tr>
                                                <td>{{$p->id}}</td>
                                                <td><img src="{{asset('images/'.$p->image)}}" width="100" alt=""></td>
                                                <td>{{$p->title}}</td>
                                                <td>
                                                    @if($p->status)
                                                        <span class="label label-sm label-success">Active</span>
                                                    @else
                                                        <span class="label label-sm label-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-popup" popuptitle="{{$p->title}}" popupstatus="{{$p->status}}"
                                                       data-target="#modal-edit-popup" data-toggle="modal" title=""
                                                       data-original-title="Edit"><span
                                                                class="label label-sm label-success"><i
                                                                    class="fa fa-pencil"></i></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                         <td colspan="5">No record found</td> 
                                        </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div id="modal-edit-popup" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-login-label" aria-hidden="false" class="modal fade in">
                                    <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">×
                                                </button>
                                                <h4 id="modal-login-label3" class="modal-title">Edit Popup Image</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form">
                                                    <form id="popUpForm" class="form-horizontal" method="post"
                                                          action="{{ url('savePopUp') }}"
                                                          enctype="multipart/form-data">

                                                        <input type="hidden" name="_token"
                                                               value="<?php echo csrf_token(); ?>">

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Status</label>
                                                            <div class="col-md-6">
                                                                <input type="checkbox" data-on="Active" data-off="deactive"
                                                                  <?php if(count($pop)>0 && $pop[0]->status=='1') { ?>
                                                                    checked
                                                                  <?php } ?>
                                                                  data-toggle="toggle" name="status" data-onstyle="success" data-width="100"  data-offstyle="danger" id="status">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Title <span
                                                                        class="require">*</span></label>
                                                            <div class="col-md-6">
                                                                <input id="title" type="text" class="form-control"
                                                                       value="@if(count($pop) > 0) {{$pop[0]->title}}@endif" name="title">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Upload Pop Up
                                                                Image <span class="require">*</span></label>
                                                            <div class="col-md-9">
                                                                <div class="text-15px margin-top-10px"><img
                                                                            src="@if(count($pop) > 0) {{asset('images/'.$p->image)}}@endif"
                                                                            class="img-responsive"><br>
                                                                    <input id="exampleInputFile2" type="file"
                                                                           name="image">
                                                                    <br>
                                                                    {{--<span class="help-block">(JPEG/GIF/PNG only, Max. 1MB) </span> </div>--}}
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="model" value="popup">
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-5 col-md-8">
                                                                    <button class="btn btn-red">Save &nbsp;<i
                                                                                class="fa fa-floppy-o"></i></button>&nbsp;
                                                                    <a href="#" data-dismiss="modal"
                                                                       class="btn btn-green">Cancel &nbsp;<i
                                                                                class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="modal-add-popup" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-login-label" aria-hidden="false" class="modal fade in">
                                    <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">×
                                                </button>
                                                <h4 id="modal-login-label3" class="modal-title">Add Popup Image</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form">
                                                    <form id="popUpForm" class="form-horizontal" method="post"
                                                          action="{{ url('/IndexPopUp') }}"
                                                          enctype="multipart/form-data">
                                                        <input type="hidden" name="_token"
                                                               value="<?php echo csrf_token(); ?>">

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Status</label>
                                                            <div class="col-md-6">
                                                                <input type="checkbox" data-on="Active" data-off="deactive" data-toggle="toggle" name="status" data-onstyle="success" data-width="100"  data-offstyle="danger">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Title <span
                                                                        class="require">*</span></label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       value="" name="title">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Upload Pop Up
                                                                Image <span class="require">*</span></label>
                                                            <div class="col-md-9">
                                                                <div class="text-15px margin-top-10px"><img
                                                                            src=""
                                                                            class="img-responsive"><br>
                                                                    <input id="exampleInputFile2" type="file"
                                                                           name="image">
                                                                    <br>
                                                                    {{--<span class="help-block">(JPEG/GIF/PNG only, Max. 1MB) </span> </div>--}}
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="model" value="popup">
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-5 col-md-8">
                                                                    <button class="btn btn-red">Save &nbsp;<i
                                                                                class="fa fa-floppy-o"></i></button>&nbsp;
                                                                    <a href="#" data-dismiss="modal"
                                                                       class="btn btn-green">Cancel &nbsp;<i
                                                                                class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
        </div>
        <!--BEGIN FOOTER-->
        <div class="page-footer footer-position">
            <div class="copyright"><span class="text-15px">2019 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a
                            href="mailto:support@webqom.com">Webqom Support</a>.</span>
                <div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}"
                                             alt="Webqom Technologies Sdn Bhd"></div>
            </div>
        </div>
        <!--END FOOTER-->

    </div>

            <!--END PAGE WRAPPER
        </div>
    </div> -->

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <script src="https://unpkg.com/bootstrap-switch"></script>
@endsection
