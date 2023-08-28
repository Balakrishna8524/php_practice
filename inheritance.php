<?php
   class fruit{
       
        function desciption(){
            echo 'this is fruit';
        }
   }

   class mango extends fruit{
        function about(){
            echo 'this is mango';
        }
   }

   $m = new mango;
   echo $m->desciption();
   echo '<br>';
   echo $m->about();



   

   
?>