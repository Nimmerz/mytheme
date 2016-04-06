<form role="search" class="search-it" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<input type="search" value="<?php echo get_search_query() ?>" name="s" id="s"placeholder="Search"/>
	<button type="submit" id="searchsubmit" ><i class="fa fa-search"></i></button>
</form>