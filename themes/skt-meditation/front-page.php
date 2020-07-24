<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Meditation
 */
get_header(); 

$hideslide = get_theme_mod('hide_slides', 1);
$hide_pagethreeboxes = get_theme_mod('hide_pagethreeboxes', 1);
$secwithcontent = get_theme_mod('hide_home_secwith_content', 1);
$hidesectwo = get_theme_mod('hide_section_two', 1);

if (!is_home() && is_front_page()) { 
if( $hideslide == '') { ?>
<!-- Slider Section -->
<?php 
$pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod;
    }	
} 
if( !empty($pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $skt_meditation_slideno[] = $i;
          $skt_meditation_slidetitle[] = get_the_title();
		  $skt_meditation_slidedesc[] = get_the_excerpt();
          $skt_meditation_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $skt_meditation_slideno as $skt_meditation_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $skt_meditation_sln ); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo esc_html($skt_meditation_slidetitle[$k] ); ?></h2>
        <p><?php echo esc_html($skt_meditation_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="slide_more" href="<?php echo esc_url($skt_meditation_slidelink[$k] ); ?>">
          <?php esc_html_e('Read More', 'skt-meditation');?>
          </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 

	if(!is_home() && is_front_page()){ 
	if( $secwithcontent == '') {
?>
 <section id="sectionone">
 	<div class="container">
      <div class="home_section1_content">
		<?php
        $section1_title = get_theme_mod('section1_title');
        if(!empty($section1_title)){
        ?>
        <div class="center-title"><h2><?php echo esc_attr($section1_title); ?></h2></div>
        <?php }
         $centerimage = get_theme_mod('section1_centerimage');
		?>        
        <div class="row_area allcolsarea">
          <div class="skt-coll-columns-3 <?php if(empty($centerimage)){?>collfull<?php } ?>">
          	<?php 
			for($l=1; $l<4; $l++) { 
	  		if( get_theme_mod('sec-column-left'.$l,false)) {
			$leftblock = new WP_query('page_id='.get_theme_mod('sec-column-left'.$l,true)); 
			while( $leftblock->have_posts() ) : $leftblock->the_post(); 
			?>
            <div class="left-fitbox"><a href="<?php echo esc_url( get_permalink() ); ?>">
              <div class="left-fitleft">
              <div class="left-fit-title">
                  <h3><?php the_title(); ?></h3>
                </div>
              <div class="left-fit-desc"><?php the_excerpt(); ?></div>
            </div>
            <?php if( has_post_thumbnail() ) { ?>
              <div class="left-fitright"><?php the_post_thumbnail('medium'); ?></div>
              <?php } ?>
              </a> </div>
            <div class="clear"></div>
            <?php endwhile; wp_reset_postdata(); 
               }} 
			?>
          </div>
          
          <?php if(!empty($centerimage)){?>
          <div class="skt-coll-columns-3">
            <div class="featurethumb"><img src="<?php echo esc_url($centerimage); ?>"></div>
          </div>
          <?php } ?>
          
          <div class="skt-coll-columns-3 <?php if(empty($centerimage)){?>collfull<?php } ?>">
			<?php
			for($r=1; $r<4; $r++) { 
	  		if( get_theme_mod('sec-column-right'.$r,false)) {
			$rightblock = new WP_query('page_id='.get_theme_mod('sec-column-right'.$r,true)); 
			while( $rightblock->have_posts() ) : $rightblock->the_post(); 
			?>   
            <div class="right-fitbox"> <a href="<?php echo esc_url( get_permalink() ); ?>">
              <?php if( has_post_thumbnail() ) { ?>
              <div class="right-fitleft"><?php the_post_thumbnail('medium'); ?></div>
              <?php } ?>
              <div class="right-fitright">
              <div class="right-fit-title">
                  <h3><?php the_title(); ?></h3>
                </div>
              <div class="right-fit-desc"><?php the_excerpt(); ?></div>
            </div>
              </a> </div>
            <div class="clear"></div>
			<?php endwhile; wp_reset_postdata(); 
               }} 
            ?>

          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
 </section>
<?php }} ?>
<?php
if (!is_home() && is_front_page()) { 
if( $hidesectwo == '') { ?>
<section class="home2_section_area ">
    	<div class="center">
            <div class="home_section2_content">                	
              <?php
              	$section2_title = get_theme_mod('section2_title');
				$section2_button_text = get_theme_mod('section2_button_text');
				$section2_button_link = get_theme_mod('section2_button_link');
			  ?>                              
			 <div class="promo2">
             	<?php if(!empty($section2_title)){?>
             	<div class="promo-left">
					<h2><?php echo esc_html($section2_title);?></h2>					
                </div>
                <?php } ?>
                <div class="promo-right">
                <?php if(!empty($section2_button_text)){?>
                <div class="sktmore"><?php if(!empty($section2_button_link)){?><a href="<?php echo esc_url($section2_button_link);?>"><?php } ?><?php echo esc_html($section2_button_text); ?><?php if(!empty($section2_button_link)){?></a><?php } ?></div>
                </div>
                <?php } ?>
                <div class="clear"></div>
             </div>	                          
		     </div>
        </div>
    </section>
<?php } } ?>  
<?php
if (!is_home() && is_front_page()) { 
if( $hide_pagethreeboxes == '') { ?>  
<section class="home3_section_area ">
    	<div class="center">
            <div class="home_section3_content">
		<?php
			$section3_title = get_theme_mod('section3_title');
			if(!empty($section3_title)){
        ?>	
		<div class="center-title">
			<h2><?php echo esc_html($section3_title);?></h2>
		</div>
        <?php 
			}
		?>
        <div class="column-ourclasses-wrapper">
        <?php for($p=1; $p<4; $p++) { 
	  		if( get_theme_mod('page-column'.$p,false)) {
			$querypagethreeboxes = new WP_query('page_id='.get_theme_mod('page-column'.$p,true)); 
			while( $querypagethreeboxes->have_posts() ) : $querypagethreeboxes->the_post(); ?>
            <div class="column-ourclasses">
			<?php if( has_post_thumbnail() ) { ?>
            <div class="ourclasses-image"><a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php
            the_post_thumbnail('medium');  
			?>
            </a></div>
            <?php } ?>
            <div class="ourclasses-content">
                    <div class="ourclasses-title-des"><a href="<?php echo esc_url( get_permalink() ); ?>">
                      <h3><?php the_title(); ?></h3>
                      </a> <span class="vanuetiemhost"><?php the_excerpt(); ?></span> </div>
                    <div class="clear"></div>
                  </div>
          </div>
          <?php endwhile;
       wp_reset_postdata(); 
	   }} ?>
                <div class="clear"></div>
              </div>
            </div>
        </div>
    </section>
    <div class="clear"></div>
<?php } } ?>     
<div class="container">
     <div class="page_content">
      <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-meditation' ),
							'next_text' => esc_html__( 'Next', 'skt-meditation' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
} else {
    ?>
	<section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
							 ?>
                             <header class="entry-header">           
            				<h1><?php the_title(); ?></h1>
                    		</header>
                             <?php
                            the_content();
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-meditation' ),
							'next_text' => esc_html__( 'Next', 'skt-meditation' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
	<?php
}
	?>
    <?php get_sidebar();?>
    <div class="clear"></div>
  </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>