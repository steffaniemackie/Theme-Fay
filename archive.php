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
     <p><?php bcn_display(); ?></p>         
</div>



<?php 
if(have_posts()):
while(have_posts()):
the_post();
?>

<div id="sectionwrap">
<section id="Blog">
    <h4 class="blogtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <small><?php the_date('n.d.Y');?></small> <small>posted by <?php the_author(); ?></small> <small>like</small> <small>comment</small>   
    <?php the_excerpt(); ?>

<div id="button" class="button">

</div>
   <a href="<?php the_permalink(); ?>">See More</a>
</div>
</section>
<?php 
endwhile;
else:
	echo 'Sorry, no posts found';
endif;

?>
<?php 
if(!$loaded_with_ajax){
    get_footer();
    
}

 ?>