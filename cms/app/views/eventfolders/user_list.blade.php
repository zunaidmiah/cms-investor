@extends('layouts.admin')
@section('content')
<ol class="breadcrumb bc-3">
	<li>
		<a href="/dashboard"><i class="entypo-home"></i>Admin</a>
	</li>	
</ol>

<h2>Members</h2>

<br />

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th data-hide="phone">User Name</th>
			<th> Name </th>
			<th data-hide="phone">Email</th>
			<th data-hide="phone,tablet">Role</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		{{$html}}
	</tbody>
	
</table>

<script type="text/javascript">
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>
@stop