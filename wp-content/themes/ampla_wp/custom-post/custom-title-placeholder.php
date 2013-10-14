<?php

function change_default_title( $title ){
         $screen = get_current_screen();
         if  ( $screen->post_type == 'filial' ) {
              return 'Digite o nome da Filial';
         }
         if  ( $screen->post_type == 'oferta' || $screen->post_type == 'produto' ) {
              return 'Digite o nome do Produto';
         }
         if  ( $screen->post_type == 'vendedor' ) {
              return 'Digite o nome do Vendedor';
         }
         if  ( $screen->post_type == 'publicidade' ) {
              return 'Digite o nome do Parceiro';
         }
         if  ( $screen->post_type == 'post' ) {
              return 'Digite o título da notícia';
         }
    }
add_filter( 'enter_title_here', 'change_default_title' );