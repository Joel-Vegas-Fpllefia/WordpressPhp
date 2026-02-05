<?php
/**
 * Partial template for displaying a Proyecto (card)
 *
 * @package Understrap Child Portfolio
 */

defined( 'ABSPATH' ) || exit;

$cliente = function_exists('get_field') ? get_field('cliente') : '';
$img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
?>

<article <?php post_class('col-12 col-md-6 col-lg-4 mb-4'); ?> id="post-<?php the_ID(); ?>">

  <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">

    <div class="card h-100 shadow-sm">

      <?php if ( $img ) : ?>
        <img
          class="card-img-top"
          src="<?php echo esc_url( $img ); ?>"
          alt="<?php echo esc_attr( get_the_title() ); ?>">
      <?php endif; ?>

      <div class="card-body d-flex flex-column">

        <h3 class="h5 mb-1"><?php the_title(); ?></h3>

        <?php if ( $cliente ) : ?>
          <p class="text-muted mb-2">
            <strong>Cliente:</strong> <?php echo esc_html( $cliente ); ?>
          </p>
        <?php endif; ?>
        <?php if ( has_excerpt() ) : ?>
          <p class="text-muted mb-3">
            <!-- probamos the content a ver que pasa ….  -->
             <?php the_excerpt(); ?>
          </p>
        <?php endif; ?>
	 <!-- probamos the content a ver que pasa ….comentad el if has_excerpt  -->


      </div>

    </div>

  </a>

</article>
