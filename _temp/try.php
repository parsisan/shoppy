<?php

function add(int $a, int $b)
{
    return $a + $b;
}





try {
    echo add("3","4");
}
catch(TypeError $e){
    echo $e->getMessage();
}
finally{

    echo "FINA:";
}



?>