<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Forbes2022 */

// Our sidebars appear just above the footer except for on larger screens where
// we actually have room to position them on the sides.
?>
	</main><!-- .site-main -->
	<?php get_template_part( 'template-parts/sidebars' ); ?>
	<footer id="page-footer">
		<div>
			© Forbes Library<br>
			20 West St., Northampton MA 01060 | Phone: <a href="tel:+1-413-587-1011">413-587-1011</a> | text/SMS: <a href="sms:+1-413‑570‑0444">413‑570‑0444</a><br>
			Forbes Library is a 501(c)(3) nonprofit organization: EIN&nbsp;04‑6004208<br>
			<a class="no-print" href="https://forbeslibrary.org/info/hours/">Library Hours</a>
		</div>
		<div class="social-links no-print">
			<a href="https://www.facebook.com/Forbes.Library" class="icon-facebook color-icon large-icon"><span class="screen-reader-text">Facebook: Like us!</span></a>
			<a href="https://twitter.com/ForbesLibrary" class="icon-twitter color-icon large-icon"><span class="screen-reader-text">Twitter: Follow us!</span></a>
			<a href="https://www.flickr.com/photos/forbeslibrary/" class="icon-flickr color-icon large-icon"><span class="screen-reader-text">Flickr: See our photostream</span></a>
			<a href="https://www.youtube.com/user/ForbesLibrary" class="icon-youtube color-icon large-icon"><span class="screen-reader-text">YouTube: See our promotions and videos of our programs on our YouTube channel</span></a>
			<a href="https://instagram.com/forbeslibrary?ref=badge" class="icon-instagram color-icon large-icon"><span class="screen-reader-text">Instagram: See our Pictures on Instragram Page</span></a>
			<a href="https://open.spotify.com/user/f4gshqcfxfi37nwus12y334d6?si=Hwq0zuJ0Qi-D4YnFc8y-qA" class="icon-spotify color-icon large-icon"><span class="screen-reader-text">Spotify: Listen to our playlists</span></a>
		</div>
	</footer>

<?php get_template_part( 'template-parts/libraryh3lp' ); ?>
<?php wp_footer(); ?>

</body>
</html>
