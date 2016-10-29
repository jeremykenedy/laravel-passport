<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
		$('.data-table').DataTable({
			'paging': true,
			'lengthChange': true,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': true,
		    'aoColumnDefs': [{
		        'bSortable': false,
		        'searchable': false,
		        'aTargets': ['no-search'],
		        'bTargets': ['no-sort']
		    }]
		});
	});
</script>