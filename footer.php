<?php
/**
 *
 * Description: footer
 * Author: falcon
 * Date: 16/5/13
 * Time: 上午11:10
 *
 */
?>
<script src="<?php echo get_template_directory_uri(); ?>/static/basket.js"></script>
<script>
basket.require({ url: '<?php echo get_template_directory_uri(); ?>/dist/Diaspora.css', unique: 20,  execute: false })
        .then(function(responses) {
    _stylesheet.appendStyleSheet(responses[0], function() {});
            basket.require({ url: '<?php echo get_template_directory_uri(); ?>/static/jquery.min.js', unique: 10 })
                .then(function() {
        basket.require({ url: '<?php echo get_template_directory_uri(); ?>/dist/plugin.js', unique: 10 })
                        .then(function() {
            basket.require({ url: '<?php echo get_template_directory_uri(); ?>/dist/Diaspora.js', unique: 15})
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