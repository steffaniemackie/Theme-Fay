<?php 
if(isset($_REQUEST['load_with_ajax'])){
    $loaded_with_ajax = true; 
    
} else {
    $loaded_with_ajax = false;
    get_header();
    
}

?>

<div id="singleblog">

 
    	
    		<ul>
        		<li>
            		<article>
                	 <h1><?php the_title(); ?></h1>
                     
               
                   <img src="<?php bloginfo('template_url'); ?>/images/slideshowimg1.png">
                   	
              		</article> 
           		 </li>
       	
            </ul>
            
         
 </div>




<aside>  
	<?php if(!dynamic_sidebar())get_sidebar(); ?>    
</aside>

<section id="Blog">

    <?php the_content(); ?>

</section>

<?php 
if(!$loaded_with_ajax){
    get_footer();
    
}

 ?>