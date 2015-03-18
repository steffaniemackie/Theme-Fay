<?php 
if(isset($_REQUEST['load_with_ajax'])){
	$loaded_with_ajax = true;	
}
else {
	$loaded_with_ajax = false;
	get_header();	
} ?>

<div id="container">



<?php 
$slides = new WP_Query();
$slides->query('post_type=slides&order=ASC');
if($slides->have_posts()):

?>


<div id="slideshow">
 <!--
	 <div id="slidenav">
    	<ul>
        	<li><a href="#slide-1">1</a></li>
            <li><a href="#slide-2">2</a></li>
            <li><a href="#slide-3">3</a></li>
        </ul>
    </div>
    
    !-->
 
    	<div id="slides">
    		<ul>
       		
       		<?php 
            $i = 1;
            while ($slides->have_posts()):
                    $slides->the_post(); ?>
        		
           		<li class="slide" id="slide-<?=$i?>">
           		
           		
            		<article>
                	 <h1><?php the_title(); ?></h1>
                     <p><?php the_excerpt(); ?></p>
                     <div id="slidebutton" class="button">  <a href="<?php the_permalink(); ?>">More!</a></div>
                     
                   <figure>
              
                        <?php the_post_thumbnail('large') ?>
                       <figcaption>
                      
                  
                        </figcaption>
                   </figure>
              		</article> 
           		 </li>
           		 
           		 <?php 

                    $i++;
                    endwhile; ?>
           		 
       		 </ul>
         
    </div>
</div>  

<?php endif; ?>

<?php 
$about = new WP_Query();
$about->query('pagename=about&posts_per_page=1');
if($about->have_posts()):
while($about->have_posts()):
$about->the_post();
?>
<div id="sectionwrap"><section id="About">
	<h3 class="sectiontitle"><?php the_title(); ?></h3>
   <?php the_excerpt(); ?>
   <div id="button" class="button">


  <a href="<?php the_permalink(); ?>">See More</a>
    


</div>


</section></div>
<?php 
endwhile;
endif;
?>

<?php 
$recent = new WP_Query();
$recent->query('posts_per_page=1&ignore_sticky_posts=true');

if($recent->have_posts()):
while($recent->have_posts()):
$recent->the_post();
?>

<div id="sectionwrap">

<section id="Blog">
	<h3 class="sectiontitle">Latest from the Blog</h3>
    <h4 class="blogtitle"><?php the_title(); ?></h4>
    <small><?php the_date('n.d.Y'); ?></small> <small>posted by <?php the_author(); ?></small> 
    <p>
    <?php 	
	
	echo implode(' ', array_splice(explode(' ', get_the_content()),0, 100));
	?>
</p>
<div id="button" class="button">


  <a href="<?php the_permalink(); ?>">See More</a>
    


</div>

</section>
</div>


<?php 
endwhile;
endif;
?>



<div id="sectionwrap">
<section id="Gallery">
	<h3 class="sectiontitle">Photos</h3>
 



 <div class="row" id="gallery"> 
       
           <?php 
				$gallery = new WP_Query();
				$gallery->query('post_type=gallery'); ?>
       
         <nav data-filter="true" id = "galleryfilter">
    	<ul>
            <li data-cat='Fun'>Fun</li>
            <li data-cat='Business'>Business</li>
            <li data-cat='Images'>Images</li>
        </ul>
    </nav>
     
            <ul role="list">
            	
            

				<?php if($gallery->have_posts()):
				while($gallery->have_posts()):
				$gallery->the_post();
				?>
                
                
                       <li class='<?php the_title(); ?>'>
      					
                     
                            		
                          <a href="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)) ?>">      <figure>
                           	 <?php the_post_thumbnail('large'); ?>
                                     
                                   
                                  
                                    <figcaption><?php the_title(); ?> <br>
                                    <p><?php the_excerpt(); ?></p>
                                    
										
                                    </figcaption>
                                </figure></a>
                           
                        </li>
                          
                         <?php 
							endwhile;
							
							?>
							
							<?php
							endif;
							?>
       
                               
                      </ul>     
      
        
        <p>.</p>
           
    
     </div>
               
 
    
</section>
</div>


<div id="sectionwrap">

<section id="contact">




    <h3 class="sectiontitle">Contact</h3>
    
    
    	<?php dynamic_sidebar('Contact Area'); ?>
    	
</section>
</div>
</div>


</div>

<?php
if(!$loaded_with_ajax){
	get_footer();	
}
?>