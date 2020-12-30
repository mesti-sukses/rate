<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('user') ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $nomorSurat ?></div>
						<div class="text-muted"><?php echo $surat->nama ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked blank-document"><use xlink:href="#stroked-blank-document"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $nomorAyat ?></div>
						<div class="text-muted">Ayat</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tafsir Surat</div>
				<div class="panel-body">
					<?php if (isset($hasilRandom)): ?>
						<?php echo $hasilRandom->content ?>
					<?php else: ?>
						Tafsir untuk surat dan ayat ini masih belum tersedia. <a href="<?php echo base_url('quran/edit') ?>">Create New Tafsir</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>	<!--/.main-->