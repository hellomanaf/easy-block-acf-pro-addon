<?php

/**
 * Auto Popup Template.
 *
 * @param	array $block The block settings and attributes.
 * @param	string $content The block inner HTML (empty).
 * @param	bool $is_preview True during AJAX preview.
 * @param	(int|string) $post_id The post ID this block is saved to.
 */
 
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'auto-popup auto-popup-load';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}


// Check For A Preview Image
if (!empty($block['data']['_is_preview'])) {  ?>
    <!-- Block Preview Image -->
    <figure>
        <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo esc_url(EG_PLUGIN_URL); ?>/blocks/auto-popup/images/preview.png" alt="Preview">
    </figure>
    <?php return;
} 

$popup_content = get_field('popup_content');	
$popup_content_count = count($popup_content);
?>

<!-- Start Auto Popup Section -->      
<?php if(!empty($popup_content)) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" time="<?php the_field('popup_time_in_milliseconds'); ?>">
        <div class="auto-pupup-outer">
            <div class="auto-popup-content">
                <div class="auto-popup-close">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50">
                    <path d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"></path>
                    </svg>
                </div>
                <div class="auto-popup-content-row <?php if($popup_content_count == 1): echo 'auto-popup-content-row-single'; endif; ?>">
                    <?php foreach ($popup_content as $key => $content): ?>
                        <div class="auto-popup-content-col eg-scroll-style">
                        <?php if($content['title']): ?><h3 class="auto-popup-head"><?php echo esc_html($content['title']); ?></h3><?php endif; ?>
                        <?php echo wp_kses_post($content['content']); ?>
                    </div>					
                    <?php endforeach; ?>
                </div>
            </div>    
        </div>
    </div>
<?php endif; ?>
<!-- End Auto Popup Section -->          