<?php

/**
 * Hero Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
 
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
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
      <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo esc_url(EG_PLUGIN_URL); ?>/blocks/hero-banner/images/preview.png" alt="Preview">
  </figure>
  <?php return;
} ?>
<!-- hero banner start -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" <?php if (get_field('banner_height_in_pixels')): ?> style="height: <?php the_field('banner_height_in_pixels'); ?>" <?php endif; ?>>
    <div class="hero-bg" 
      <?php if(!get_field('banner_video_mp4')): ?><?php if(get_field('banner_image')): ?>style="background-image: url(<?php the_field('banner_image'); ?>);"<?php endif; ?><?php endif; ?>>
      <?php if(get_field('banner_image_mobile') && !get_field('banner_video_mp4')): ?>
        <div class="hero-mobile-bg" style="background-image: url(<?php the_field('banner_image_mobile'); ?>);"></div>  
      <?php endif; ?>

      <?php if(get_field('banner_video_mp4')): ?>
      <video id="banner-video" x-data="setVideo" loop muted webkit-playsinline playsinline autoplay> 
        <source src="<?php the_field('banner_video_mp4'); ?>" type="video/mp4">
        Your browser does not support HTML5 video.
      </video>
      <?php endif; ?>
      
      <?php if(get_field('banner_title') || get_field('banner_content')): ?>
        <?php if(empty(get_field('banner_video_mp4'))) : ?>
            <div class="hero-outer-overlay">
        <?php endif; ?>
              <div class="hero-overlay">
                <div class="container">
                  <?php if(get_field('banner_title')): ?>
                    <h2 style="color:<?php the_field('banner_text_color'); ?>"><?php the_field('banner_title'); ?></h2>
                  <?php endif; ?>
                  <?php if(get_field('banner_content')): ?>
                    <p style="color:<?php the_field('banner_text_color'); ?>"><?php the_field('banner_content'); ?></p>
                  <?php endif; ?>
                </div>
              </div>
        <?php if(empty(get_field('banner_video_mp4'))) : ?>
            </div>
        <?php endif; ?>
      <?php endif; ?>
      
    </div>
</section>

<?php if(get_field('banner_height_for_mobile')): ?>
  <style>
  @media only screen and ( max-width: 768px) {
      section.hero {
          height: <?php the_field('banner_height_for_mobile'); ?> !important;
      }
  }
  </style>
<?php endif; ?>
<!-- hero banner end -->