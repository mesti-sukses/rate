
		<?php if(isset($baseAdminScript)) foreach ($baseAdminScript as $js): ?>
			<script type="text/javascript" src="<?php echo base_url($folder.'js/'.$js) ?>"></script>
		<?php endforeach ?>

		<?php foreach ($page_info['js'] as $js): ?>
			<script type="text/javascript" src="<?php echo base_url($folder.'js/'.$js) ?>"></script>
		<?php endforeach ?>

	</body>
</html>
