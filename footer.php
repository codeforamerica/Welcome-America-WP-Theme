		<div id="footerwrap">
			<div id="footer">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer menu') ) ?>
				<br />
		    	<div class="copyright">
		    		&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>. All Rights Reserved. &nbsp;&nbsp;&nbsp;&nbsp;Designed by <a href="http://www.osiris-inc.com">Osiris Group, Inc</a>.  &nbsp;&nbsp;&nbsp;&nbsp;Developed by <a href="http://codeforamerica.org/" title="Code for America">Code for America</a>
				</div>
				<br />
			<div id="sponsor-wrapper">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sponsors') )  ?>
				<br style="clear:both" />
			</div>
		</div>
	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->
	
</body>

</html>
