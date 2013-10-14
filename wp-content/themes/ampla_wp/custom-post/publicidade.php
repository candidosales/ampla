<?php

add_action( 'init', 'create_post_type_publicidade' );
function create_post_type_publicidade() {
    register_post_type( 'publicidade',
        array(
            'labels' =>  array(
                'name' => _x('Publicidade', 'post type general name'),
                'singular_name' => _x('Publicidade', 'post type singular name'),
                'add_new' => _x('Adicionar Publicidade', 'publicidade'),
                'add_new_item' => __('Adicionar Publicidade'),
                'edit_item' => __('Editar publicidade'),
                'new_item' => __('Nova publicidade'),
                'all_items' => __('Todas publicidades'),
                'view_item' => __('Ver publicidade'),
                'search_items' => __('Pesquisar publicidades'),
                'not_found' =>  __('Nenhuma publicidade encontrada'),
                'not_found_in_trash' => __('Nenhuma publicidade encontrada na lixeira'),
                'parent_item_colon' => '',
                'menu_name' => 'Publicidades'
                ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'has_archive' => 'publicidade',
            'rewrite' =>  array( 'slug'=>'publicidade',  
                'with_front'=> true,  
                'feed'=> true,  
                'pages'=> true),
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'supports' => array('title','thumbnail')
            )
);
}

add_action( 'init', 'create_taxonomy_publicidade' );
function create_taxonomy_publicidade() {
    register_taxonomy( 'tipo_publicidade', array( 'publicidade' ), array(
        'hierarchical' => true,
        'label' => 'Tipos de Publidade',
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        "rewrite" =>  array('slug'=>'tipo_publicidade',  
                            'with_front'=> false)
        )
    );
    flush_rewrite_rules(false);
}

/*
    add_action( 'admin_init', 'my_admin_publicidade' );
    function my_admin_publicidade() {
        add_meta_box( 'publicidade_meta_box',
            'Detalhes da publicidade',
            'display_publicidade_meta_box',
            'publicidade', 'normal', 'high'
            );
    }

    function display_publicidade_meta_box( $publicidade ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
        $endereco        = esc_html( get_post_meta( $filial->ID, 'endereco', true ) );
        $horario        = esc_html( get_post_meta( $filial->ID, 'horario', true ) );
        $telefone        = esc_html( get_post_meta( $filial->ID, 'telefone', true ) );
        $latitude      = esc_html( get_post_meta( $filial->ID, 'latitude', true ) );
        $longitude      = esc_html( get_post_meta( $filial->ID, 'longitude', true ) );
        ?>
        <table>
            <tr>
                <td>Imagem da publicidade</td>
                <td>
                    <input type="text" id="latitude" name="latitude" value="<?php echo $latitude; ?>" placeholder="Latitude"/>
                    <input type="text" id="longitude" name="longitude" value="<?php echo $longitude; ?>" placeholder="Longitude"/>
                </td>
                <td><p>Banner: </p></td>
            </tr>
        </table>
<?php
    }
            
//Registrando o save do novo custom post
add_action( 'save_post', 'add_filial_fields', 10, 2 );
function add_filial_fields( $post_id, $post ) {
    // Check post type for movie reviews
    if ( $post->post_type == 'filial' ) {
        // Store data in post meta table if present in post data
        save_field("endereco");
        save_field("horario");
        save_field("telefone");
        save_field("latitude");
        save_field("longitude");
    }
}*/

add_filter( 'manage_edit-publicidade_columns', 'publicidade_list' );
function publicidade_list( $columns ) {
    // relabel title column
    $columns['image'] = 'Imagem';
    $columns['title'] = 'Título';
    $columns['category'] = 'Categoria';
    $columns['date'] = 'Data';
   
    
    return $columns;
}

add_action('manage_publicidade_posts_custom_column', 'publicidade_column', 5, 2);
function publicidade_column($column, $id){

    switch($column){
    case 'image':         
             if ( has_post_thumbnail() ) { 
                    the_post_thumbnail('publicidade-thumb-1'); 
                } 
        break;
      case 'category':
                $_taxonomy = 'tipo_publicidade';
                $categories = get_the_terms( $post_id, $_taxonomy );
                if ( !empty( $categories ) ) {
                    $out = array();
                    foreach ( $categories as $c )
                        $out[] = "<a href='edit.php?tipo_publicidade=$c->slug&post_type=publicidade'> " . esc_html(sanitize_term_field('name', $c->name, $c->term_id, 'category', 'display')) . "</a>";
                    echo join( ', ', $out );
                }
                else {
                    _e('Uncategorized');
                }
        break;
    }
}