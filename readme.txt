=== Plugin Name ===
Contributors: LL19.com
Donate link: http://www.ll19.com/
Tags: tooltips
Requires at least: 2.5
Tested up to: 2.6.1
Stable tag: 1.2.4

== Description ==

Add title tooltips in your wordpress.

== Installation ==

Upload `wp_title_tooltips` to the `/wp-content/plugins/` directory. 
Change <?php the_title(); ?> to <?php wpttt_the_title(); ?>. 
Place <?php glll_wpttt(); ?> in your templates~ 
For example <h3><a href="<?php the_permalink() ?>"><?php wpttt_the_title(); ?></a></h3><?php glll_wpttt(); ?>.



