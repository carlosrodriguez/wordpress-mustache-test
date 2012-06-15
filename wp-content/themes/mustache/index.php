<?php
define('BASE_PATH', dirname(__FILE__)); 

include(BASE_PATH."/mustache.php");

global $post;

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

$content = new Template();

wp_enqueue_script( 'jquery');
wp_enqueue_script( 'mustache', get_bloginfo( 'stylesheet_directory' ) . '/js/mustache.js',
  null,
  null,
  false
);

?>

<div id="primary">
  <div id="content" role="main">

        <?php

          $data = array(
            'title' => get_the_title(),
            'content' => get_the_content()
          );

          echo $content->render('/views/posts.js', $data);

          $d = $content->render('/views/posts-alternative.js', $post);
          echo $d;

        ?>

        <a href="#" class="test">Load content</a>

        <div class="content-loader"></div>

  </div>
</div>


<?php get_footer(); ?>

<script>
var $ = jQuery;
$(document).ready(function(){
  $(".test").on('click', function(){
    console.log('click');
    $.ajax({
      url: "<?php echo bloginfo('template_url'); ?>/views/posts.js",
      dataType: 'html',
      success: function(template) { 
        console.log('test');
        var view = {
          title: 'JS title',
          content: 'JS content'
        }

        var output = Mustache.render(template, view);
        console.log(template, output);

        $(".content-loader").html(output);
      },
      error: function(xhr, ajaxOptions, thrownError){
        console.log(xhr.status);
        console.log(thrownError);
        console.log('error');
      }
    });
  })
})
</script>