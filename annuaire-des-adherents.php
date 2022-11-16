<?php
/**
 * Plugin Name: Annuaire des adhérents
 * Plugin URI:  https://www.web-wave.fr
 * Description: Plugin gérant les adhérents de votre club.
 * Version:     1.0.1
 * Author:      Web-Wave
 * Author URI:  https://www.web-wave.fr
 * Text Domain: ada
 */

/** Include des pages */
include('includes/functions.php');
include('includes/page_liste_des_adherents.php');
include('includes/page_adherents.php');
include('includes/page_des_options.php');
include('includes/page_profile_des_adherents.php');

// Hook pour template formulaire d'inscription
add_filter('theme_page_templates','my_template_register',10,3);
add_filter('template_include','my_template_select', 99);
//  Hook pour template formulaire de connexion
add_filter('theme_page_templates','my_template_register2',10,3);
add_filter('template_include','my_template_select2', 99);
//  Hook pour template page liste des adherents
add_filter('theme_page_templates','my_template_register3',10,3);
add_filter('template_include','my_template_select3', 99);
//  Hook pour template page liste des adherents
add_filter('theme_page_templates','my_template_register4',10,3);
add_filter('template_include','my_template_select4', 99);
//  Hook pour ajout des liens css
add_action( 'wp_enqueue_scripts', 'add_link_css' );
//  Hook pour fonction pour enregistrer les choix de l'administrateur
add_action( 'edit_user_profile_update', 'save_the_validation' );
//  Hook pour fonction Voir la page liste des membre
add_shortcode('membre', 'membre_connect');
// Hook pour bloquer la connexion compte en cours de validation
add_action('wp_login', 'block_the_connection',10,2);
//affichage adherent
add_shortcode('membre', 'membre_connect2');
//hook admin submenu
add_action('admin_menu', 'membership_directory_admin');
//Hook edit le profil pour la validation de l'admin
add_action( 'show_user_profile', 'validate_user' );
add_action( 'edit_user_profile', 'validate_user' );
add_action( 'edit_user_profile_update', 'edit_member_page' );

?>
