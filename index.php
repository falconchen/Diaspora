<?php require_once('config.php'); ?>

<?php get_header(); ?>

<div class="nav">
<?php wp_nav_menu( array( 'theme_location' => 'menu', 'container' => '', 'fallback_cb' => '' ) ); ?>
<p>&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>. Powered by WordPress</p>
</div>

<div id="container">	

    <?php if (have_posts()) : $count = 0;  while (have_posts()) : the_post(); $count++; if( $count <= 1 ): ?>

	<?php $cover = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'cover'); ?>
	
	<div id="screen">
        <div id="mark">
            <div class="layer" data-depth="0.4">
                <img id="cover" crossorigin="anonymous" src="<?php echo $cover[0] ?>" width="<?php echo $cover[1] ?>" height="<?php echo $cover[2] ?>"/>
            </div>
        </div>

        <div id="vibrant">
            <svg viewBox="0 0 2880 1620" height="100%" preserveAspectRatio="xMaxYMax slice">
				<polygon opacity="0.7" points="2000,1620 0,1620 0,0 600,0 "/>
			</svg>
            <div></div>
        </div>

        <div id="header"><div>
            <a class="<?php if (LOGO_FONT) { echo 'icon-logo'; } else { echo 'image-logo'; } ?>" href="<?php bloginfo('url');?>"></a>
            <div class="icon-menu switchmenu"></div>
        </div></div>
        <div id="post0">
            <p><?php the_time('F j, Y'); ?></p>
            <h2><a data-id="<?php the_ID() ?>" class="posttitle" href="<?php the_permalink(); ?>" /><?php the_title(); ?></a></h2>
            <p><?php the_excerpt() ?></p>
        </div>
	</div>

	<div style="display: none;">
	    <?php get_template_part( 'post' ); ?>
	</div>

    <div id="primary">

    <?php else : ?>

    <?php get_template_part( 'post' ); ?>

    <?php endif; endwhile; endif; ?>

    </div>
    
    <div id="pager"><?php next_posts_link(('加载更多')); ?></div>
  
</div>
<div id="preview" class="trans"></div>
<script src="<?php echo get_template_directory_uri(); ?>/static/basket.js?000"></script>
<script>
    basket.require({ url: '<?php echo get_template_directory_uri(); ?>/dist/Diaspora.css', unique: 15,  execute: false })
        .then(function(responses) {
            _stylesheet.appendStyleSheet(responses[0], function() {});
            basket.require({ url: '<?php echo get_template_directory_uri(); ?>/static/jquery.min.js', unique: 10 })
                .then(function() {
                    basket.require({ url: '<?php echo get_template_directory_uri(); ?>/dist/plugin.js', unique: 10 })
                        .then(function() {
                            basket.require({ url: '<?php echo get_template_directory_uri(); ?>/dist/Diaspora.js', unique: 12 })
                                .then(function() {
                                    if (!window.$ || !window.DP) {
                                        localStorage.clear()
                                    }
                                })
                        })
                })
        });
</script>
</body>
</html>
