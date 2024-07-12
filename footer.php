<footer class="footer-area">
		<div class="container-fluid">			
			<div class="row">
				<div class="col-md-12 text-center copyright wow fadeIn">
					<p>
					<?php 
					    $copyright_text = get_theme_mod('footer_text_settings');
                        if( !empty( $copyright_text ) ){
					      echo ( get_theme_mod('footer_text_settings') );
                        }
					?>
				</p>
				</div><!-- copyright -->
			</div><!-- /.row -->			
		</div><!-- /.container-fluid -->		
	</footer><!-- footer-area -->

	<!-- END-FOOTER -->


<?php
	 wp_footer();
?>
	 
</body>

</html>
