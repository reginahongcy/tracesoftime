
<?php
/*
The template for displaying the map
*/
get_header();
wp_enqueue_scripts();
?>
<!--body-->
[wp_mapit_map id="372"]
<div class="mapid"></div>
<script src="<?php echo get_stylesheet_directory_uri()?>/js/tile.js"></script>

<?php
get_footer();
?>