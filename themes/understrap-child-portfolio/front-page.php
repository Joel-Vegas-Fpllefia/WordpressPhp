<?php
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$wrapper_id = 'front-page-wrapper';
?>

<div class="wrapper" id="<?php echo esc_attr( $wrapper_id ); ?>">

  <div class="<?php echo esc_attr( $container ); ?>" id="content">

    <div class="row">
      <div class="col-md-12 content-area" id="primary">

        <main class="site-main" id="main" role="main">

          <?php
          // (Futuro) HERO VIDEO
          // get_template_part('global-templates/hero', 'video');
          ?>

          <?php
          // CONTENIDO EDITABLE DE LA HOME (Gutenberg)
          while ( have_posts() ) {
            the_post();
            get_template_part( 'loop-templates/content', 'page' );

          }
          ?>

          <!-- SECCIÓN OBLIGATORIA: DESTACADOS -->
          <section class="featured-projects my-5">
            <div class="d-flex justify-content-between align-items-end mb-3">
              <div>
                <h2 class="h4 fw-bold mb-1">Proyectos destacados</h2>
                <p class="text-muted mb-0">Marcados con ACF (destacado_home).</p>
              </div>
              <a class="btn btn-outline-primary" href="<?php echo esc_url( home_url('/proyectos') ); ?>">
                Ver todos
              </a>
            </div>
          


  <div class="row">
              <?php
              $destacados_query = new WP_Query([
                'post_type'      => 'proyecto',
                'posts_per_page' => 3,
                'meta_key'       => 'destacado_home',
                'meta_value'     => '1',
              ]);
              if ( $destacados_query->have_posts() ) :
                while ( $destacados_query->have_posts() ) :
                  $destacados_query->the_post();
                  get_template_part( 'loop-templates/content', 'proyecto' );
                endwhile;
                wp_reset_postdata();
              else :
                echo '<p>No hay proyectos destacados todavía.</p>';
              endif;
              ?>
            </div>
          </section>
        </main>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
