<?php get_header(); ?>

<?php 
  if(isset($_POST['modification_user'] )){

    $user_id = $_POST['id'];
    $organization = $_POST['organization'];
    $civilite = $_POST['civilite'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $user_email = $_POST['user_email'];
    $phone = $_POST['phone'];
    $fonction = $_POST['fonction'];
    $expertise = $_POST['expertise'];
    $picture = $_FILES['picture'];
    $view_email = $_POST['view_email'];
    $view_phone = $_POST['view_phone'];


    if (  empty( $organization ) || empty( $civilite ) || empty( $last_name ) || empty( $first_name ) || empty( $user_email ) || empty( $phone ) || empty( $fonction ) || empty( $expertise )  ) {
      echo 'Veuillez remplir tous les champs avec (*)';
    }else{
      echo '
      <style>
      .form_user {
        opacity: 0;
      }
      </style>';

    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
    update_user_meta( $user_id, 'civilite', $_POST['civilite'] );
    update_user_meta( $user_id, 'first_name', $_POST['first_name'] );
    update_user_meta( $user_id, 'last_name', $_POST['last_name'] );
    update_user_meta( $user_id, 'user_email', $_POST['user_email'] );
    wp_update_user( array( 'ID' => $user_id, 'user_email' => $_POST['user_email'] ) );
    update_user_meta( $user_id, 'organization', $_POST['organization'] );
    update_user_meta( $user_id, 'phone', $_POST['phone'] );
    update_user_meta( $user_id, 'picture', $_POST['picture'] );
    update_user_meta( $user_id, 'fonction', $_POST['fonction'] );
    update_user_meta( $user_id, 'expertise', $_POST['expertise'] ); 
    update_user_meta( $user_id, 'department', $_POST['department'] ); 
    update_user_meta( $user_id, 'organisation_status', $_POST['organisation_status'] );
    update_user_meta( $user_id, 'housing_section', $_POST['housing_section'] );
    update_user_meta($user_id,'wp_user_avatar', $_FILES['picture']);
    update_user_meta( $user_id, 'view_email', $_POST['view_email'] );
    update_user_meta( $user_id, 'view_phone', $_POST['view_phone'] );
      echo'Modification réussite';
  }
  }?>
    <?php edition_profile();?>
    
<?php get_footer(); ?>