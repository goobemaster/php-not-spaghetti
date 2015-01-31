<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
  <title><?php echo $title; ?></title>
  <meta name="generator" content="Simple Blog">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="author" content="<?php echo $author; ?>">
  <base href="<?php echo $base_url; ?>" target="_self">
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <link rel="license" href="https://github.com/goobemaster/php-simple-blog/blob/master/LICENSE">
  <link rel="help" href="https://github.com/goobemaster/php-simple-blog">

  <link rel="shortcut icon" href="media/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="media/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/blog_layout.css">
  <link rel="stylesheet" href="css/blog_entry.css">
  <link rel="stylesheet" href="css/nav.css">

  <?php if ($style_override['apply']) { ?>
  <style type="text/css">
    <?php echo $style_override['header_background'] ? 'header { background-color:' . $style_override['header_background'] . ';}' : ''; ?>
    <?php echo $style_override['header_font'] ? 'header h1 { font-family:' . $style_override['header_font'] . ';}' : ''; ?>
    <?php echo $style_override['header_font_size'] ? 'header h1 { font-size:' . $style_override['header_font_size'] . ';}' : ''; ?>
    <?php echo $style_override['panel_background'] ? 'nav { background-color:' . $style_override['panel_background'] . ';}' : ''; ?>
    <?php echo $style_override['content_background'] ? '#content { background-color:' . $style_override['content_background'] . ';}' : ''; ?>
    <?php echo $style_override['page_background'] ? 'body { background-color:' . $style_override['page_background'] . ';}' : ''; ?>
    <?php echo $style_override['footer_background'] ? '#footer { background-color:' . $style_override['footer_background'] . ';}' : ''; ?>
    <?php echo $style_override['footer_font'] ? '#footer h1, #footer h2 { font-family:' . $style_override['footer_font'] . ';}' : ''; ?>
    <?php echo $style_override['footer_font_size'] ? '#footer h1, #footer h2 { font-size:' . $style_override['footer_font_size'] . ';}' : ''; ?>
    <?php echo $style_override['aside_background'] ? '.blog aside div { border:1px solid ' . $style_override['aside_background'] . ';}' : ''; ?>
    <?php echo $style_override['aside_background'] ? '.blog aside div time { background-image:linear-gradient(60deg, ' . $style_override['aside_background'] . ', ' . $style_override['aside_background'] . ');}' : ''; ?>
    <?php echo $style_override['aside_font'] ? '.blog aside { font-family:' . $style_override['aside_font'] . ';}' : ''; ?>
    <?php echo $style_override['aside_font_size'] ? '.blog aside { font-size:' . $style_override['aside_font_size'] . ';}' : ''; ?>
    <?php echo $style_override['panel_font'] ? 'nav, nav h1, nav h2 { font-family:' . $style_override['panel_font'] . ';}' : ''; ?>
    <?php echo $style_override['tag_background'] ? '.tags .tag { background-color:' . $style_override['tag_background'] . '; border-color:' . $style_override['tag_background'] . ';}' : ''; ?>
    <?php echo $style_override['tag_color'] ? '.tag { color:' . $style_override['tag_color'] . ';}' : ''; ?>
    <?php echo $style_override['link_color'] ? 'a, a:visited { color:' . $style_override['link_color'] . ';}' : ''; ?>
  </style>
  <?php } ?>
</head>

<body>

<div class="page"><header><a href="home/"><h1><img src="media/images/logo.png" alt="Logo" title="Logo"/><?php echo $title; ?></h1></a></header></div>

<div class="page">
