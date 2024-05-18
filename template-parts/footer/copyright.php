
<section class="" style="<?php echo esc_attr($section_backg); ?>">
	<div class="copyright-outer">
		<div class="copyright">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<?php if (get_theme_mod('vw_courier_serivce_pro_footer_copyright_para') != ''): ?>
							<p class="">
								<i class="fa fa-copyright m-2"></i>
								<a target="_blank" href="https://www.vwthemes.com/"><?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_footer_copyright_para')); ?></a>
							</p>
						<?php endif; ?>
					</div>
					<div class="footersocial col-lg-6 col-md-6 col-sm-6">
						<div class="socialbox">
							<?php
							for ($i = 1; $i <= 4; $i++) {
								$icon_class = get_theme_mod('vw_courier_serivce_pro_social_icons_' . $i);
								$social_link = get_theme_mod('vw_courier_serivce_pro_social_icons_link_' . $i);
								if (!empty($icon_class)) {
									echo '<li><a target="_blank" href="' . esc_attr($social_link) . '"><i class="' . esc_attr($icon_class) . '"></i></a></li>';
								}
							}
							?>
						</div>
					</div>
					<?php if (get_theme_mod('vw_courier_serivce_pro_genral_section_show_scroll_top', true) == "1") { ?>
						<a href="javascript:" id="return-to-top"><i
								class="<?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_genral_section_show_scroll_top_icon')); ?>"></i><span
								class="screen-reader-text">
								<?php esc_html_e('Return To Top Button', 'vw-courier-serivce-pro') ?>
							</span></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>