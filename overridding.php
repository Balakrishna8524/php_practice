<?php
   class parentaa{
       
        function printthis(){
            echo 'parent';
        }
   }

   class child extends parentaa{
        function printthis(){
            echo 'child';
        }
   }

   $c = new child;
   echo $c->printthis();

   
?>