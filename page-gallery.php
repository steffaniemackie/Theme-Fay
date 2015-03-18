<?php 
if(isset($_REQUEST['load_with_ajax'])){
    $loaded_with_ajax = true; 
    
} else {
    $loaded_with_ajax = false;
    get_header();
    
}

?>

<?php if(have_post()):
        while(have_posts()):
        the_post(); ?>
        
        <h1><?php the_title(); ?> </h1>
        
        
        
<?php endwhile; 
    endif; ?>
    
    <hr> 

       
<?php 
$gallery = new WP_Query('post_type=slides');
if($gallery->have_posts()):

while($gallery->have_posts()):
$gallery->the_post();

?>
  
<h1><?php the_title();?> </h1>
<p><small><?php the_date('F jS, Y'); the_author; the_category(); the_tags; ?></small></p>    

<p><?php the_content(); ?></p>
<hr>
<?php 
    endwhile; 
else:

endif;                   
?> 

<?php 
if(!$loaded_with_ajax){
    get_footer();
    
}

 ?>



