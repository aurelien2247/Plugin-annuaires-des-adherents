<?php
/**
 * affichage profile
 */
function edit_page_profile() { 
  if(isset($_POST['modifier_le_profile'] )){
    $user_id = $_POST['id'];
    $mail = $_POST['email'];


    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
    update_user_meta( $user_id, 'civilite', $_POST['civilite'] );
    update_user_meta( $user_id, 'first_name', $_POST['first_name'] );
    update_user_meta( $user_id, 'last_name', $_POST['last_name'] );
    update_user_meta( $user_id, 'user_email', $_POST['email'] );
    wp_update_user( array( 'ID' => $user_id, 'user_email' => $_POST['email'] ) );
    update_user_meta( $user_id, 'organization', $_POST['organization'] );
  
  
  }
  _e( ' <div class="wrap"><h3 class="titre">Annuaire des adherents</h3>', 'textdomain' );
  echo '
  <style>
  body, html{
      background-color: #24262E;
      overflow-x: hidden;
  }
  .titre{
   color: white;
   font-size: 10px;
}
.nom{
    color: white;
}
.email{
   color: white;
 }
 .titre_de_tableau{
     padding-bottom: 3%;
     color: white;
     font-size: 50px;
     padding-top:3%;

 }
 .table{
   padding-top: -20%;

   width:100%
   border-collapse: collapse;
   color: white;
 }
   td, th /* Mettre une bordure sur les td ET les th */{
       border: 1px solid white;
       color: white;
       font-size: 30px;
       width:10%;
       padding: 2%;


   }

  </style>

  <body>
       <table>
           <caption class="titre_de_tableau">Modifier les profils des adherents</caption>

           <tr>
               <th>Civilité</th>
               <th>Prénom et Nom</th>
               <th>Email</th>
               <th>Organisme</th>
               <th>Modifier le profile</th>

           </tr>
           <tr>';
           if ( isset($_POST['modifier'] ) ) {
            $user_id = $_POST['id'];
            
            member_profile_list_modification($user_id);
          }else{ member_profile_list();}
          
        echo'</table>
   </body>
   </div>';
 
} 
