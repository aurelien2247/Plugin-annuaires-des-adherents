<?php 
//Forcer la redirection si il y a des champs manquant sinon afficher la page
if (is_user_logged_in() && !is_admin() ) {
                $user = wp_get_current_user();
                $phone = get_user_meta( $user->ID, 'phone', true);
                $fonction = get_user_meta( $user->ID, 'fonction', true);
                $expertise = get_user_meta( $user->ID, 'expertise', true);

                if(!($phone || $fonction || $expertise) ){
                    wp_safe_redirect('"'.home_url().'/profile"');
                    exit();
                }else{
                    get_header();
                    membre_connect();
                    
                    get_footer(); 
                }
}
if(!is_user_logged_in()){
    get_header();
    membre_connect();
    get_footer();
}
?>