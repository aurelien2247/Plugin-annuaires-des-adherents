<?php
function my_template_array(){
    $temps = [];
    $temps['annuaire-des-adherents.php'] = 'annuaire-des-adherents';
    return $temps;
}

function my_template_register($page_templates,$theme,$post){
    $templates = my_template_array();
    foreach($templates as $tk=>$tv)
    {
        $page_templates[$tk] = $tv;
    }
    return $page_templates;
}


function my_template_select($template){
    global $post,$wp_querry,$wpdb;
    $page_temp_slug = get_page_template_slug( $post->ID );
    $templates = my_template_array();

    if(isset($templates[$page_temp_slug]))
    {
    $template = plugin_dir_path(__FILE__).'../templates/'.$page_temp_slug;
    }

    return $template;
}

/** Ajout de la template formulaire */
function my_template_array2()
{
    $temps = [];

    $temps['page-formulaire.php'] = 'page-formulaire';

    return $temps;
}

function my_template_register2($page_templates,$theme,$post)
{
    $templates = my_template_array2();

    foreach($templates as $tk=>$tv)
    {
        $page_templates[$tk] = $tv;
    }

    return $page_templates;
}


function my_template_select2($template)
{
    global $post,$wp_querry,$wpdb;

    $page_temp_slug = get_page_template_slug( $post->ID );

    $templates = my_template_array2();

    if(isset($templates[$page_temp_slug]))
    {
        $template = plugin_dir_path(__FILE__).'../templates/'.$page_temp_slug;
    }

    return $template;
}
/** Ajout de la template liste */
function my_template_array3()
{
    $temps = [];

    $temps['liste-adherent.php'] = 'liste-adherent';

    return $temps;
}

function my_template_register3($page_templates,$theme,$post)
{
    $templates = my_template_array3();

    foreach($templates as $tk=>$tv)
    {
        $page_templates[$tk] = $tv;
    }

    return $page_templates;
}


function my_template_select3($template)
{
    global $post,$wp_querry,$wpdb;

    $page_temp_slug = get_page_template_slug( $post->ID );

    $templates = my_template_array3();

    if(isset($templates[$page_temp_slug]))
    {
        $template = plugin_dir_path(__FILE__).'../templates/'.$page_temp_slug;
    }

    return $template;
}
/**profile adherent */
function my_template_array4(){
    $temps = [];
    $temps['page_profile_des_adherents.php'] = 'Page profile';
    return $temps;
}

function my_template_register4($page_templates,$theme,$post)
{
    $templates = my_template_array4();

    foreach($templates as $tk=>$tv)
    {
        $page_templates[$tk] = $tv;
    }

    return $page_templates;
}


function my_template_select4($template)
{
    global $post,$wp_querry,$wpdb;

    $page_temp_slug = get_page_template_slug( $post->ID );

    $templates = my_template_array4();

    if(isset($templates[$page_temp_slug]))
    {
        $template = plugin_dir_path(__FILE__).'../templates/'.$page_temp_slug;
    }

    return $template;
}
 /**
 * Ajoute des pages de sous-menu comptes
 */ 
function membership_directory_admin() {
    add_submenu_page(
        'users.php',
        'Page des adherents',
        'Page des adherents',
        'manage_options',
        'page_adherents',
        'edit_member_page' );
    add_submenu_page(
        'users.php',
        'Liste des organismes',
        'Liste des organismes',
        'manage_options',
        'page_liste_des_adherents',
        'edit_page_organization' );
    add_submenu_page(
        'users.php',
        'Profile des adherents',
        'Profile des adherents',
        'manage_options',
        'page_profile_des_adherents',
        'edit_page_profile' );
    add_submenu_page(
        'users.php',
        'Liste des options',
        'Liste des options',
        'manage_options',
        'page_des_options',
        'edit_page_options' );

}
 

