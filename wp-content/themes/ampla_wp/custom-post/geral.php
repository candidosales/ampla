<?php


function save_field($event_field) {
    global $post;
 
    if(isset($_POST[$event_field])) {
        update_post_meta($post->ID, $event_field, $_POST[$event_field]);
    }
}