<?php 
if(isset($_REQUEST['load_with_ajax'])){
	$loaded_with_ajax = true;	
}
else {
	$loaded_with_ajax = false;
	get_header();	
} ?>



<div id="blogroll">
    
     <h1>404!</h1>
     <p>You must be lost, lets help get you found.</p>
       
       <div id="searchbar"><?php get_search_form(); ?></div>
              
</div>


    

<?php
if(!$loaded_with_ajax){
	get_footer();	
}
?>