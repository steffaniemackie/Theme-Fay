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
$blog = new WP_Query();
$blog->query('posts_per_page=50');
if($blog->have_posts()):
while($blog->have_posts()):
$blog->the_post();
?>

	<div id="sectionwrap">
	<section id="Blog">
    	<h4 class="blogtitle"><?php the_title(); ?></h4>
    	<small><?php the_date('n.d.Y'); ?></small> <small>posted by <?php the_author(); ?></small> 
   		 <p>
   		 <?php 	
	
		echo implode(' ', array_splice(explode(' ', get_the_content()),0, 50));
		?>
		</p>
		<div id="button" class="button">
  		<a href="<?php the_permalink(); ?>">See More</a>
		</div>
	</section>
	
	</div>

    
<?php 
endwhile;


else:
	echo 'Sorry, no posts found';
endif;

?>


<?php previous_post_link(); ?>
<?php next_post_link(); ?>

<?php 
if(!$loaded_with_ajax){
    get_footer();
    
}

 ?>