<?php 
if(isset($_REQUEST['load_with_ajax'])){
	$loaded_with_ajax = true;	
}
else {
	$loaded_with_ajax = false;
	get_header();	
} ?>


<div id="singleblog">

<?php if(have_posts()): 
while(have_posts()):
the_post();
?>
    	
    		<ul>
        		<li>
            		<article>
                	 <h1><?php the_title(); ?></h1>
                     
                 	 <div id="details">  <small><?php the_date('n.d.Y'); ?></small> <small>posted <?php the_author(); ?></small> </div>
               
              
                   <img src="<?php bloginfo('template_url'); ?>/images/slideshowimg1.png">
                   
                   	
              		</article> 
           		 </li>
       	
            </ul>
            
         
 </div>




<aside id="blogsidebar">  
	<?php if(!dynamic_sidebar())get_sidebar(); ?>    
</aside>

<section id="Blog">






	
	<section id="SingleBlog">
	<p>
   		 <?php 	
	
		the_content();
		?>
		</p>
	</section>
	<?php previous_post_link(); ?>
	<?php next_post_link(); ?>
	


<hr>

	

    <?php 

	comments_template();
	
	?>


</section>

<?php 
endwhile; 
endif; 
?>



<?php

if(!$loaded_with_ajax){
	get_footer();	
}
?>