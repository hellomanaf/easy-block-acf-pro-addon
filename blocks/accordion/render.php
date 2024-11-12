<?php

/**
 * Location Accordion Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
 
// Create id attribute allowing for custom "anchor" value.
//$block['id']
$id = 'eg-accordion-block';
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'eg-location-accordion cd-section';
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
        <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo esc_url(EG_PLUGIN_URL); ?>/blocks/accordion/images/preview.png" alt="Preview">
    </figure>
    <?php return;
} 
?>
<!-- Location Accordion Block start -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  <?php if(get_field('remove_top_padding')): ?> remove-top-padding<?php endif; ?> <?php if(get_field('remove_bottom_padding')): ?> remove-bottom-padding<?php endif; ?>">
    <div class="container">
        <?php if(get_field('accordion_title')): ?>
            <div class="eg-location-accordion-block-header">
                <h2><?php the_field('accordion_title'); ?></h2>
            </div>
        <?php endif; ?>
        <div class="eg-location-accordion-block-content">
            <div  class="eg-location-accordion-outer">
            <?php 
            $check = true;
            if( have_rows('locations') ): while( have_rows('locations') ): the_row();  ?>
                <div class="eg-location-accordion-each <?php if($check): echo "eg-location-accordion-active"; endif; ?>">
                    <div class="eg-location-accordion-each-title">
                        <?php if(get_sub_field('accordion_title')): ?>
                            <h6><?php the_sub_field('accordion_title'); ?></h6>
                        <?php endif; ?>
                    </div>
                    <div class="eg-location-accordion-each-content" <?php if($check): echo "style='display:block;'"; endif; $check = false; ?>>
                        <?php if(get_sub_field('accordion_content')): ?>
                            <p><?php the_sub_field('accordion_content'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php 
            endwhile; endif; ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>

<!-- Location Accordion Block end -->