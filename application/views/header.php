<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
  <title><?php echo $title; ?></title>
  <meta name="generator" content="Simple Blog">
  <meta name="keywords" content="<?php $keywords; ?>">
  <meta name="description" content="<?php $description; ?>">
  <meta name="author" content="<?php $author; ?>">
  <base href="<?php $base_url; ?>" target="_blank">
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/blog_layout.css">

  <?php if ($style_override['apply']) { ?>
  <style type="text/css">
    <?php echo $style_override['header_background'] ? '#header { background-color:' . $style_override['header_background'] . ';}' : ''; ?>
    <?php echo $style_override['header_font'] ? '#header h1 { font-family:' . $style_override['header_font'] . ';}' : ''; ?>
    <?php echo $style_override['header_font_size'] ? '#header h1 { font-size:' . $style_override['header_font_size'] . ';}' : ''; ?>
    <?php echo $style_override['panel_background'] ? '#panel { background-color:' . $style_override['panel_background'] . ';}' : ''; ?>
    <?php echo $style_override['content_background'] ? '#content { background-color:' . $style_override['content_background'] . ';}' : ''; ?>
    <?php echo $style_override['page_background'] ? 'body { background-color:' . $style_override['page_background'] . ';}' : ''; ?>
    <?php echo $style_override['footer_background'] ? '#footer { background-color:' . $style_override['footer_background'] . ';}' : ''; ?>
    <?php echo $style_override['footer_font'] ? '#footer h1, #footer h2 { font-family:' . $style_override['footer_font'] . ';}' : ''; ?>
    <?php echo $style_override['footer_font_size'] ? '#footer h1, #footer h2 { font-size:' . $style_override['footer_font_size'] . ';}' : ''; ?>
  </style>
  <?php } ?>
</head>

<body>

<div id="page">

  <div id="header"><h1><?php echo $title; ?></h1></div>