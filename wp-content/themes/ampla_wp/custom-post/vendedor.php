<?php

add_action( 'init', 'create_post_type_vendedor' );
function create_post_type_vendedor() {
    register_post_type( 'vendedor',
        array(
            'labels' =>  array(
                'name' => _x('Vendedor', 'post type general name'),
                'singular_name' => _x('Vendedor', 'post type singular name'),
                'add_new' => _x('Adicionar Vendedor', 'vendedor'),
                'add_new_item' => __('Adicionar Vendedor'),
                'edit_item' => __('Editar vendedor'),
                'new_item' => __('Novo vendedor'),
                'all_items' => __('Todos vendedores'),
                'view_item' => __('Ver vendedor'),
                'search_items' => __('Pesquisar vendedores'),
                'not_found' =>  __('Nenhum vendedor encontrado'),
                'not_found_in_trash' => __('Nenhum vendedor encontrado na lixeira'),
                'parent_item_colon' => '',
                'menu_name' => 'Vendedores'
                ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'has_archive' => 'vendedor',
            'rewrite' =>  array( 'slug'=>'vendedor',  
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

    add_action( 'admin_init', 'my_admin_vendedor' );
    function my_admin_vendedor() {
        add_meta_box( 'vendedor_meta_box',
            'Detalhes do vendedor',
            'display_vendedor_meta_box',
            'vendedor', 'normal', 'high'
            );
    }

    function display_vendedor_meta_box( $vendedor ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
        $funcao        = esc_html( get_post_meta( $vendedor->ID, 'funcao', true ) );
        $filial        = esc_html( get_post_meta( $vendedor->ID, 'filial', true ) );
        $telefone      = esc_html( get_post_meta( $vendedor->ID, 'telefone', true ) );
        ?>
        <table>
            <tr>
                <td>Função</td>
                <td>
                    <input type="text" id="funcao" name="funcao" value="<?php echo $funcao; ?>" />
                    <div id="chars"></div>
                </td>
                <td><p>Ex: Vendedor</p></td>
            </tr>
            <tr>
                <td>Filial</td>
                <td>
                    <input type="text" id="filial" name="filial" value="<?php echo $filial; ?>" />
                    <div id="chars"></div>
                </td>
                <td><p>Ex: Ampla Kennedy</p></td>
            </tr>
            <tr>
                <td>Telefone</td>
                <td>
                    <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>" />
                    <div id="chars"></div>
                </td>
                <td><p>Ex: (86) 9999.0999</p></td>
            </tr>
        </table>
<?php
    }
            
//Registrando o save do novo custom post
add_action( 'save_post', 'add_vendedor_fields', 10, 2 );
function add_vendedor_fields( $post_id, $post ) {
    // Check post type for movie reviews
    if ( $post->post_type == 'vendedor' ) {
        // Store data in post meta table if present in post data
        save_field("funcao");
        save_field("filial");
        save_field("telefone");
    }
}

add_filter( 'manage_edit-vendedor_columns', 'vendedor_list' );
function vendedor_list( $columns ) {
    // relabel title column
    $columns['image'] = 'Imagem';
    $columns['title'] = 'Título';
    $columns['funcao'] = 'Função';
    $columns['filial'] = 'Filial';
    $columns['telefone'] = 'telefone';
    $columns['date'] = 'Data';
   
    
    return $columns;
}

add_action('manage_vendedor_posts_custom_column', 'vendedor_column', 5, 2);
function vendedor_column($column, $id){

    switch($column){
    case 'image':         
             if ( has_post_thumbnail() ) { 
                    the_post_thumbnail('vendedor-thumb-1'); 
                } 
        break;
    case 'funcao':
              echo get_post_meta($id, 'funcao', true);
        break;

    case 'filial':
              echo get_post_meta($id, 'filial', true);
        break;

    case 'telefone':
              echo get_post_meta($id, 'telefone', true);
        break;
    }
}