/**********************************Ajout custom.css******************************************************/
function add_link_css() {
    wp_enqueue_style( 'custom', '/wp-content/plugins/annuaire-des-adherents/css/custom.css', true);
}


 function registration_form( $organization, $civilite, $last_name, $first_name, $email, $user_email_verif, $password,  $password2, $checkbox ) {
    echo '
    <style>
    div {
        margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
    </style>
    ';

    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
       <div>
          <h4>ORGANISME ADHÉRENTS</h4>
          <label for="organization">Organisme <strong>(*)</strong><br></label>';
 

          select_organisme(); 

       echo'</div>
       
       <div>
          <h4>MES INFORMATIONS</h4>
          <label for="civilite">Civilité <strong>(*)</strong></label>
          <select name="civilite" id="civilite-select">
             <option value="">Choix</option>
             <option value="Monsieur">Mr</option>
             <option value="Madame">Mme</option>
 
          </select>
       </div>
       
       <div>
         <label for="last_name">Nom <strong>(*)</strong></label>
         <input type="text" name="last_name" value="' . ( isset( $_POST['last_name']) ? $last_name : null ) . '">
       </div>
 
       <div>
         <label for="first_name">Prénom <strong>(*)</strong></label>
         <input type="text" name="first_name" value="' . ( isset( $_POST['first_name']) ? $first_name : null ) . '">
       </div>
 
       <div>
         <label for="email">Adresse e-mail <strong>(*)</strong></label>
         <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
       </div>
       <div>
         <label for="emailverif">Confirmation de l\'adresse e-mail <strong>(*)</strong></label>
         <input type="text" name="emailverif" value="' . ( isset( $_POST['emailverif']) ? $user_email_verif : null ) . '">
       </div>
       <div>
          <h4>MON ACCES</h4>
          <label for="password">Mon mot de passe <strong>(*)</strong></label>
          <input type="password" name="password" value="' . ( isset( $_POST['password']) ? $password : null ) . '">
          <label for="confirmPassword">Confirmer mon mot de passe <strong>(*)</strong></label>
          <input type="password" name="confirmPassword" value="' . ( isset( $_POST['confirmPassword']) ?  $password2 : null ) . '">
          <input type="checkbox" name="checkbox" value="' . ( isset( $_POST['checkbox']) ? $checkbox : null ) . '">Je certifie sur l\'honneur l\'exactitude de mes informations et accepte les Conditions Générales d\'utilisation (CGU).<strong>(*)</strong><br><br>
          <input type="button" name="buttonAnnuler" value="Annuler">
          <input type="submit" name="submit" value="Valider">
       
       </div>
    </form>';
    
 }
 
 /*Fonction pour check les erreurs et faire un retour à l'utilisateur */
 function registration_validation(  $organization, $civilite, $last_name, $first_name, $email, $user_email_verif, $password,  $password2, $checkbox )  {
    global $reg_errors;
    $reg_errors = new WP_Error;
    if (  empty( $last_name ) || empty( $first_name ) || empty( $email ) || empty( $user_email_verif ) || empty( $password ) || empty( $password2 )  ) {
       $reg_errors->add('field', 'Veuillez remplir tous les champs avec (*)');
   }
   if ( 5 > strlen( $password ) ) {
    $reg_errors->add( 'password', 'Le mot de passe doit avoir au moins 5 caractères' );
   }
   if ( !is_email( $email ) ) {
    $reg_errors->add( 'email_invalid', 'Email invalide' );
   }
   if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', 'Email deja utilisé' );
   }
   if ($email != $user_email_verif){
    $reg_errors->add( 'email_different', 'Veuillez saisir deux adresses identique.' );
   }
   if ($password != $password2) {
    $reg_errors->add( 'password_different', 'Veuillez saisir deux mot de passe identique.' );
   }
 
   if ( is_wp_error( $reg_errors ) ) {
  
    foreach ( $reg_errors->get_error_messages() as $error ) {
     
        echo '<div>';
        echo '<strong>ERREUR</strong>:';
        echo $error . '<br/>';
        echo '</div>';
         
    }
 
    }  
 }
 
 /*Fonction d'enregistrement de l'utilisateur */
 function complete_registration() {
    global $reg_errors, $first_name, $email, $password, $last_name, $organization, $civilite;
    
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
       /*var_dump("<pre>");
       var_dump($email);
 
       var_dump($first_name);
       var_dump($last_name);
       var_dump($reg_errors);
       var_dump($validation);
       die;*/
       $userdata = array(
        'user_login'        =>   $first_name,
        'first_name'        =>   $first_name,
        'last_name'         =>   $last_name,
        'description'       =>   $organization,
        'user_email'        =>   $email,
        'user_pass'         =>   $password
        );
        $user = wp_insert_user( $userdata );
        $validation = '';
        update_user_meta( $user, 'validation', $_POST['validation'] );
        update_user_meta( $user, 'organization', $_POST['organization'] );
        update_user_meta( $user, 'civilite', $_POST['civilite'] );
        update_user_meta( $user, 'phone', $_POST['phone'] );
        update_user_meta( $user, 'expertise', $_POST['expertise'] );
        update_user_meta( $user, 'fonction', $_POST['fonction'] );

         // mail à envoyer à l'admin
         $to = get_bloginfo('admin_email');
         $subject = 'Nouvel adherent';
         $message = 'Bonjour, connecte toi à l\'espace d\'administration pour valider le nouvel adherent ! <a href="'. get_admin_url('https://www.wordpress.local/') .'">Cliquez ici</a> pour voir les adhérents en attentes';
         $headers = array('Content-Type: text/html; charset=UTF-8');
         wp_mail( $to, $subject, $message, $headers);

          _e( 'Nous vous remercions pour votre inscription, celle ci est en cours de validation, nous reviendrons vers vous dès qu’elle sera confirmée, merci.'); 
        
    }       
 }
 
 function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['organization'],
        $_POST['civilite'],
        $_POST['last_name'],
        $_POST['first_name'],
        $_POST['email'],
        $_POST['emailverif'],
        $_POST['password'],
        $_POST['confirmPassword'],
        $_POST['checkbox'],
        );
         
        // sanitize user form input
        global $organization, $civilite, $last_name, $first_name, $email, $user_email_verif, $password,  $password2, $checkbox;
        $organization             =   sanitize_text_field( $_POST['organization'] );
        $civilite              =   sanitize_text_field( $_POST['civilite'] );
        $last_name                   =   sanitize_text_field( $_POST['last_name'] );
        $first_name                =   sanitize_user( $_POST['first_name'] );
        $email                 =   sanitize_email( $_POST['email'] );
        $user_email_verif      =   sanitize_email( $_POST['emailverif'] );
        $password              =   esc_attr( $_POST['password'] );
        $password2             =   esc_attr( $_POST['password2'] );
        $checkbox              =   esc_attr( $_POST['checkbox'] );
        
        
 
        // Appel la fonction complete_registration pour créer l'utilisateur
        // Seulement si il n'y a pas d'erreure dans le formulaire
        complete_registration(
        $organization,
        $civilite,
        $last_name,
        $first_name,
        $email,
        $user_email_verif,
        $password,
        $password2,
        $checkbox
        );
        

        exit;
    }

    registration_form(
       $organization,
       $civilite,
       $last_name,
       $first_name,
       $email,
       $user_email_verif,
       $password,
       $password2,
       $checkbox
        );
 }
 
 /* Fonction pour ajouter le champs select dans l'administration */
 function validate_user( $user ) {
     $validation = get_user_meta( $user->ID, 'validation');
     ?>
     <h3><?php _e('Gestion des nouveaux adhérent') ?></h3>
     <table class="form-table">

         <tr>
             <th><label for="validation"><?php _e('Validation') ?></label></th>
             <td>
                 <select name="validation" id="validation">
                   <option value="">------------------------Choix------------------------</option>
                   <option value="Accepter" <?php selected( $validation[0], "Accepter" ); ?>><?php _e('Accepter'); ?></option>
                   <option value="Refuser"  <?php selected( $validation[0], "Refuser"  ); ?>><?php _e('Refuser'); ?></option>
                 </select> 
                 <p><?php _e('Si vous refusez la demande le compte seras automatiquement suprimé') ?></p>
             </td>
         </tr>
     </table>
     <?php 
 }

 /* Fonction pour enregistrer les choix de l'administrateur */
