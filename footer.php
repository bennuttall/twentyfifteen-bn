<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action('twentyfifteen_credits'); ?>
			<a href="<?php echo esc_url(__('https://wordpress.org/', 'twentyfifteen')); ?>"><?php printf(__('Proudly powered by %s', 'twentyfifteen'), 'WordPress'); ?></a>. <a href="https://github.com/bennuttall/twentyfifteen-bn">Theme source on GitHub</a>.
		</div>
	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
