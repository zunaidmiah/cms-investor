@extends('layouts.admin')
@section('content')

<!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Dashboard</h1>
          </div>
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Dashboard</a>&nbsp;</li>

          </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        
        <div class="page-content">
        	<div id="tab-shopping">
              <div class="row">
                <div class="col-lg-12">
                  <h2>Dashboard</h2>
                  <div class="clearfix"></div>
                </div>
                <!-- end col-lg-12 -->
                
                <div class="col-lg-8">
                   
                        
                        <!-- last 5 job applicants listing start -->
                        <div class="panel panel-primary">
                                    <div class="panel-heading">Last 5 Job Applicants</div>
                                    <div class="panel-body">
                                        <table class="table table-border-dashed table-hover mbn">
                                            <thead>
                                            <tr>
                                                <th>Applicant Name</th>
                                                <th>Position Applied</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><a href="link to details">Hock Lim</a></td>
                                                <td>Business Development Executive</td>
                                                <td>31 Dec, 2013</td>
                                            </tr>
                                            <tr>
                                                <td><a href="link to details">Hock Lim</a></td>
                                                <td>Business Development Executive</td>
                                                <td>31 Dec, 2013</td>
                                            </tr>
                                            <tr>
                                                <td><a href="link to details">Hock Lim</a></td>
                                                <td>Business Development Executive</td>
                                                <td>31 Dec, 2013</td>
                                            </tr>
                                           <tr>
                                                <td><a href="link to details">Hock Lim</a></td>
                                                <td>Business Development Executive</td>
                                                <td>31 Dec, 2013</td>
                                            </tr>
                                            <tr>
                                                <td><a href="link to details">Hock Lim</a></td>
                                                <td>Business Development Executive</td>
                                                <td>31 Dec, 2013</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End last 5 job applicants listing -->
                    </div>
                    <!-- End col-lg-8 -->
                    
                    
                    
                	<div class="col-lg-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="lifetime-sales">
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <i class="fa fa-suitcase icon-4x"></i>
                                                </div>
                                                <div class="col-md-8 mts">
                                                    <div class="ls-total">10</span></div>
                                                    <div class="ls-title">Jobs Posted</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                 	</div>
                    <!-- end # of job posted -->
                    
                 	<div class="col-lg-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="average-orders">
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <i class="fa fa-users icon-4x"></i>
                                                </div>
                                                <div class="col-md-8 mts">
                                                    <div class="ao-total">120</div>
                                                    <div class="ao-title">Job Applicants</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                	</div>
                	<!-- end # of job applicants --> 
                    
                    
                    <div class="col-lg-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="average-orders">
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <i class="fa fa-picture-o icon-4x"></i>
                                                </div>
                                                <div class="col-md-8 mts">
                                                    <div class="ao-total">350</div>
                                                    <div class="ao-title">Event Photos Posted</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                	</div>
                	<!-- end # of Event photos Posted--> 
                               
                            
                
                
              </div>
              <!-- end row -->
          
          </div>
          <!-- end tab-shopping-->
        </div>
        <!--END CONTENT-->
            
            <!--BEGIN FOOTER-->
            <div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                	<div class="pull-right"><img src="images/logo_webqom.png" alt="Webqom Technologies"></div>
                </div>
            </div>
    <!--END FOOTER--></div>
  <!--END PAGE WRAPPER-->
@stop