function save_the_validation( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
    // met a jour la valeur de validation
    update_user_meta( $user_id, 'validation', $_POST['validation'] );
    //recupere les infos de l'utilisateur
    $info_user = get_userdata( $user_id);
    $user_validation = $info_user->validation;
    //Si l'utilisateur est accepté
    if($user_validation == 'Accepter'){
        $info_user = get_userdata( $user_id);
        $mail = $info_user->user_email;
        // mail à envoyer à l'utilisateur si il est valider
        $to = $mail;
        $subject = 'Réponse à votre demande';
        $message = 'Bonjour, votre compte a été accepté. Bienvenue à toi ! ';
        wp_mail( $to, $subject, $message);
        //var_dump('<pre>');
        //var_dump($mail);
        //die;

    }

    //Si l'utilisateur est Reffusé
    if($user_validation == 'Refuser'){
        $info_user = get_userdata( $user_id);
        $mail = $info_user->user_email;
        $to = $mail;
        $subject = 'Réponse à votre demande';
        $message = 'Bonjour, malheureusement vous repondez pas à notre demande... Votre compte a été suprimé ';
        wp_mail( $to, $subject, $message);

        wp_delete_user($user_id);
        //var_dump('<pre>');
        //var_dump($mail);
        //die;

    }

}
/* Bloquer compte en cours de validation*/
function block_the_connection( $user_login, $user) {

    if(!current_user_can( 'manage_options' )){
    $valider = get_user_meta( $user->ID, 'validation', true);

	if ( $valider != 'Accepter') {

       wp_logout();		
       wp_redirect( home_url() );
		exit();
	}
    }

}

