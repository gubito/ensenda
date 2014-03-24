<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section>
<?php if ( have_posts() ): ?>
<hr class="separator first" />
<div class="lastword"></div>
<hr />
<div class="main">
<?php while ( have_posts() ) : the_post(); ?>
  <article>
    <?php  if ( has_post_thumbnail() ) { ?><a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail(array(100,100)); } ?></a>
    <h3 class="post-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
    <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
    <div class="category-list">In
      <?php
        $categories = get_the_category();
        $separator = ', ';
        $output = '';
        if($categories){
          foreach($categories as $category) {
            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
          }
          echo trim($output, $separator);
        }
      ?>
    </div>
    <br /><br />
    <?php the_content(); ?>
  </article>
  <hr />

<?php endwhile; ?>
<?php else: ?>
  <h2>No posts to display</h2>
<?php endif; ?>

</div><!-- /main -->

<div class="aside">
  <h5>About this Blog</h5>
  <p> This blog is written by Rob Howard, Founder and CEO of GrandJunction. It's a place to share observations based on 15 years of experience in the rapidly evolving local delivery industry. Thanks for reading.</p>

  <hr />
  <ul class="category-sidebar">
    <?php wp_list_categories('orderby=name&show_count=1&use_desc_for_title=0&exclude=32'); ?>
  </ul>

  <hr />
  <h5>Get the Latest News By</h5>
  <a class="twitter-icon" href="http://twitter.com/@GrandJunctionLD" target="_blank">Twitter</a>
  <a class="linkedin-icon" href="http://www.linkedin.com/company/3313748?trk=tyah&trkInfo=tas%3Agrandjunc%2Cidx%3A1-1-1" target="_blank">LinkedIn</a>
  <a class="rss-icon" href="http://www.lastwordonlastmile.com/feed/" target="_blank">RSS</a>

  <hr />
  <ul class="category-sidebar">
    <li>Popular Posts
      <ul>
        <?php $my_query = new WP_Query('category_id=32&showposts=3'); ?>
          <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
              <?php the_title(); ?>
            </a></li>
          <?php endwhile; ?>
      </ul>
    </li>
  </ul>

  <hr />
  <div id="mailchimpsf_widget-2" class="widget clearfix widget_mailchimpsf_widget">
    <h5 class="widgettitle">Get the Lastest Post by Email</h5>
    <div id="mc_signup">
      <form method="post" action="#mc_signup" id="mc_signup_form">
        <input type="hidden" id="mc_submit_type" name="mc_submit_type" value="js">
        <input type="hidden" name="mcsf_action" value="mc_submit_signup_form">
        <input type="hidden" id="_mc_submit_signup_form_nonce" name="_mc_submit_signup_form_nonce" value="f39117834a">		
        <div class="mc_form_inside">
          <div class="updated" id="mc_message"></div><!-- /mc_message -->
          <div class="mc_merge_var">
            <label for="mc_mv_EMAIL" class="mc_var_label mc_header mc_header_email">Email Address<span class="mc_required">*</span></label>
            <input type="text" size="18" placeholder="" name="mc_mv_EMAIL" id="mc_mv_EMAIL" class="mc_input">
          </div><!-- /mc_merge_var -->
          <div class="mc_merge_var">
            <label for="mc_mv_NAME" class="mc_var_label mc_header mc_header_text">Name<span class="mc_required">*</span></label>
            <input type="text" size="18" placeholder="" name="mc_mv_NAME" id="mc_mv_NAME" class="mc_input">
          </div><!-- /mc_merge_var -->
          <div class="mc_merge_var">
            <label for="mc_mv_ACCOUNT" class="mc_var_label mc_header mc_header_text">Company<span class="mc_required">*</span></label>
            <input type="text" size="18" placeholder="" name="mc_mv_ACCOUNT" id="mc_mv_ACCOUNT" class="mc_input">
          </div><!-- /mc_merge_var -->
          <div id="mc-indicates-required">* = required field</div><!-- /mc-indicates-required -->
          <div class="mc_signup_submit">
            <input type="submit" name="mc_signup_submit" id="mc_signup_submit" value="Subscribe" class="button">
          </div><!-- /mc_signup_submit -->
          <div id="mc_unsub_link" align="center">
            <a href="http://us7.list-manage.com/unsubscribe/?u=2321b2373b4285aa26ddb0ccc&amp;id=2c6ad49922" target="_blank">unsubscribe from list</a>
          </div><!-- /mc_unsub_link -->
        </div><!-- /mc_form_inside -->
      </form><!-- /mc_signup_form -->
    </div><!-- /mc_signup_container -->
    <span class="seperator extralight-border"></span>
  </div><!-- /mailchimpsf_widget-2 -->
</div><!-- /aside -->

</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>