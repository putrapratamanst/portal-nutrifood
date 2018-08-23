<!-- Loader Image section  -->
<div id="sfpluspageLoad" >  
    
</div>
<!-- END Loader Image section  -->

<!-- javascript error loader  -->
<div class="error" id="sfsi_onload_errors" style="margin-left: 60px;display: none;">  
    <p>
    	<?php  _e( 
					'We found errors in your javascript which may cause the plugin to not work properly. Please fix the error:', 
					'ultimate-social-media-plus' 
				); ?>
    </p><p id="sfsi_jerrors"></p>
</div>
<!-- END javascript error loader  -->

<!-- START Admin view for plugin-->
<div class="wapper sfsi_mainContainer">
	
     <!-- Get notification bar-->
	<?php if(get_option("sfsi_plus_show_notification") == "yes") { ?>
    <script type="text/javascript">
		jQuery(document).ready(function(e) {
            jQuery(".sfsi_plus_show_notification").click(function(){
				SFSI.ajax({
					url:ajax_object.ajax_url,
					type:"post",
					data: {action: "sfsiPlus_notification_read"},
					success:function(msg){
						if(msg == 'success')
						{
							jQuery(".sfsi_plus_show_notification").hide("fast");
						}
					}
				});
			});
        });
	</script>
    <style type="text/css">
	.sfsi_plus_show_notification {
		float: left;
		margin-bottom: 45px;
		padding: 12px 13px;
		width: 98%;
		background-image: url(<?php echo SFSI_PLUS_PLUGURL ?>images/notification-close.png);
		background-position: right 20px center;
    	background-repeat: no-repeat;
		cursor: pointer;
		text-align:center;
	}
	</style>	
	<div class="sfsi_plus_show_notification" style="background-color: #38B54A; color: #fff; font-size: 18px;">
    	
        <?php  _e( 
					'New: You can now also show a subscription form on your site, increasing sign-ups! (Question 8)', 
					'ultimate-social-media-plus' 
				); ?>
        <p>
			<?php  _e( 
						'(If question 8 gets displayed in a funny way then please reload the page by pressing Control+F5(PC) or Command+R(Mac))', 
						'ultimate-social-media-plus' 
					); ?>
        </p>
    </div>
	<?php } ?>
    <!-- Get notification bar-->
    
    
    <!-- Top content area of plugin -->
    <div class="main_contant">
        <h1>
			<?php  _e( 'Welcome to the Ultimate Social Media Icons PLUS plugin!', 'ultimate-social-media-plus' ); ?>
        </h1>
        <p>
        	<?php  _e( 'This plugin is 100% FREE and will fulfill all your subscription/sharing/liking needs!', 'ultimate-social-media-plus' ); ?>
        </p>
        <p>
        	<?php  _e( "Simply answer the questions below (at least the first 3) by clicking on them - that's it!", 'ultimate-social-media-plus' ); ?>
        </p>
        <p> 
        	<?php  _e( 'If you have questions, or ', 'ultimate-social-media-plus' ); ?>
        	<b>
        		<?php  _e( "something doesn't work as it should,", 'ultimate-social-media-plus' ); ?>
        	</b>
         	<?php  _e( 'please', 'ultimate-social-media-plus' ); ?>
         	<a  href="mailto:support@ultimatelysocial.com" title="support@ultimatelysocial.com" alt="support@ultimatelysocial.com" class="lit_txt">
         		<?php  _e( 'get in touch with us', 'ultimate-social-media-plus' ); ?>
         	</a>,
			<?php  _e( 'we‘re happy to sort it out!', 'ultimate-social-media-plus' ); ?>
       </p>
    </div>
    <!-- END Top content area of plugin -->
      
    <!-- step 1 end  here -->
    <div id="accordion">
        <h3><span>1</span>
            <?php  _e( 'Which icons do you want to show on your site? ', 'ultimate-social-media-plus' ); ?>
        </h3>
        <!-- step 1 end  here -->
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view1.php'); ?>
        <!-- step 1 end here --> 
        
        <!-- step 2 start here -->
        <h3><span>2</span>
            <?php  _e( 'What do you want the icons to do? ', 'ultimate-social-media-plus' ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view2.php'); ?>
        <!-- step 2 END here -->
        
        <!-- step new 3 start here -->
        <h3><span>3</span>
            <?php  _e( 'Where shall they be displayed? ', 'ultimate-social-media-plus' ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view8.php'); ?>
    <!-- step new3 end here -->
   	</div>
   	<h2 class="optional">
   		<?php  _e( 'Optional', 'ultimate-social-media-plus' ); ?>
   	</h2>
	<div id="accordion1">
	<!-- step old 3 start here -->
        <h3><span>4</span>
            <?php  _e( 'What design &amp; animation do you want to give your icons?', 'ultimate-social-media-plus' ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view3.php'); ?>
        <!-- step old 3 END here -->
    
        <!-- step old 4 Start here -->
        <h3><span>5</span>
            <?php  _e( 'Do you want to display "counts" next to your main icons?', 'ultimate-social-media-plus' ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view4.php'); ?>
        <!-- step old 4 END here -->
    
        <!-- step old 5 Start here -->
        <h3><span>6</span>
            <?php  _e( 'Any other wishes for your main icons?', 'ultimate-social-media-plus' ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view5.php'); ?>
        <!-- step old 5 END here -->
    
        <!-- step old 6 Start here (this is older and newer is added as 8 at question 3) -->
        <!--<h3><span>7</span>Do you want to display icons at the end of every post?</h3>-->
         <?php //include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view6.php'); ?>
        <!-- step old 6 END here -->
    
        <!-- step old 7 Start here -->
        <h3><span>7</span>
            <?php  _e( 'Do you want to display a pop-up, asking people to subscribe?', 'ultimate-social-media-plus' ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view7.php'); ?>
        <!-- step old 7 END here -->
    
        <!-- step old 8 Start here -->
        <h3><span>8</span>
            <?php  _e( 'Do you want to show a subscription form (increases sign ups)?', 'ultimate-social-media-plus' ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view9.php'); ?>
    <!-- step old 8 END here -->
    
    </div>
    <div class="tab10">
    	<div class="save_button">
		 	<img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" />
            <a href="javascript:;" id="save_plus_all_settings" title="Save All Settings">
                <?php  _e( ' Save All Settings', 'ultimate-social-media-plus' ); ?>
            </a>
	 	</div>
        <p class="red_txt errorMsg" style="display:none"> </p>
        <p class="green_txt sucMsg" style="display:none"> </p>
	 	<p style="margin-top: 30px;">
        	<?php  _e( 'This plugin is 100% free. Please do us a BIG favor and give us a 5 star rating', 'ultimate-social-media-plus' ); ?>
            <a href="https://wordpress.org/support/view/plugin-reviews/ultimate-social-media-plus" target="_new">
            	<?php  _e( 'here', 'ultimate-social-media-plus' ); ?>
            </a>
            <?php  _e( ". If you're not happy, please", 'ultimate-social-media-plus' ); ?>
            <a href="mailto:support@ultimatelysocial.com">
                <?php  _e( 'get in touch with us', 'ultimate-social-media-plus' ); ?>
            </a>
            <?php  _e( ', so that we can sort it out.Thank you!', 'ultimate-social-media-plus' ); ?>
         </p>
         <p class="bldtxtmsg">
         	<?php  _e( 'Need top-notch Wordpress development work at a competitive price? Visit us at ', 'ultimate-social-media-plus' ); ?>
         	<a href="http://www.ultimatelysocial.com">
        		<?php  _e( 'ultimatelysocial.com', 'ultimate-social-media-plus' ); ?>
         	</a>
         </p>
	</div>
 <!-- all pops of plugin under sfsi_pop_content.php file --> 
 <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_pop_content.php'); ?>
</div>
<!-- START Admin view for plugin-->