/*Voir la page liste des membre si et seulement si l'utilisateur est connectés */
function membre_connect() {
    echo '
    <style>
    .profile {
        width: 22%;
        margin: 20px 66px;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        position: relative;
    }
    .container{
        margin-left: 5%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    .civilite {
        color: #0a0a0a;
        font-size: 19px;
        padding-top: 10px;
    }
    .prenom_nom {
        color: #0a0a0a;
        font-size: 19px;

    }
    .fonction{
        padding-top: 10px;
    }

    p {
        color: rgba(#0a0a0a, 0.8)
    }

    .image:hover {
        transform: scale(1.5);
        border-radius: 10px;
    }
    .ligne_horizontal {
        padding-bottom: 15px;
        padding-top: 17px;
        display: flex; 
        flex-direction: row; 
    } 

    .ligne_horizontal:before, 
    .ligne_horizontal:after { 
        content: ""; 
        flex: 1 1; 
        border-bottom: 2px solid #000; 
    }

    </style>
    <div class="container">';
    if (is_user_logged_in() ) {
        
        $view = get_users( array( 'meta_key' => array( 'validation' ) ) );
        // Array of WP_User objects.
        foreach ( $view as $user ) {
            $i = 0;
            $picture = esc_url( get_avatar_url( $user->ID ) );
            echo'
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <style>
            .image {
                width: 75px;
                height: 75px;
                background: red;
                border-radius: 50%;
                margin: 0 auto;
                position: absolute;
                right: 15px;
                top: 15px;
                transform-origin: bottom left;
                box-shadow: 0 3px 15px rgba(#0a0a0a, 0.1);
                transition: all 0.3s ease-in-out;
                
                background-image:'. $picture .';
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
            }
            .details-box {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
            }
            #btn {
                width: 30px;
                height: 30px;
                margin-left: 40%;
                border-radius: 50%;
                border: 3px solid black;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 40px;
                cursor: pointer;
                transition: all 0.2s ease;
            }
            
            #btn:hover ion-icon {
                animation: upAndDown 0.3s alternate infinite;
            }
            
            @keyframes upAndDown {
                0% {
                    transform: translateY(3px);
                }
                100% {
                    transform: translateY(-3px);
                }
            }
            
            #details {
                margin-top: 20px;
                line-height: 1.6;
                text-align: justify;
                height: 0;
                overflow: hidden;
            }
            </style>

                <div class="profile">
                    <img class="image"src="'. $picture .'"/>
                    <h8 class="civilite"> <strong>'. esc_html( $user->civilite ) .'.</strong></h8><br>
                    <h8 class="prenom_nom"> <strong>'. esc_html( $user->first_name ) .'  '. esc_html( $user->last_name ) .'</strong></h8><br>
                    <h8 class="organisme"><strong>'. esc_html( $user->organization ) .'.</strong></h8>
                    <div class="ligne_horizontal"></div>
                    <h8 class="fonction">Fonction:</h8><br>
                    <p><strong>'. esc_html( $user->fonction ) .'</strong></p>
                    <h8 class="expertise">Expertise:</h8><br>
                    <p><strong>'. esc_html( $user->expertise ) .'</strong></p>
                    <div card-id="'.$i.'" class="details-box">
                        <div card-id="'.$i.'" id="btn">
                            <ion-icon  card-id="'.$i.'" id="btn-icon" name="chevron-down"></ion-icon>
                        </div>
                    </div>
                    <div card-id="'.$i.'" id="details">
                    <h8 class="departmental_headquarters">Département du siège:</h8><br>
                    <p><strong>'. esc_html( $user->department ) .'</strong></p>
                    <h8 class="organisation_status">Statut de l\'organisme:</h8><br>
                    <p><strong>'. esc_html( $user->organisation_status ) .'</strong></p>
                    <h8 class="organisation_status">Tranche de logements:</h8><br>
                    <p><strong>'. esc_html( $user->housing_section ) .'</strong></p>
                    ';
                    if($user->view_phone ||$user->view_email != NULL){
                        echo '<div class="ligne_horizontal"></div>';

                    }
                    if($user->view_email != NULL){
                        echo'
                        <h8 class="email">E-mail:</h8><br>
                        <p><strong>'. esc_html( $user->user_email ) .'</strong></p>
                        ';
                    }
                    if($user->view_phone != NULL){
                        echo'
                        <h8 class="tel">Téléphone:</h8><br>
                        <p><strong>'. esc_html( $user->phone ) .'</strong></p>
                        ';
                    }
                     echo '
                    </div>
                    
                    <script type="text/javascript">
                    let btn = document.getElementById("btn");
                    let btnIcon = document.getElementById("btn-icon");
                    let details = document.getElementById("details");
                    console.log(btnIcon.name.card-id);
                    const toggleDetails = () => {
                        if (btnIcon.name = "chevron-down") {
                            btnIcon.name = "chevron-up";
                            details.style.height = "max-content";
                        } else {
                            btnIcon.name = "chevron-down";
                            details.style.height = 0;
                        }
                    };
                    btn.addEventListener("click", toggleDetails);

                    </script>
                </div>
            ';
            ++$i;
            

        }
    }else{
    echo ('La liste des adhérents n’est disponibles que pour les comptes actifs.');
    }
    echo '</div>';


}
/* affichage d'un formulaire d’édition de profile utilisateur */
function edition_profile(){
    if (is_user_logged_in() ) {
        $user = wp_get_current_user();

        $organization = get_user_meta( $user->id, 'organization', true);
        $last_name = get_user_meta( $user->id, 'last_name', true);
        $first_name = get_user_meta( $user->id, 'first_name', true);
        $user_email = get_user_meta( $user->id, 'user_email', true);
        $phone = get_user_meta( $user->id, 'phone', true);
        $civilite = get_user_meta( $user->id, 'civilite', true);

        echo'
        <style>
        td, th /* Mettre une bordure sur les td ET les th */{
            border: 0px solid white;     
        }

        
        </style>
        <form class="form_user" enctype="multipart/form-data" action="" method="post">
            <h1>Ma fiche adherent</h1>
            <h2>Organisme adherent</h2>';
            select_organisme();
            echo'
            <h2>Mes informations</h2>
            <table>
                <tr>
                    <th><h8>Civilite</h8></th>
                    <th><h8>Nom</h8></th>
                    <th><h8>Prenom</h8></th>
                </tr>

            <td><select name="civilite" id="civilite-select">
            <option value="Monsieur"'. selected( $civilite, "Monsieur" ) .' >Mr</option>
            <option value="Madame" '. selected( $civilite, "Madame" ) .'>Mme</option>
            </select></td>
            <td><input type="text" name="last_name" value="' . $last_name . '"></td>
            <td><input type="text" name="first_name" value="' . $first_name . '"></td>
            </table>
            
            <label>Adresse e-mail</label>
            <input type="text" name="user_email" value="' . $user_email . '">
            <p><input type="checkbox" id="view_email" name="view_email"><label for="view_email">Afficher mon adresse e-mail</label></p>
            <label>Numéro de Telephone <strong>(*)</strong></label>
            <input type="tel" id="phone" name="phone" placeholder="0X.XX.XX.XX.XX" value="' . $phone . '">
            <p><input type="checkbox" id="view_phone" name="view_phone"><label for="view_phone">Afficher mon numéro de téléphone</label></p>
            <label>Ma photo</label>
            <input type="file" id="picture" name="picture" accept="image/png, image/jpeg">
            <h2>Mon profil</h2>
            <label>Fonction <strong>(*)</strong></label>';
            select_fonction();
            echo'
            </select>
            <label>Expertise <strong>(*)</strong></label>';
            select_expertise();
            echo'
            <label>Département du siège </label>';
            select_department();
            echo'
            <label>Statut de l\'organisme </label>';
            select_status();
            echo'
            <label>Tranche de logement </label>';
            select_housing();
            echo'
            <label>(*) Champs obligatoire</label>
            <input type="hidden" name="id" value="' . $user->id . '">
            <input type="button" name="buttonAnnuler" value="Annuler">
            <input type="submit" name="modification_user" value="Valider">
        </form>
        ';

    

    }else{
    echo ('La modification de son compte adherent n’est disponibles que pour les comptes actifs.');
    }
}
/*Voir dans l'admin les utilisateurs pas acceptés */
function member_list() {

    $users = get_users();

    if($users){
        // Array of WP_User objects.
        foreach ( $users as $user ) {
        
            $validation = get_user_meta( $user->ID, 'validation', true);
            if(!$validation || $validation != 'Accepter'){
                $user_id = $user->ID;     
                $i = 1;
                echo '
                    
                    <td>'. esc_html( $user->first_name ) .';'. esc_html( $user->last_name ) .' </td>
                    <td>'. esc_html( $user->user_email ) .'</td>
                    <td>'. esc_html( $user->organization ) .'</td>
                    <td> 
                        <form action="" method="post">
                        <input type="hidden" value="'.$user_id.'" name="id" >
                        <input type="submit" value="Accepter" name="validation">
                        </form></td>
                    <td> <form action="" method="post">
                        <input type="hidden" value="'.$user_id.'" name="id" >
                        <input type="submit" value="Refuser" name="validation">
                        </form></td>
                    </tr>';

            }
        }
        if($i == 0){
            echo '
            <style>
            .titre_de_tableau{
                opacity: 0;
            }
            .td, th{
                opacity: 0;
            }
            </style>
            <div class="notice notice-success is-dismissible">
            <p>Pas de nouvel adherent !</p>
        </div>';
        }
    }
}

