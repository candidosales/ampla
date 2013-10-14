<?php

add_action( 'init', 'create_post_type_oferta' );
function create_post_type_oferta() {
    register_post_type( 'oferta',
        array(
            'labels' =>  array(
                'name' => _x('Oferta', 'post type general name'),
                'singular_name' => _x('Oferta', 'post type singular name'),
                'add_new' => _x('Adicionar Oferta', 'produto'),
                'add_new_item' => __('Adicionar Oferta'),
                'edit_item' => __('Editar oferta'),
                'new_item' => __('Novo oferta'),
                'all_items' => __('Todas ofertas'),
                'view_item' => __('Ver oferta'),
                'search_items' => __('Pesquisar ofertas'),
                'not_found' =>  __('Nenhuma oferta encontrada'),
                'not_found_in_trash' => __('Nenhuma oferta encontrada na lixeira'),
                'parent_item_colon' => '',
                'menu_name' => 'Ofertas da semana'
                ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'has_archive' => 'oferta',
            'rewrite' =>  array( 'slug'=>'oferta',  
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

add_action( 'init', 'create_taxonomy_oferta' );
function create_taxonomy_oferta() {
    register_taxonomy( 'tipo_oferta', array( 'oferta' ), array(
        'hierarchical' => true,
        'label' => 'Tipos de Ofertas',
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        "rewrite" =>  array('slug'=>'tipo_oferta',  
                            'with_front'=> false)
        )
    );
    flush_rewrite_rules(false);
}

    add_action( 'admin_init', 'my_admin_oferta' );
    function my_admin_oferta() {
        add_meta_box( 'oferta_meta_box',
            'Detalhes da oferta',
            'display_oferta_meta_box',
            'oferta', 'normal', 'high'
            );
    }

    function display_oferta_meta_box( $oferta ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
        $preco          = esc_html( get_post_meta( $oferta->ID, 'preco', true ) );
        $pagamento      = esc_html( get_post_meta( $oferta->ID, 'pagamento', true ) );
        $embalagem      = esc_html( get_post_meta( $oferta->ID, 'embalagem', true ) );
        $caracteristica = esc_html( get_post_meta( $oferta->ID, 'caracteristica', true ) );
        $beneficio      = esc_html( get_post_meta( $oferta->ID, 'beneficio', true ) );
        $aplicacao      = esc_html( get_post_meta( $oferta->ID, 'aplicacao', true ) );
        $dimensao       = esc_html( get_post_meta( $oferta->ID, 'dimensao', true ) );

        ?>
        <table>
            <tr>
                <td>Preço</td>
                <td>
                    <input type="text" id="preco" name="preco" value="<?php echo $preco; ?>"/>
                    <div id="chars"></div>
                </td>
                <td><p>Ex: 89,90</p></td>
            </tr>
            <tr>
                <td>Outra forma de pagamento</td>
                <td>
                    <input type="text" id="pagamento" name="pagamento" value="<?php echo $pagamento; ?>" />
                    <div id="chars"></div>
                </td>
                <td><p>Ex: ou em até 2x de R$ 44,90</p></td>
            </tr>
            <tr>
                <td>Embalagem</td>
                <td>
                    <textarea id="embalagem" cols="80" rows="8" name="embalagem" class="textarea" ><?php echo $embalagem; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Descreva resumidamente sobre a embalagem</p></td>
            </tr>
            <tr>
                <td>Características</td>
                <td>
                    <textarea id="caracteristica" cols="80" rows="8" name="caracteristica" class="textarea" ><?php echo $caracteristica; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Descreva resumidamente sobre a caracteristica</p></td>
            </tr>
            <tr>
                <td>Benefícios</td>
                <td>
                    <textarea id="beneficio" cols="80" rows="8" name="beneficio" class="textarea" ><?php echo $beneficio; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Descreva resumidamente sobre os benefícios</p></td>
            </tr>
            <tr>
                <td>Aplicação</td>
                <td>
                    <textarea id="aplicacao" cols="80" rows="8" name="aplicacao" class="textarea" ><?php echo $aplicacao; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Descreva resumidamente sobre a aplicacao</p></td>
            </tr>
            <tr>
                <td>Dimensões</td>
                <td>
                    <textarea id="dimensao" cols="80" rows="8" name="dimensao" class="textarea" ><?php echo $dimensao; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Descreva resumidamente sobre a dimensão</p></td>
            </tr>
        </table>
<?php
    }
            
//Registrando o save do novo custom post
add_action( 'save_post', 'add_oferta_fields', 10, 2 );
function add_oferta_fields( $post_id, $post ) {
    // Check post type for movie reviews
    if ( $post->post_type == 'oferta' ) {
        // Store data in post meta table if present in post data
        save_field("preco");
        save_field("pagamento");
        save_field("embalagem");
        save_field("caracteristica");
        save_field("beneficio");
        save_field("aplicacao");
        save_field("dimensao");
    }
}

add_filter( 'manage_edit-oferta_columns', 'oferta_list' );
function oferta_list( $columns ) {
    // relabel title column
    $columns['image'] = 'Imagem';
    $columns['title'] = 'Título';
    $columns['preco'] = 'Preço';
    $columns['category'] = 'Categoria';
    $columns['date'] = 'Data';
   
    
    return $columns;
}

add_action('manage_oferta_posts_custom_column', 'oferta_column', 5, 2);
function oferta_column($column, $id){

    switch($column){
    case 'image':         
             if ( has_post_thumbnail() ) { 
                    the_post_thumbnail('produto-thumb-1'); 
                } 
        break;
    case 'preco':
              echo get_post_meta($id, 'preco', true);
        break;
    case 'category':
                $_taxonomy = 'tipo_oferta';
                $categories = get_the_terms( $post_id, $_taxonomy );
                if ( !empty( $categories ) ) {
                    $out = array();
                    foreach ( $categories as $c )
                        $out[] = "<a href='edit.php?tipo_oferta=$c->slug&post_type=oferta'> " . esc_html(sanitize_term_field('name', $c->name, $c->term_id, 'category', 'display')) . "</a>";
                    echo join( ', ', $out );
                }
                else {
                    _e('Uncategorized');
                }
        break;
    }
}
