<?php

add_action( 'init', 'create_post_type_filial' );
function create_post_type_filial() {
    register_post_type( 'filial',
        array(
            'labels' =>  array(
                'name' => _x('Filial', 'post type general name'),
                'singular_name' => _x('Filial', 'post type singular name'),
                'add_new' => _x('Adicionar Filial', 'filial'),
                'add_new_item' => __('Adicionar Filial'),
                'edit_item' => __('Editar filial'),
                'new_item' => __('Novo filial'),
                'all_items' => __('Todas filiais'),
                'view_item' => __('Ver filial'),
                'search_items' => __('Pesquisar filiais'),
                'not_found' =>  __('Nenhuma filial encontrada'),
                'not_found_in_trash' => __('Nenhuma filial encontrada na lixeira'),
                'parent_item_colon' => '',
                'menu_name' => 'Filiais'
                ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'has_archive' => 'filial',
            'rewrite' =>  array( 'slug'=>'filial',  
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

add_action( 'init', 'create_taxonomy_filial' );
function create_taxonomy_filial() {
    register_taxonomy( 'tipo_filial', array( 'filial' ), array(
        'hierarchical' => true,
        'label' => 'Tipos de Filiais',
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        "rewrite" =>  array('slug'=>'tipo_filial',  
                            'with_front'=> false)
        )
    );
    flush_rewrite_rules(false);
}


    add_action( 'admin_init', 'my_admin_filial' );
    function my_admin_filial() {
        add_meta_box( 'filial_meta_box',
            'Detalhes da filial',
            'display_filial_meta_box',
            'filial', 'normal', 'high'
            );
    }

    function display_filial_meta_box( $filial ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
        $endereco        = esc_html( get_post_meta( $filial->ID, 'endereco', true ) );
        $horario        = esc_html( get_post_meta( $filial->ID, 'horario', true ) );
        $telefone        = esc_html( get_post_meta( $filial->ID, 'telefone', true ) );
        $latitude      = esc_html( get_post_meta( $filial->ID, 'latitude', true ) );
        $longitude      = esc_html( get_post_meta( $filial->ID, 'longitude', true ) );
        ?>
        <table>
            <tr>
                <td>Endereço</td>
                <td>
                    <textarea id="endereco" cols="75" rows="2" name="endereco" class="textarea" ><?php echo $endereco; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Ex: Rua São Cristovão, 1267, Ininga</p></td>
            </tr>
            <tr>
                <td>Horários de Funcionamento</td>
                <td>
                    <textarea id="horario" cols="75" rows="2" name="horario"  class="textarea"><?php echo $horario; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Ex: Seg-Sexta das 8h às 18h - Sábado das 8h às 13h</p></td>
            </tr>
            <tr>
                <td>Telefones</td>
                <td>
                    <textarea id="telefone" cols="75" rows="2" name="telefone" class="textarea" ><?php echo $telefone; ?></textarea>
                    <div id="chars"></div>
                </td>
                <td><p>Ex: (86)3323-0332 - (86)3324-4342</p></td>
            </tr>
            <tr>
                <td>Latitude e Longitude</td>
                <td>
                    <input type="text" id="latitude" name="latitude" value="<?php echo $latitude; ?>" placeholder="Latitude"/>
                    <input type="text" id="longitude" name="longitude" value="<?php echo $longitude; ?>" placeholder="Longitude"/>
                </td>
                <td><p>Você encontrar as coordenadas da sua filial no Google Maps. Substitua as virgulas por pontos.</p></td>
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
}

add_filter( 'manage_edit-filial_columns', 'filial_list' );
function filial_list( $columns ) {
    // relabel title column
    $columns['image'] = 'Imagem';
    $columns['title'] = 'Título';
    $columns['endereco'] = 'Endereço';
    $columns['horario'] = 'Horário';
    $columns['telefone'] = 'Telefone';
    $columns['date'] = 'Data';
   
    
    return $columns;
}

add_action('manage_filial_posts_custom_column', 'filial_column', 5, 2);
function filial_column($column, $id){

    switch($column){
    case 'image':         
             if ( has_post_thumbnail() ) { 
                    the_post_thumbnail('filial-thumb-1'); 
                } 
        break;
    case 'endereco':
              echo get_post_meta($id, 'endereco', true);
        break;
    case 'horario':
              echo get_post_meta($id, 'horario', true);
        break;

    case 'telefone':
              echo get_post_meta($id, 'telefone', true);
        break;
    }
}