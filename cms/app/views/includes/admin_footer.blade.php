
 <!--BEGIN FOOTER-->
            <!-- <div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                  <div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
                </div>
            </div> -->
    <!--END FOOTER-->




</div>
</div>
<script src="{{ URL::asset('/assets/js/jquery-1.9.1.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery-ui.js') }}"></script>

<!--loading bootstrap js-->

<script src="{{ URL::asset('/assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js') }}"></script>
<script src="{{ URL::asset('/assets/js/html5shiv.js') }}js/html5shiv.js"></script>
<script src="{{ URL::asset('/assets/js/respond.min.js') }}js/respond.min.js"></script>
<script src="{{ URL::asset('/assets/vendors/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/slimScroll/jquery.slimscroll.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/jquery-cookie/jquery.cookie.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery.menu.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/jquery-pace/pace.min.js') }}"></script>


<!--<script src="{{ URL::asset('/assets/js/pace.js') }}"></script>-->

<script src="{{ URL::asset('/assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/moment/moment.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/bootstrap-clockface/js/clockface.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/jquery-maskedinput/jquery-maskedinput.js') }}"></script>
<script src="{{ URL::asset('/assets/js/form-components.js') }}"></script>
<script src="{{ URL::asset('/assets/js/custom.js') }}"></script>
<!--LOADING SCRIPTS FOR PAGE-->

<script src="{{ URL::asset('/assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('/assets/js/ui-tabs-accordions-navs.js') }}"></script>

<script src="{{ URL::asset('/assets/vendors/jquery-highcharts/highcharts.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/jquery-highcharts/exporting.js') }}"></script>
<script src="{{ URL::asset('/assets/js/chart-line-charts.js') }}"></script>

{{ HTML::script('assets/vendors/jQueryValidation/js/languages/jquery.validationEngine-en.js') }}
        {{ HTML::script('assets/vendors/jQueryValidation/js/jquery.validationEngine.js') }}


<!--CORE JAVASCRIPT-->
<script src="{{ URL::asset('/assets/js/tablesorter.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.js') }}"></script>
<script src="{{ URL::asset('/assets/js/main.js') }}"></script>

<script src="{{ URL::asset('/js/content-editing-save.js') }}"></script>
<script>
	

	$("#montages_add_form").validationEngine();

	$(document).ready(function() 
    { 
        //$("#sortable").tablesorter( {sortList: [[2,0], [3,0]]} ); 

        $('#sortable').tablesorter({headers: { 0: { sorter: false}, 1: {sorter: false}, 4: {sorter: false} }});
    } 
); 
</script>
