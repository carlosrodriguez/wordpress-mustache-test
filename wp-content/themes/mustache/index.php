<?php
define('BASE_PATH', dirname(__FILE__)); 

include(BASE_PATH."/mustache.php");

global $post;
global $handlebars;

wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'handlebars', get_bloginfo( 'stylesheet_directory' ) . '/js/handlebars.js',
  null,
  null,
  false
);

the_post();
get_header();

?>

<div id="primary">
  <div id="content" role="main">

      <h1>Test</h1>

      <div id="team-member">
        <?php
          $m = new Mustache;
          $t = file_get_contents(BASE_PATH.'/views/posts.js');
          echo $m->render($t, array('planet' => 'World!'));

          //echo $m->render('Hello {{planet}}', array('planet' => 'World!'));
        ?>
      </div>

  </div>
</div>

<!-- Our Mustache Template -->
<script id="post-template" type="text/x-handlebars-template">
  <?php 
  $handlebars = true; 
   
  ?>
</script>

<?php get_footer(); ?>