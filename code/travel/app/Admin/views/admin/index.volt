{% extends 'templates/base.volt' %}
{% block title %} {{title}} {% endblock %}

{% block styles %} 
  <!-- DataTables -->
  <link rel="stylesheet" href="/public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
{% endblock %}

{% block content %}
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ title }}</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
			<table id="admins" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                  </tr>
                  </thead>
                  <tbody></tbody>
			</table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</section>
<!-- /.content -->
{% endblock %}

{% block scripts %}
<!-- DataTables  & Plugins -->
<script src="/public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/public/admin/plugins/jszip/jszip.min.js"></script>
<script src="/public/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/public/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>

	$(function () {
		$('#admins').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			"ajax": {
				"url": "/admin/fetch",
				"type": "POST"
			},
			"columns": [
				{ "data": "name" },
				{ "data": "email" },
				{ "data": "created_at" },
			],
		});
	});

</script> 
{% endblock %}