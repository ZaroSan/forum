<div class="row mt-2	">
	<div class="col-sm-12">
		<input type="text" id="myInput" onkeyup="reloadList()" name="search" placeholder="Rechercher par titre ..." class="col-sm-12">
	</div>
	<div class="col-sm-12" id="content">
		
	</div>
</div>

<div class="row" >
	<nav aria-label="Page navigation example">
	<div id="pagination">
	</div>
	</nav>
</div>
<script type="text/javascript" src="<?php echo Router::webroot('ajax/mangaAjax.js');?>"></script>
<script type="text/javascript">
	window.onload = function() {
		reloadList();
	}
</script>
