</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
<?php if ( is_footer_visible() ) : ?>
    <div class="mh-container">
        <?php if (is_active_sidebar('footer-1')) : ?>
            <aside class="widget-area" role="complementary">
                <?php dynamic_sidebar('footer-1'); ?>
            </aside>
        <?php endif; ?>

        <div class="site-info">
                <?php printf(esc_html__('&copy; '.date('Y').' %1$s. %2$s', 'mh-theme'), '<a href="'.esc_url(__(home_url(), 'mh-theme')). '">'.get_bloginfo('name').'</a>', ' All rights reserved.'); ?>
            
            <span class="sep"> | </span>
            <?php printf(esc_html__('%s', 'mh-theme'), 'Theme Developed by: <a href="https://mhstyle.net"> MH-Style </a>'); ?>
        </div><!-- .site-info -->
    </div><!-- .container -->
<?php endif; ?>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
