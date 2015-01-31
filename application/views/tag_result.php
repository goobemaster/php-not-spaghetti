<?php if ($result->published) { ?>
  <div class="blog" id="blog_<?php echo $result->id; ?>">
    <article>
      <h1><a href="<?php echo link_to_post($result->id, $result->title); ?>"><img src="media/images/post-icon.png" alt="<?php $result->title; ?>" title="<?php $result->title; ?>"/><?php echo $result->title; ?></a></h1>
      <?php echo tag_list($result->tags, 'div'); ?>
    </article>
  </div>
<?php } ?>