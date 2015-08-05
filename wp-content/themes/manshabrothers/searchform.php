<?php $sq = get_search_query() ? get_search_query() : __('Enter search terms&hellip;', 'base'); ?>
<div class="form">
<form method="get" class="agencyService_btn" action="<?php echo home_url(); ?>" >
	
		<input class="fields" type="text" name="s" value="" placeholder="<?php echo $sq; ?>" />
		<input class="btn btn-block mot-bg form_btn" type="submit" value="Search" />
	
</form>
</div>