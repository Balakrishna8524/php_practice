<?php
   class test{
       function __call($n,$a){
           if($n == 'hello'){
            switch(count($a)){
                case 0: return 'nothing';
                case 1: return $a[0];
                case 2: return $a[0] + $a[1];
            }
           }
           
       }
   }

   $t = new test();
   echo $t->hello();

   echo '<br>';

   $t = new test();
   echo $t->hello(1,2);
?>