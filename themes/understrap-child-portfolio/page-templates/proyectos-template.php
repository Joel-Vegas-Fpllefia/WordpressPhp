<?php
/**
 * Template Name: Proyectos Template
 * Template for displaying all projects del CPT "proyecto"
 *
 * @package Understrap Child Portfolio
 */

defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="proyectos-page-wrapper">

  <?php get_template_part( 'global-templates/hero', 'static-capital' ); ?>

  <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    <div class="row">

      <!-- IMPORTANTE: main debe ser una columna dentro de row -->
      <main class="site-main col-12" id="main" role="main">

        <?php
        // Contenido editable de la página (intro Gutenberg)
        while ( have_posts() ) {
          the_post();
          echo '<div class="mb-4">';
          the_content();
          echo '</div>';
        }
        ?>

        <section class="all-projects my-4">
          <div class="row">

            <?php
            $proyectos_query = new WP_Query([
              'post_type'      => 'proyecto',
              'posts_per_page' => -1,
              'orderby'        => 'date',
              'order'          => 'DESC',
            ]);

            if ( $proyectos_query->have_posts() ) :
              while ( $proyectos_query->have_posts() ) :
                $proyectos_query->the_post();
                get_template_part( 'loop-templates/content', 'proyecto' );
              endwhile;

              wp_reset_postdata();
            else :
              echo '<p>No hay proyectos todavía.</p>';
            endif;
            ?>

          </div>
        </section>

      </main>

    </div><!-- .row -->

  </div><!-- #content -->

</div><!-- #proyectos-page-wrapper -->

<?php get_footer(); ?>