/*Fonction d'ajout et de suppression de champ d'organisme dans l'admin */
function organisme(){
    ?>
        <table>
                <caption class="titre_de_tableau">Modifier les organismes</caption>
                <tr>
                    <th>Champ à ajouter</th>
                    <th>Champ à Supprimer</th>
                    <th>Liste</th>
                </tr>
                    <td>
                        <form name="add" method="post">
                            <input type="text" name="add_field" size=15 placeholder="texte">
                            <input type="submit" name="add" value="Ajouter">
                        </form>
                    </td>
                    <td>
                        <form name="delete" method="post">
                            <input type="text" name="delete_field" size=15 placeholder="texte">
                            <input type="submit" name="delete" value="Supprimer">
                        </form>
                    </td>
                    <?php select_organisme(); ?>
                    <br><br>
    
    
                </form>
        </table>
    <?php 
        if(isset($_POST['add'])|| isset($_POST['delete'])){

            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            global $wpdb;

            $tablename = 'select';
            $main_sql_create = 'CREATE TABLE wp_select(
                name_of_options VARCHAR(100)
            )';
            maybe_create_table( $wpdb->prefix . $tablename, $main_sql_create );
            if(isset($_POST['add'] )){
                $add_field = $_POST['add_field'];
                $table = $wpdb->prefix.'select';
                $data = array('name_of_options' => $add_field);
                $format = array('%s');
                $wpdb->insert($table,$data,$format);
                $my_id = $wpdb->insert_id;
                echo("<meta http-equiv='refresh' content='0'>");                
            }

            if(isset($_POST['delete'] )){
                $delete_field = $_POST['delete_field'];

                $table = $wpdb->prefix.'select';
                $data = array('name_of_options' => $delete_field);
                $format = array('%s');
                $wpdb->delete($table,$data,$format);
                echo("<meta http-equiv='refresh' content='0'>");                

            }
        }
}
/*Select organisme avec les champs a afficher */
function select_organisme(){
    echo'<td>';
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        global $wpdb;
        $table_categories = $wpdb->prefix . 'select';
        $resultat = $wpdb->get_results( "SELECT * FROM $table_categories" );
        $user = wp_get_current_user();
        $organization = $user->organization;

        echo'<select name="organization" id="organization">';
        foreach($resultat as $ligne){
        echo '<option value="'. $ligne->name_of_options .'"'. selected( $organization, "'. $ligne->name_of_options .'" ) .'>'. $ligne->name_of_options .'</option>';
        }
        echo'</select>';

        echo'</td>';
}
/*Fonction permetant de voir le tableau des utilisateurs et leur renseignement */

