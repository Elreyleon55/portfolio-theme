<?php

/**
 * The template for displaying the home page
 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme

 * The template for displaying the Home Page.
 *
 * @Kaleb https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SCH_School_Theme

 */

get_header();
?>


<main id="primary" class="site-main">

  <section class="home-page">
    <article class="name-cta-home">
      <h1>
        <?php
        the_content();
        ?>
      </h1>
      <h2>What if we could develope a better world</h2>;
    </article>


    <?php
    ?>

    <article class="Featured-works-home">
      <?php
      $args = array(
        'post_type'     => 'post',
        'posts_per_page' => 3,
      );
      $blog_query  = new WP_Query($args);
      if ($blog_query->have_posts()) {
        while ($blog_query->have_posts()) {
          $blog_query->the_post();
      ?>
          <article>
            <a href=" <?php the_permalink(); ?> ">
              <?php the_post_thumbnail('lastest-blog-post')  ?>
              <h3 class="article-title"><?php the_title(); ?></h3>
            </a>
          </article>
      <?php

        }
        wp_reset_postdata();
      }
      ?>
    </article>
  </section>

  <section class="all-my-works-page">
    <article class="articles">
      <?php
      $args = array(
        'post_type'     => 'post'
      );
      $blog_query  = new WP_Query($args);
      if ($blog_query->have_posts()) {
        while ($blog_query->have_posts()) {
          $blog_query->the_post();
      ?>
          <article>
            <a href=" <?php the_permalink(); ?> ">
              <?php the_post_thumbnail('lastest-blog-post')  ?>
              <h3 class="article-title"><?php the_title(); ?></h3>
            </a>
            <div class="works describtion">
              <?php the_content(); ?>
            </div>
          </article>
      <?php

        }
        wp_reset_postdata();
      }
      ?>
    </article>
  </section>

  <section class="contact-page">
    <article>
      <?php
      $contact_page = get_post(2);

      if ($contact_page && !is_wp_error($contact_page)) {
        // Display the title and content of the Contact page
        // echo '<h2>' . $contact_page->post_title . '</h2>';
      ?>
        <div class="contact-page-content">;
          <?php
          echo apply_filters('the_content', $contact_page->post_content);
          ?>
        </div>;
      <?php
      } else {
        // If the Contact page doesn't exist, show an error
        echo '<p>Contact page not found.</p>';
      }

      ?>
    </article>
  </section>


</main><!-- #primary -->

<?php
get_footer();

?>