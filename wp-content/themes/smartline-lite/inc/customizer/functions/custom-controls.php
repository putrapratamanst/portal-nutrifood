<?php
/**
 * Theme Customizer Functions
 *
 */

/*========================== CUSTOMIZER CONTROLS FUNCTIONS ==========================*/

if ( class_exists( 'WP_Customize_Control' ) ) :

	// Title Control
	class Smartline_Customize_Header_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</label>
			
			<?php
        }
    }

	// Description Control
	class Smartline_Customize_Description_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<span class="description"><?php echo esc_html( $this->label ); ?></span>
			
			<?php
        }
    }
	
	// Upgrade Control
	class Smartline_Customize_Upgrade_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<div class="upgrade-pro-version">
			
				<span class="customize-control-title"><?php esc_html_e( 'Pro Version', 'smartline-lite' ); ?></span>
				
				<span class="textfield">
					<?php printf( esc_html__( 'Purchase the Pro Version of %s to get additional features and advanced customization options.', 'smartline-lite' ), 'Smartline'); ?>
				</span>
				
				<p>
					<a href="http://themezee.com/themes/smartline/?utm_source=customizer&utm_medium=button&utm_campaign=smartline&utm_content=pro-version" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'Learn more about %s Pro', 'smartline-lite' ), 'Smartline'); ?>
					</a>
				</p>
				
			</div>
			
			<div class="upgrade-toolkit">
			
				<span class="customize-control-title"><?php esc_html_e( 'ThemeZee Toolkit', 'smartline-lite' ); ?></span>
				
				<span class="textfield">
					<?php esc_html_e( 'The ThemeZee Toolkit add-on is a collection of useful small modules and features, neatly bundled into a single plugin.', 'smartline-lite' ); ?>
				</span>
				
				<p>
					<a href="http://themezee.com/addons/toolkit/?utm_source=customizer&utm_medium=button&utm_campaign=smartline&utm_content=toolkit" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'View Details', 'smartline-lite' ), 'Smartline'); ?>
					</a>
					<a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ); ?>" class="button button-primary">
						<?php esc_html_e( 'Install now', 'smartline-lite' ); ?>
					</a>
				</p>
			
			</div>
			
			<div class="upgrade-addons">
			
				<span class="customize-control-title"><?php esc_html_e( 'Add-on plugins', 'smartline-lite' ); ?></span>
				
				<span class="textfield">
					<?php esc_html_e( 'Extend the functionality of your WordPress website with our customized add-ons.', 'smartline-lite' ); ?>
				</span>

				<p>
					<a href="http://themezee.com/addons/?utm_source=customizer&utm_medium=button&utm_campaign=smartline&utm_content=addons" target="_blank" class="button button-secondary">
						<?php esc_html_e( 'Browse our add-ons', 'smartline-lite' ); ?>
					</a>
				</p>
				
			</div>
			
			<?php
        }
    }
	
endif;


// Add a callback function to retrieve wether posts length setting is set to excerpt or not
function smartline_control_posts_length_callback( $control ) {
	
	// Check if excerpt mode is selected
	if ( $control->manager->get_setting('smartline_theme_options[posts_length]')->value() == 'excerpt' ) :
		return true;
	else :
		return false;
	endif;
	
}

// Add a callback function to retrieve wether slider is activated or not
function smartline_slider_activated_callback( $control ) {
	
	// Check if Slider is turned on
	if ( $control->manager->get_setting('smartline_theme_options[slider_activated_front_page]')->value() == 1 ) :
		return true;
	elseif ( $control->manager->get_setting('smartline_theme_options[slider_activated_blog]')->value() == 1 ) :
		return true;
	else :
		return false;
	endif;
	
}