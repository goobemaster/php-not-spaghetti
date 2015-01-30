<?php if ($result->published) { ?>
  <div class="blog" id="blog_<?php echo $result->id; ?>">
    <article>
      <h1><img src="media/images/post-icon.png" alt="<?php $result->title; ?>" title="<?php $result->title; ?>"/><?php echo $result->title; ?></h1>
    </article>
  </div>
<?php } ?>