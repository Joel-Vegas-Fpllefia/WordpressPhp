<?php
/**
 * Partial template for displaying single Proyecto
 *
 * @package Understrap Child Portfolio
 */

defined( 'ABSPATH' ) || exit;

$cliente = function_exists('get_field') ? get_field('cliente') : '';
$img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>

<article <?php post_class('single-proyecto'); ?> id="post-<?php the_ID(); ?>">

  <!-- Imagen destacada grande -->
  <?php if ( $img ) : ?>
    <div class="mb-4">
      <img
        src="<?php echo esc_url( $img ); ?>"
        alt="<?php echo esc_attr( get_the_title() ); ?>"
        class="img-fluid rounded shadow-sm w-100">
    </div>
  <?php endif; ?>

  <!-- Cabecera del proyecto -->
  <header class="mb-4">

    <h1 class="fw-bold mb-2"><?php the_title(); ?></h1>

    <?php if ( $cliente ) : ?>
      <p class="text-muted mb-2">
        <strong>Cliente:</strong> <?php echo esc_html( $cliente ); ?>
      </p>
    <?php endif; ?>

    <?php if ( has_excerpt() ) : ?>
      <p class="lead text-muted mb-0"><?php the_excerpt(); ?></p>
    <?php endif; ?>

  </header>

  <hr class="my-4">

  <!-- Contenido largo (detalle) -->
  <div class="entry-content">
    <?php
    the_content();
    understrap_link_pages();
    ?>
  </div>

  <hr class="my-5">

  <!-- Navegación simple -->
  <div class="d-flex justify-content-between">
    <div>
      <?php previous_post_link('%link', '← Proyecto anterior'); ?>
    </div>
    <div>
      <a class="btn btn-outline-primary" href="<?php echo esc_url( home_url('/proyectos') ); ?>">
        Volver a Proyectos
      </a>
    </div>
    <div>
      <?php next_post_link('%link', 'Proyecto siguiente →'); ?>
    </div>
  </div>

</article>
