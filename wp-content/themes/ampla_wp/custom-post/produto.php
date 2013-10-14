<?php

add_action( 'init', 'create_post_type_produto' );
function create_post_type_produto() {
    register_post_type( 'produto',
        array(
            'labels' =>  array(
                'name' => _x('Produto', 'post type general name'),
                'singular_name' => _x('Produto', 'post type singular name'),
                'add_new' => _x('Adicionar Produto', 'produto'),
                'add_new_item' => __('Adicionar Produto'),
                'edit_item' => __('Editar produto'),
                'new_item' => __('Novo produto'),
                'all_items' => __('Todos produtos'),
                'view_item' => __('Ver produto'),
                'search_items' => __('Pesquisar produtos'),
                'not_found' =>  __('Nenhum produto encontrado'),
                'not_found_in_trash' => __('Nenhum produto encontrado na lixeira'),
                'parent_item_colon' => '',
                'menu_name' => 'Produtos'
                ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'has_archive' => 'produto',
            'rewrite' =>  array( 'slug'=>'produto',  
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

add_action( 'init', 'create_taxonomy' );
function create_taxonomy() {
    register_taxonomy( 'tipo_produto', array( 'produto' ), array(
        'hierarchical' => true,
        'label' => 'Tipos de Produtos',
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        "rewrite" =>  array('slug'=>'tipo_produto',  
                            'with_front'=> false)
        )
    );
    flush_rewrite_rules(false);
}

    add_action( 'admin_init', 'my_admin_produto' );
    function my_admin_produto() {
        add_meta_box( 'produto_meta_box',
            'Detalhes do produto',
            'display_produto_meta_box',
            'produto', 'normal', 'high'
            );
    }

    function display_produto_meta_box( $produto ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
        $preco          = esc_html( get_post_meta( $produto->ID, 'preco', true ) );
        $pagamento      = esc_html( get_post_meta( $produto->ID, 'pagamento', true ) );
        $embalagem      = esc_html( get_post_meta( $produto->ID, 'embalagem', true ) );
        $caracteristica = esc_html( get_post_meta( $produto->ID, 'caracteristica', true ) );
        $beneficio      = esc_html( get_post_meta( $produto->ID, 'beneficio', true ) );
        $aplicacao      = esc_html( get_post_meta( $produto->ID, 'aplicacao', true ) );
        $dimensao       = esc_html( get_post_meta( $produto->ID, 'dimensao', true ) );

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
                    <textarea id="aplicacao" cols="80" rows="8" name="aplicacao" class="textarea"><?php echo $aplicacao; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Descreva resumidamente sobre a aplicacao</p></td>
            </tr>
            <tr>
                <td>Dimensões</td>
                <td>
                    <textarea id="dimensao" cols="75" rows="8" name="dimensao" class="textarea" ><?php echo $dimensao; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Descreva resumidamente sobre a dimensão</p></td>
            </tr>
        </table>
<?php
    }
            
//Registrando o save do novo custom post
add_action( 'save_post', 'add_produto_fields', 10, 2 );
function add_produto_fields( $post_id, $post ) {
    // Check post type for movie reviews
    if ( $post->post_type == 'produto' ) {
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

add_filter( 'manage_edit-produto_columns', 'produto_list' );
function produto_list( $columns ) {
    // relabel title column
    $columns['image'] = 'Imagem';
    $columns['title'] = 'Título';
    $columns['preco'] = 'Preço';
    $columns['category'] = 'Categoria';
    $columns['date'] = 'Data';
   
    
    return $columns;
}

add_action('manage_produto_posts_custom_column', 'produto_column', 5, 2);
function produto_column($column, $id){

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
                $_taxonomy = 'tipo_produto';
                $categories = get_the_terms( $post_id, $_taxonomy );
                if ( !empty( $categories ) ) {
                    $out = array();
                    foreach ( $categories as $c )
                        $out[] = "<a href='edit.php?tipo_produto=$c->slug&post_type=produto'> " . esc_html(sanitize_term_field('name', $c->name, $c->term_id, 'category', 'display')) . "</a>";
                    echo join( ', ', $out );
                }
                else {
                    _e('Uncategorized');
                }
        break;
    }
}
