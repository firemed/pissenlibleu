<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8" />
        <title><?php wp_title(); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
        <?php wp_head(); ?>
	</head>
    
    <body <?php body_class(); ?>>
    	<div class="main">
        	<header>
            	<h1><a><?php bloginfo('name'); ?></a></h1>
                <h2><?php bloginfo('description'); ?></h2>
            </header>