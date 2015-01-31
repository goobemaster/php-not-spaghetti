<?php if ($blog->published) { ?>
<div class="blog" id="blog_<?php echo $blog->id; ?>">
  <aside>
    <div>
    <time datetime="<?php echo $blog->created; ?>"><?php echo strftime('%Y', strtotime($blog->created)) . '<br/>' . strftime('%B', strtotime($blog->created)); ?></time>
    <dl>
      <dt>Author:</dt><dd><a href="mailto:<?php echo $author_email; ?>"><?php echo $author; ?></a></dd>
      <dt>Created:</dt><dd><?php echo strftime('%x %X', strtotime($blog->created)); ?></dd>
      <?php if ($blog->created != $blog->modified) { ?>
      <dt>Modified:</dt><dd><?php echo strftime('%x %X', strtotime($blog->modified)); ?></dd>
      <?php } ?>
      <dt>Hits:</dt><dd><?php echo $blog->hits; ?></dd>
      <?php if ($blog->tags) { ?>
      <dt>Tags:</dt><?php echo tag_list($blog->tags); ?>
      <?php } ?>
    </dl>
    </div>
  </aside>
  <article>
    <h1><img src="media/images/post-icon.png" alt="<?php $blog->title; ?>" title="<?php $blog->title; ?>"/><?php echo $blog->title; ?></h1>
    <?php echo $blog->content; ?>
  </article>
</div>
<?php } ?>