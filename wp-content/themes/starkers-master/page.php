<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="main">
  <article>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <!--<h2><?php the_title(); ?></h2>-->
      <?php the_content(); ?>
    <?php endwhile; ?>
  </article>
  <aside>
    <?php wp_nav_menu( array( 'menu_class' => 'sidebar-menu' ) ); ?>
    <?php if (is_tree(34)) { ?>
      <img src="/ensenda/wp-content/themes/starkers-master/images/technology-sidebar.jpg"/>
      <p>"Flexible, Scalable and Cost Effective delivery solutions"
        <a class="leaf" href="/delivery-overview/delivery-services"><b>More</b></a>
      </p>
    <?php } ?>
    <?php if (is_tree(44)) { ?>
      <img src="/ensenda/wp-content/themes/starkers-master/images/partners-sidebar.jpg"/>
      <p>“Ensenda Modules saved the distributor 14% on their transportation spend and provided a foundation for future service enhancements”
        <a class="leaf" href="/technology/payment-processing"><b>More</b></a>
      </p>
      <a class="smartway" href="http://epa.gov/smartway" target="_blank"></a>
    <?php } ?>
  </aside>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>