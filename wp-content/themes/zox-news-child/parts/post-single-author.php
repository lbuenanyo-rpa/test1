<?php
  $show_autor_article_option = get_field('show_autor');

  $user_avatar = "https://quenoticias.com/wp-content/uploads/2022/08/logo-quenoticias.png";
  $user_title = "Qué Noticias!";
  $user_subtitle = "REDACCIÓN";
  $user_link = "https://www.facebook.com/quenoticiasecuador";

  if($show_autor_article_option=="show"){
    $avatar_default = "/wp-content/themes/zox-news-child/images/user_avatar.png";
    $profile_pic = get_the_author_meta('profilepicture');
    $user_avatar = !empty($profile_pic) ? $profile_pic : $avatar_default;
    $user_title = get_the_author_meta('user_firstname') . " " . get_the_author_meta('user_lastname');
    $user_email = get_the_author_meta('user_email');
    $user_subtitle = $user_title;
    $user_link = null;
    $author_id = get_the_author_meta( 'ID' );
    $user_link = get_author_posts_url($author_id);
  }
?>

<div id="mvp-author-box-wrap" class="left relative">
  <div class="mvp-author-box-out right relative">
    <div id="mvp-author-box-img" class="left relative" >
      <img class="author-img-style" src="<?php print $user_avatar; ?>" alt="<?php print $user_title; ?>" >
    </div><!--mvp-author-box-img-->
    <div class="mvp-author-box-in">
      <div id="mvp-author-box-head" class="left relative">
        <span class="mvp-author-box-name left relative author-box-span" ><?php print $user_subtitle; ?></span>
        <div id="" class="left relative div-qn-author">
        <?php if($show_autor_article_option=="show"): ?>
          <div class="que-noticias-text">Qué Noticias!</div>
          <br />
          <a  class="author-email" href="<?php print $user_link; ?>" alt="<?php print $user_title; ?>" target="_blank"><?php print $user_email; ?></a>
        <?php else: ?>
          <a  class="que-noticias-text" href="<?php print $user_link; ?>" alt="<?php print $user_title; ?>" target="_blank"><?php print $user_title; ?></a>
        <?php endif; ?>
        </div><!--mvp-author-box-soc-wrap-->
      </div><!--mvp-author-box-head-->
    </div><!--mvp-author-box-in-->
  </div><!--mvp-author-box-out-->
  <div id="mvp-author-box-text" class="left relative">
    <p><?php the_author_meta('description'); ?></p>
  </div><!--mvp-author-box-text-->
</div><!--mvp-author-box-wrap-->