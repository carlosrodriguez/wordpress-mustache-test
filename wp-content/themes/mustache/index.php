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

class Template{
  var $b = BASE_PATH;
  var $m;
  var $t;  

  function __construct(){
      $this->m = new Mustache;
   }

  function load($template){
    $this->t = file_get_contents($this->b.$template);
  }

  function render($template, $data){
    $me = $this->m;
    $this->load($template);
    return $me->render($this->t, $data);
  }
}


?>

<div id="primary">
  <div id="content" role="main">

      <?php
      // if ( have_posts() ) while ( have_posts() ) : the_post();
      ?>

        <?php

          $data = array(
            'title' => get_the_title(),
            'content' => get_the_content()
          );

          $content = new Template();
          $c = $content->render('/views/posts.js', $data);
          $d = $content->render('/views/posts-alternative.js', $data);
          
          echo $c;
          echo $d;
        ?>

      <?php
      // endwhile; endif;
      ?>

  </div>
</div>

<!-- Our Mustache Template -->
<script id="post-template" type="text/x-handlebars-template">
  <?php 
  $handlebars = true; 
   
  ?>
</script>

<?php get_footer(); ?>