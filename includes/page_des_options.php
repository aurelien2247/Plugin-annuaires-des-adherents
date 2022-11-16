<?php
/**
 * Customisation sur l'espace admin
 * Page prncipale
 */
function edit_page_options(){
    _e( '    <div class="wrap"> <h3 class="titre">Annuaire des adherents</h3>', 'textdomain' );
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
   padding-top: 0%;

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

      '. options() .'
    </body>
  </div>';
   
} ?>