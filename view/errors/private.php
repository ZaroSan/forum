
<div class="alert alert-warning">
<strong><?php echo $message; ?></strong>
<?php if(isset($search)){ ?>
<p>Object recherché : <?php foreach ($search as $key => $value) {
	echo $value.' ';
}?>
</p>
<?php } ?>
</div>

