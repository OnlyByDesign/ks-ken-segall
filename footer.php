<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
				<?php
					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
						get_template_part( 'includes/social_icons', 'footer' );
					}

					echo et_get_footer_credits();
				?>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

</div> <!-- #page-container -->

<?php wp_footer(); ?>

<script src="http://kensegall.com/wp-content/themes/divi-child/js/embed.js"  data-dojo-config="usePlainJson: true, isDebug: false"></script>
<script src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js"  data-dojo-config="usePlainJson: true, isDebug: false"></script>
<script>
	window.onload=function(){
		function showMailingPopUp() {
			require(
			    ["mojo/signup-forms/Loader"],
			    function(L) {
			      L.start({"baseUrl":"mc.us4.list-manage.com","uuid":"91363270e58a57510d5d933c6","lid":"b2d7dd4078"})
			    }
			);
			document.cookie = 'MCPopupClosed=;path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC;';
			document.cookie = 'MCPopupSubscribed=;path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC;'; 
		}
		document.getElementById("open-popup").addEventListener("click", function(){
			showMailingPopUp();
		})
	}
</script>

</body>
</html>