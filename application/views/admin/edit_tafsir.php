<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Edit Tafsir</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Tafsir</h1>
		</div>
	</div><!--/.row-->
			
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<?php 
					echo form_open('', array('id' => 'editor'));
					$k = isset($currentTafsirQuran);
				?>
					<div class="panel-heading">
						<?php if (!$k): ?>
							New Tafsir
						<?php else : ?>	
							Surat <?php echo $currentTafsirQuran->nama ?> ayat <?php echo $currentTafsirQuran->ayat ?>
						<?php endif ?>
						<button class="btn btn-primary pull-right" type="submit">Save</button>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Surat</label>
							<select class="form-control" name="surat">
								<option>Pilih Surat...</option>
								<?php foreach ($listSurat as $surat): ?>
									<option value="<?php echo $surat->id ?>" <?php if($k) if($currentTafsirQuran->id == $surat->id) echo "selected" ?>><?php echo $surat->nama ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group">
							<label>Ayat</label>
							<input class="form-control" name="ayat" placeholder="Masukkan ayat" value="<?php if($k) echo $currentTafsirQuran->ayat ?>">
						</div>

						<div class="form-group">
							<label>Tag</label>
							<input class="form-control" name="tag" placeholder="Masukkan tag" value="<?php if($k) echo $currentTafsirQuran->tag ?>">
						</div>

						<div id="div-editor">
							 <?php if($k) echo $currentTafsirQuran->content ?>
						</div>
						<textarea style="display: none;" id="text-editor" name="content"></textarea>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div><!--/.row-->
	
	
</div><!--/.main-->