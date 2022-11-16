<?php
/**
 * affichage adherent
 */
function edit_member_page() { 
    if ( isset($_POST['validation'] ) ) {
        $user_id = $_POST['id'];
        save_the_validation( $user_id );

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
            <caption class="titre_de_tableau">Liste des adhérents</caption>

            <tr>
                <th>Prénom et Nom</th>
                <th>Email</th>
                <th>Organisme</th>
                <th>Valider l\'utilisateur</th>
                <th>Reffuser l\'utilisateur</th>
            </tr>
            <tr>';
            member_list();
    echo '

        </table>
    </body>
    </div>';
  
} 

               
?>