function member_profile_list() {

    $users = get_users();
  
    if($users){
        // Array of WP_User objects.
        foreach ( $users as $user ) {
        
  
                echo '
                    <td>'. esc_html( $user->civilite ) .'</td>
                    <td>'. esc_html( $user->first_name ) .';'. esc_html( $user->last_name ) .' </td>
                    <td>'. esc_html( $user->user_email ) .'</td>
                    <td>'. esc_html( $user->organization ) .'</td>
                    <td> 
                    <form action="" method="post">
                    <input type="hidden" value="'.$user->user_email.'" name="user_email" >
                    <input type="hidden" value="'.$user->ID.'" name="id" >
                    <input type="submit" value="Modifier" name="modifier">
  
                    </form></td>
  
                    </tr>';
  
            
        }
  
    }
} 
/*Modifier les renseignement d'un utilisateur dans l'espace d'administration */  
function member_profile_list_modification($user_id) {
  
    $first_name = get_user_meta( $user_id, 'first_name', true);
    $last_name = get_user_meta( $user_id, 'last_name', true);
    $user_email = get_user_meta( $user_id, 'user_email', true);
    $civilite = get_user_meta( $user_id, 'civilite', true);
    $organization = get_user_meta( $user_id, 'organization', true);
    
    echo '
    <form action="" method="post">
      <td>
        <select name="civilite" id="civilite-select">
          <option value="">Choix</option>
          <option value="Monsieur"'. selected( $civilite, "Monsieur" ) .' >Mr</option>
          <option value="Madame" '. selected( $civilite, "Madame" ) .'>Mme</option>
        </select>
      </td>
      <td><input type="text" name="first_name" value="' . $first_name . '">;
      <input type="text" name="last_name" value="' . $last_name . '"></td>
      <td> <input type="text" name="email" value="' . $user_email . '"></td>
    <td>
      <select name="organization" id="organization">
          <option value="">Choix de l\'organisme</option>
          <option value="organisme1" '. selected( $organization, "organisme1" ) .'>Organisme 1</option>
          <option value="organisme2" '. selected( $organization, "organisme2" ) .'>Organisme 2</option>
      </select>
  
    <td> 
    
    <input type="hidden" value="'. $user_id .'" name="id">
    <input type="submit" value="Enregistrer les modifications" name="modifier_le_profile"></td>
    </form>
  
    </tr>';
        
}
/*Fonction contenant le code pour modifier chaque select */
function options(){
    echo'    
        <table>
                <caption class="titre_de_tableau">Modifier les options des differents select</caption>
                <tr>
                    <th>Nom du select</th>
                    <th>Champ à ajouter</th>
                    <th>Champ à Supprimer</th>
                    <th>Liste</th>
                </tr><tr>
                <form name="formulaire"  method="post">
                    <td><p>fonction</p></td>
                    <td>
                        <form name="add" method="post">
                            <input type="text" name="add_field" size=15 placeholder="texte">
                            <input type="submit" name="add" value="Ajouter">
                        </form>
                    </td>
                    <td>
                        <form name="delete" method="post">
                            <input type="text" name="delete_field" size=15 placeholder="texte">
                            <input type="submit" name="delete" value="Supprimer">
                        </form>
                    </td>';?>
                    <?php select_fonction(); ?>
                    <?php echo'<br><br>
    
    
                </form></tr>
                <tr>
                <form name="formulaire"  method="post">
                <td><p>Expertise</p></td>
                    <td>
                        <form name="add_expertise" method="post">
                            <input type="text" name="add_field" size=15 placeholder="texte">
                            <input type="submit" name="add_expertise" value="Ajouter">
                        </form>
                    </td>
                    <td>
                        <form name="delete_expertise" method="post">
                            <input type="text" name="delete_field" size=15 placeholder="texte">
                            <input type="submit" name="delete_expertise" value="Supprimer">
                        </form>
                    </td>';?>
                    <?php select_expertise(); ?>
                    <?php echo'<br><br>

    
                </form></tr>
                <tr>
                <form name="formulaire"  method="post">
                    <td><p>Tranche de logement</p></td>
                    <td>
                        <form name="add_housing_section" method="post">
                            <input type="text" name="add_field" size=15 placeholder="texte">
                            <input type="submit" name="add_housing_section" value="Ajouter">
                        </form>
                    </td>
                    <td>
                        <form name="delete_housing_section" method="post">
                            <input type="text" name="delete_field" size=15 placeholder="texte">
                            <input type="submit" name="delete_housing_section" value="Supprimer">
                        </form>
                    </td>';?>
                    <?php select_housing(); ?>
                    <?php echo'<br><br>

    
                </form></tr>
                <tr>
                <form name="formulaire"  method="post">
                    <td><p>Statuts de l’organisme</p></td>
                    <td>
                        <form name="add_organisation_status" method="post">
                            <input type="text" name="add_field" size=15 placeholder="texte">
                            <input type="submit" name="add_organisation_status" value="Ajouter">
                        </form>
                    </td>
                    <td>
                        <form name="delete_organisation_status" method="post">
                            <input type="text" name="delete_field" size=15 placeholder="texte">
                            <input type="submit" name="delete_organisation_status" value="Supprimer">
                        </form>
                    </td>';?>
                    <?php select_status(); ?>
                    <?php echo'<br><br>

    
                </form></tr>
                <tr>
                <form name="formulaire"  method="post">
                    <td><p>Département du siege</p></td>
                    <td>
                        <form name="add_department" method="post">
                            <input type="text" name="add_field" size=15 placeholder="texte">
                            <input type="submit" name="add_department" value="Ajouter">
                        </form>
                    </td>
                    <td>
                        <form name="delete_department" method="post">
                            <input type="text" name="delete_field" size=15 placeholder="texte">
                            <input type="submit" name="delete_department" value="Supprimer">
                        </form>
                    </td>';?>
                    <?php select_department(); ?>
                    <?php echo'<br><br>

                </form></tr>
        </table>';?>
        
    <?php 
            if(isset($_POST['add'])|| isset($_POST['delete'])){

                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
                global $wpdb;
    
                $tablename = 'fonction';
                $main_sql_create = 'CREATE TABLE wp_fonction(
                    name_of_options VARCHAR(100)
                )';
                maybe_create_table( $wpdb->prefix . $tablename, $main_sql_create );
                if(isset($_POST['add'] )){
                    $add_field = $_POST['add_field'];
                    $table = $wpdb->prefix.'fonction';
                    $data = array('name_of_options' => $add_field);
                    $format = array('%s');
                    $wpdb->insert($table,$data,$format);
                    $my_id = $wpdb->insert_id;
                    echo("<meta http-equiv='refresh' content='0'>");                
                }
    
                if(isset($_POST['delete'] )){
                    $delete_field = $_POST['delete_field'];
    
                    $table = $wpdb->prefix.'fonction';
                    $data = array('name_of_options' => $delete_field);
                    $format = array('%s');
                    $wpdb->delete($table,$data,$format);
                    echo("<meta http-equiv='refresh' content='0'>");                
    
                }
            }
            if(isset($_POST['add_expertise'])|| isset($_POST['delete_expertise'])){

                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
                global $wpdb;
    
                $tablename = 'expertise';
                $main_sql_create = 'CREATE TABLE wp_expertise(
                    name_of_options VARCHAR(100)
                )';
                maybe_create_table( $wpdb->prefix . $tablename, $main_sql_create );
                if(isset($_POST['add_expertise'] )){
                    $add_field = $_POST['add_field'];
                    $table = $wpdb->prefix.'expertise';
                    $data = array('name_of_options' => $add_field);
                    $format = array('%s');
                    $wpdb->insert($table,$data,$format);
                    $my_id = $wpdb->insert_id;
                    echo("<meta http-equiv='refresh' content='0'>");                
                }
    
                if(isset($_POST['delete_expertise'] )){
                    $delete_field = $_POST['delete_field'];
    
                    $table = $wpdb->prefix.'expertise';
                    $data = array('name_of_options' => $delete_field);
                    $format = array('%s');
                    $wpdb->delete($table,$data,$format);
                    echo("<meta http-equiv='refresh' content='0'>");                
    
                }
            }
            if(isset($_POST['add_housing_section'])|| isset($_POST['delete_housing_section'])){

                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
                global $wpdb;
    
                $tablename = 'housing';
                $main_sql_create = 'CREATE TABLE wp_housing(
                    name_of_options VARCHAR(100)
                )';
                maybe_create_table( $wpdb->prefix . $tablename, $main_sql_create );
                if(isset($_POST['add_housing_section'] )){
                    $add_field = $_POST['add_field'];
                    $table = $wpdb->prefix.'housing';
                    $data = array('name_of_options' => $add_field);
                    $format = array('%s');
                    $wpdb->insert($table,$data,$format);
                    $my_id = $wpdb->insert_id;
                    echo("<meta http-equiv='refresh' content='0'>");                
                }
    
                if(isset($_POST['delete_housing_section'] )){
                    $delete_field = $_POST['delete_field'];
    
                    $table = $wpdb->prefix.'housing';
                    $data = array('name_of_options' => $delete_field);
                    $format = array('%s');
                    $wpdb->delete($table,$data,$format);
                    echo("<meta http-equiv='refresh' content='0'>");                
    
                }
            }
            if(isset($_POST['add_organisation_status'])|| isset($_POST['delete_organisation_status'])){

                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
                global $wpdb;
    
                $tablename = 'organisation_status';
                $main_sql_create = 'CREATE TABLE wp_organisation_status(
                    name_of_options VARCHAR(100)
                )';
                maybe_create_table( $wpdb->prefix . $tablename, $main_sql_create );
                if(isset($_POST['add_organisation_status'] )){
                    $add_field = $_POST['add_field'];
                    $table = $wpdb->prefix.'organisation_status';
                    $data = array('name_of_options' => $add_field);
                    $format = array('%s');
                    $wpdb->insert($table,$data,$format);
                    $my_id = $wpdb->insert_id;
                    echo("<meta http-equiv='refresh' content='0'>");                
                }
    
                if(isset($_POST['delete_organisation_status'] )){
                    $delete_field = $_POST['delete_field'];
    
                    $table = $wpdb->prefix.'organisation_status';
                    $data = array('name_of_options' => $delete_field);
                    $format = array('%s');
                    $wpdb->delete($table,$data,$format);
                    echo("<meta http-equiv='refresh' content='0'>");                
    
                }
            }
            if(isset($_POST['add_department'])|| isset($_POST['delete_department'])){

                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
                global $wpdb;
    
                $tablename = 'department';
                $main_sql_create = 'CREATE TABLE wp_department(
                    name_of_options VARCHAR(100)
                )';
                maybe_create_table( $wpdb->prefix . $tablename, $main_sql_create );
                if(isset($_POST['add_department'] )){
                    $add_field = $_POST['add_field'];
                    $table = $wpdb->prefix.'department';
                    $data = array('name_of_options' => $add_field);
                    $format = array('%s');
                    $wpdb->insert($table,$data,$format);
                    $my_id = $wpdb->insert_id;
                    echo("<meta http-equiv='refresh' content='0'>");                
                }
    
                if(isset($_POST['delete_department'] )){
                    $delete_field = $_POST['delete_field'];
    
                    $table = $wpdb->prefix.'department';
                    $data = array('name_of_options' => $delete_field);
                    $format = array('%s');
                    $wpdb->delete($table,$data,$format);
                    echo("<meta http-equiv='refresh' content='0'>");                
    
                }
            }

    
}
/*Fonction contenant le select des fonctions et est affiher dynamiquement sur plusieurs pasge */
function select_fonction(){
    echo'<td>';
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        global $wpdb;
        $table_categories = $wpdb->prefix . 'fonction';
        $resultat = $wpdb->get_results( "SELECT * FROM $table_categories" );
        echo'<select name="fonction" id="fonction">';
        foreach($resultat as $ligne){
        echo '<option value="'. $ligne->name_of_options .'">'. $ligne->name_of_options .'</option>';
        }
        echo'</select>';

        echo'</td>';
}
/*Fonction contenant le select des expertise et est affiher dynamiquement sur plusieurs pasge */
function select_expertise(){
    echo'<td>';
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        global $wpdb;
        $table_categories = $wpdb->prefix . 'expertise';
        $resultat = $wpdb->get_results( "SELECT * FROM $table_categories" );
        echo'<select name="expertise" id="expertise">';
        foreach($resultat as $ligne){
        echo '<option value="'. $ligne->name_of_options .'">'. $ligne->name_of_options .'</option>';
        }
        echo'</select>';

        echo'</td>';
}
/*Fonction contenant le select des tranche de logement et est affiher dynamiquement sur plusieurs pasge */
function select_housing(){
    echo'<td>';
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        global $wpdb;
        $table_categories = $wpdb->prefix . 'housing';
        $resultat = $wpdb->get_results( "SELECT * FROM $table_categories" );
        echo'<select name="housing_section" id="housing_section">';
        foreach($resultat as $ligne){
        echo '<option value="'. $ligne->name_of_options .'">'. $ligne->name_of_options .'</option>';
        }
        echo'</select>';

        echo'</td>';
}
/*Fonction contenant le select des status de l'organisme et est affiher dynamiquement sur plusieurs pasge */
function select_status(){
    echo'<td>';
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        global $wpdb;
        $table_categories = $wpdb->prefix . 'organisation_status';
        $resultat = $wpdb->get_results( "SELECT * FROM $table_categories" );
        echo'<select name="organisation_status" id="organisation_status">';
        foreach($resultat as $ligne){
        echo '<option value="'. $ligne->name_of_options .'">'. $ligne->name_of_options .'</option>';
        }
        echo'</select>';

        echo'</td>';
}
/*Fonction contenant le select des sieges de departements et est affiher dynamiquement sur plusieurs pasge */
function select_department(){
    echo'<td>';
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        global $wpdb;
        $table_categories = $wpdb->prefix . 'department';
        $resultat = $wpdb->get_results( "SELECT * FROM $table_categories" );
        echo'<select name="department" id="department">';
        foreach($resultat as $ligne){
        echo '<option value="'. $ligne->name_of_options .'">'. $ligne->name_of_options .'</option>';
        }
        echo'</select>';

        echo'</td>';
}
?>