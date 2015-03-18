<?php 
if(isset($_REQUEST['load_with_ajax'])){
    $loaded_with_ajax = true; 
    
} else {
    $loaded_with_ajax = false;
    get_header();
    
}

?>

<div id="blogroll">
    
     <h1><?php wp_title(''); ?></h1>
              
</div>

<?php 
$about = new WP_Query();
$about->query('pagename=about&posts_per_page=1');
if($about->have_posts()):
while($about->have_posts()):
$about->the_post();
?>
<div id="sectionwrap">


	<section id="contact">

    <h3 class="sectiontitle">Contact</h3>
    
    
    	<?php dynamic_sidebar('Contact Area'); ?>
    	
</section>
   
    
</div>
<?php 
endwhile;
endif;
?>

<?php 
if(!$loaded_with_ajax){
    get_footer();
    
}

 ?>