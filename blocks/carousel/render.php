<?php

/**
 * Easy Block Carousel Block Template.
 *
 * @param	array $block The block settings and attributes.
 * @param	string $content The block inner HTML (empty).
 * @param	bool $is_preview True during AJAX preview.
 * @param	(int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'eg-carousal-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if(get_field('block_id')) {
    $id = get_field('block_id');
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'eg-carousel-slider-section';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Check For A Preview Image
if (!empty($block['data']['_is_preview'])) {  ?>
    <!-- Block Preview Image -->
    <figure>
        <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo esc_url(EG_PLUGIN_URL); ?>/blocks/carousel/images/preview.png" alt="Preview">
    </figure>
    <?php return;
} ?>

<!-- carousel start -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if (get_field('hide_pager')) : ?>hide-pager<?php endif; ?> <?php if (get_field('hide_controls')) : ?>hide-controls<?php endif; ?> <?php if (get_field('remove_top_padding')) : ?> remove-top-padding<?php endif; ?> <?php if (get_field('remove_button_padding')) : ?> remove-bottom-padding<?php endif; ?>">

    <?php if (get_field('title')) : ?>
        <?php if (!get_field('hide_container')) : ?>
            <div class="container">
        <?php endif; ?>
            <div class="section-title">
                <h2><?php the_field('title') ?></h2>
            </div>
        <?php if (!get_field('hide_container')) : ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="eg-carousel-slider-section-in">

    <?php if (!get_field('hide_container')) : ?>
        <div class="container">
    <?php endif; ?>
            <div class="eg-carousel-slider">
                <div class="eg-carousel-slider-prev"></div>
                <div class="eg-carousel-slider-next"></div>
                <?php if( have_rows('news_and_events') ): ?>
                    <ul class="cS-hidden" number_of_slides=<?php if (get_field('number_of_slider')) : the_field('number_of_slider'); else : echo "4"; endif; ?> slide_speed=<?php if (get_field('slide_speed')) : the_field('slide_speed'); else : echo "2000"; endif; ?>  slide_auto_play=<?php if (get_field('slide_auto_play')) : echo "true"; else : echo "false"; endif; ?>>
                        <?php
                        while( have_rows('news_and_events') ) : the_row(); ?>
                            <li>
                                <div class="eg-carousel-slider-each">
                                    <div class="eg-carousel-slider-each-img" <?php if(get_field('slide_image_height')): ?>style="height: <?php the_field('slide_image_height'); ?>"<?php endif; ?>>
                                        <img src="<?php the_sub_field('news_and_events_image'); ?>" alt="<?php echo esc_html(get_sub_field('news_and_events_title')); ?>">
                                    </div>
                                    <?php if(get_sub_field('news_and_events_title') || get_sub_field('news_and_events_description')): ?>
                                    <div class="eg-carousel-slider-each-content scroll-style-n">
                                        <?php if(get_sub_field('news_and_events_title')): ?>
                                            <h4 <?php if(!get_sub_field('news_and_events_description')): ?>class="no-border-no-padding"<?php endif; ?>>
                                                <?php the_sub_field('news_and_events_title'); ?>
                                            </h4>
                                        <?php endif; ?>
                                        <?php the_sub_field('news_and_events_description'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(!get_field('hide_slide_footer')): ?>
                                    <div class="eg-carousel-slider-each-footer" <?php if (get_sub_field('news_and_events_footer_color')) : ?>style="background-color: <?php the_sub_field('news_and_events_footer_color'); ?>;" <?php endif; ?>>
                                        <?php if(get_sub_field('news_and_events_button_label')): ?>
                                            <a href="<?php the_sub_field('news_and_events_button_url'); ?>" target="_blank">
                                                <?php the_sub_field('news_and_events_button_label'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php
                        endwhile; ?>
                    </ul>
                <?php endif; ?>

            </div>
            <div class="clear"></div>
    <?php if (!get_field('hide_container')) : ?>
        </div>
    <?php endif; ?>
    </div>
</section>
<?php if(get_field('slide_image_height_mobile')): ?>
  <style>
  @media only screen and ( max-width: 768px) {
      .eg-carousel-slider-each-img {
          height: <?php the_field('slide_image_height_mobile'); ?> !important;
      }
  }
  </style>
<?php endif; ?>
<!-- carousel end -->