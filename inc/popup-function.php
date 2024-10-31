<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['api-answer'])) {

    $title = sanitize_text_field($_POST['final-title']);
    $text = wp_kses_post($_POST['api-answer']);

    $blocks = str_replace('<p>', '<!-- wp:paragraph --><p>', $text);
    $blocks = str_replace('</p>', '</p><!-- /wp:paragraph -->', $blocks);

    $postData = array(
        'post_title' => wp_strip_all_tags($_POST['final-title']),
        'post_content' => $blocks,
        'post_status' => 'draft',
        'post_author'   => 1,
        'post_type'     => 'post'
    );

    if ( isset( $_FILES['image']) && file_exists($_FILES['image']['tmp_name'] ) ) {

        // Handle the file upload
        $file = $_FILES['image'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $file, $upload_overrides );

        if ( $movefile && ! isset( $movefile['error'] ) ) {
            // File upload was successful.
            // You can now use the uploaded file's URL in $movefile['url']
            // And, you can create the post with the uploaded image as the post thumbnail
            $post_id = wp_insert_post($postData);
            $attach_id = wp_insert_attachment( array(
                'guid'           => $movefile['url'],
                'post_mime_type' => $movefile['type'],
                'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $movefile['file'] ) ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            ), $movefile['file'], $post_id );
            $attach_data = wp_generate_attachment_metadata( $attach_id, $movefile['file'] );
            wp_update_attachment_metadata( $attach_id, $attach_data );
            set_post_thumbnail( $post_id, $attach_id );

        } else {
            // There was an error uploading the file.
            // You can access the error message in $movefile['error'].
        }
    } else {
        wp_insert_post($postData);
    }

    ?>
    <script>location.reload();</script>
    <?php

}
