<?php
   class test{
       
        function __call($f,$a){
            if($f=='hello'){
                if(count($a) ==0){
                    echo 0;
                }

                if(count($a) == 1){
                    echo 'one';
                }
            }
        }
   }

   $t= new test;
   echo $t->hello(1);

   
?>