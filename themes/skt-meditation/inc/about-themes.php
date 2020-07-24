<?php
//about theme info
add_action( 'admin_menu', 'skt_meditation_abouttheme' );
function skt_meditation_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-meditation'), esc_html__('About Theme', 'skt-meditation'), 'edit_theme_options', 'skt_meditation_guide', 'skt_meditation_mostrar_guide');   
} 
//guidline for about theme
function skt_meditation_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_attr_e('Theme Information', 'skt-meditation'); ?>
		   </div>
          <p><?php esc_attr_e('SKT Meditation is a yoga, reiki, holistic healing center and massage spa related WordPress theme with focus on concentration, coaching classes, yoga, karmic, astrology, fitness trainer, gym, workout, ayurveda, meditative practice, exercise, stretching, discipline, physical, spiritual, relaxing help by medical authorized physio therapists and hospitals. Can be used by doctor, physician, clinics as well as coaches. Pilates, aerobics, life sciences, nature, prayer, church, NGO, non profit, charity and community websites can use it. Responsive and WooCommerce friendly with contact form plugins and page builder plugins compatible. Gutenberg compatible and simple, flexible, easy to use and set up. Mobile friendly and built with customizer.','skt-meditation'); ?></p>
		  <a href="<?php echo esc_url(SKT_MEDITATION_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_MEDITATION_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_attr_e('Live Demo', 'skt-meditation'); ?></a> | 
				<a href="<?php echo esc_url(SKT_MEDITATION_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_attr_e('Buy Pro', 'skt-meditation'); ?></a> | 
				<a href="<?php echo esc_url(SKT_MEDITATION_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_attr_e('Documentation', 'skt-meditation'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_MEDITATION_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>