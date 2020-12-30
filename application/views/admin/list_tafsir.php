<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">List Tafsir</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tafsir</h1>
		</div>
	</div><!--/.row-->
			
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="<?php echo base_url('quran/edit') ?>" class="btn btn-primary">Add New Tafsir</a></div>
				<div class="panel-body">
					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					    <thead>
						    <tr>
						        <th data-field="state" data-sortable="true">Surat</th>
						        <th data-field="id" data-sortable="true">Ayat</th>
						        <th data-field="name"  data-sortable="true">Tag</th>
						        <th data-field="price">Action</th>
						    </tr>
					    </thead>
					    <?php foreach ($tafsirQuran as $tafsir): ?>
					    	<tr>
						    	<td><?php echo $tafsir->nama ?></td>
						    	<td><?php echo $tafsir->ayat ?></td>
						    	<td><?php echo $tafsir->tag ?></td>
						    	<td>
						    		<a href="<?php echo base_url('quran/edit/'.$tafsir->id_tafsir) ?>" class="btn btn-primary">Edit</a>
						    		<a href="<?php echo base_url('quran/delete/'.$tafsir->id_tafsir) ?>" class="btn btn-danger">Delete</a>
						    	</td>
					    	</tr>
					    <?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div><!--/.row-->
	
	
</div><!--/.main-->

<script>
    $(function () {
        $('#hover, #striped, #condensed').click(function () {
            var classes = 'table';

            if ($('#hover').prop('checked')) {
                classes += ' table-hover';
            }
            if ($('#condensed').prop('checked')) {
                classes += ' table-condensed';
            }
            $('#table-style').bootstrapTable('destroy')
                .bootstrapTable({
                    classes: classes,
                    striped: $('#striped').prop('checked')
                });
        });
    });

    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }
        return {};
    }
</script>