<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Game Changers
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="logo"><a href="http://www.davidson.edu/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/game-changers-logo.svg" /></a><br /><br /><a href="http://www.davidson.edu/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/logo.png" /></a></div>
	</footer><!-- #colophon -->
	<footer class="social-footer">
		<div class="content-area">
			<div class="grid">
				<div class="block-3">
					<h4>Davidson College</h4>
					<a href="https://www.google.com/maps/place/405+N+Main+St,+Davidson,+NC+28036/@35.502236,-80.847517,15z/data=!4m2!3m1!1s0x8856aa49e090efa1:0x56849f03463a31a7" target="_blank">405 N. Main St. Davidson NC</a>
				</div>
				<div class="block-3">
					<h4>Contact Davidson</h4>
					Call <a href="tel:7048942000">704 894.2000</a>
				</div>
				<div class="block-3">
					<h4>Follow Davidson</h4>
					<div class="social-icons">
						<a href="https://twitter.com/DavidsonCollege" target="_blank"><i class="fa fa-twitter"></i></a>
						<a href="https://www.facebook.com/davidsoncollege.nc" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="http://instagram.com/davidsoncollege/" target="_blank"><i class="fa fa-instagram"></i></a>
						<a href="http://www.youtube.com/DavidsonCollegeNC" target="_blank"><i class="fa fa-youtube"></i></a>
						<a href="https://www.flickr.com/photos/davidson-college" target="_blank"><i class="fa fa-flickr"></i></a>
						<a href="https://www.linkedin.com/edu/school?id=19961&trk=edu-cp-title" target="_blank"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!--GameChangersScriptsStart--><script src="<?php echo get_stylesheet_directory_uri(); ?>/build/js/main.min.js"></script><!--GameChangersScriptsEnd-->


<div class="easy-modal" id="modal">
	<?php echo do_shortcode('[contact-form-7 id="6" title="Contact form 1"]'); ?>

</div>
</body>
</html>
