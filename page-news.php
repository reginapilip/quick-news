<?php
/**
 * This is a template just for the recent news
 * 
 * It is following the template hierarchy of a single page:
 * 
 * 1. custom template file – The page template assigned to the page. See 
 * get_page_templates().
 * 2. (you are here) page-{slug}.php – If the page slug is recent-news, WordPress will look to use page-recent-news.php.
 * 4. page-{id}.php – If the page ID is 6, WordPress will look to use page-6.php.
 * 5. page.php
 * 6. singular.php
 * 7.index.php
 */

$context = Timber::context();

// query to pull in most recent news
$query = array(
    'post_type' => 'post',
    'order_by' => 'ID',
    'order' => 'DESC',
    'posts_per_page' => '12'
);
$context['posts'] = new Timber\Postquery($query);

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
// updated hierarchy to read page templates from pages folder and to not prefix file name with 'page-...'
// original code: 
// Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );
Timber::render( array( 'pages/' . $timber_post->post_name . '.twig', 'page.twig' ), $context );
