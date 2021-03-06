<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WGI Informer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header grid-container">

    <?php
      /* If this is the front page, don't output the page title */
      if (!is_front_page()) {
        the_title( '<h1 class="entry-title">', '</h1>' );
      }
    ?>

  </header><!-- .entry-header -->

  <div class="entry-content">

    <?php
      $page_id = strtolower(apply_filters('the_title', get_the_id())); // Get the page ID
      $page_name = ''; // Initialize variable to hold page name

      /* Use switch on page ID to set it's name */
      switch ($page_id) {
        case 4:
          $page_name = 'home';
          break;
        case 6:
          $page_name = 'news';
          break;
        case 8:
          $page_name = 'events';
          break;
        case 10:
          $page_name = 'photos';
          break;
        case 16:
          $page_name = 'offices';
          break;
        case 1077:
          $page_name = 'spotlights';
          break;
      }

      /* Check if a template part exists for this page name, and if it does, load it */
      if (locate_template('template-parts/content_wgiinformer-' . $page_name . '.php') != '') {
        get_template_part('template-parts/content_wgiinformer', $page_name);
      }
      /* Otherwise, just load the default content of the page */
      else {
        echo '<div class="grid-container">'; // Output a grid-container wrapper to constrain max-width
        the_content();
        wp_link_pages( array(
          'before' => '<div class="page-links">' . __( 'Pages:', 'wgiinformer' ),
          'after'  => '</div>',
        ) );
        echo '</div>';
      }
    ?>

  </div><!-- .entry-content -->
</article><!-- #post-## -->
