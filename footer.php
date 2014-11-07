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
		<div class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/game-changers-logo.svg" /></div>
	</footer><!-- #colophon -->
	<footer class="social-footer">
		<div class="content-area">
			<div class="grid">
				<div class="block-3">
					<h4>Davidson College</h4>
					405 N. Main St.
					Davidson NC
				</div>
				<div class="block-3">
					<h4>Contact Davidson</h4>
					Call 704 894.2000
				</div>
				<div class="block-3">
					<h4>Follow Davidson</h4>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!--gulpScriptsStart edited by gulpfile.js--><script src="<?php echo get_stylesheet_directory_uri(); ?>/build/js/main.min.js"></script><!--gulpScriptsEnd-->


<div class="easy-modal" id="modal">
	<div class="header">
		<h3>Recommend a Game Changer</h3>
	</div>
	<form action="">
		<div class="txt">
			<label for="username">First Name</label>
			<input type="text" name="" id="username">
		</div>
		<div class="txt">
			<label for="email">Last Name</label>
			<input type="text" name="" id="email">
		</div>
		<div class="txt">
			<label for="about">About</label>
			<textarea name="" id="about"></textarea>
		</div>
		<br />
		<div class="btn clearfix">
			<a class="close button red" href="#">Sign Up</a>
			<a class="close cancel button red" href="#">Cancel</a>
		</div>
	</form>
</div>
</body>
</html>
