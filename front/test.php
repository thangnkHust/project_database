<?php 
    $ketqua_array = [];
    for($i = 1; $i < 5; $i++){
        if(isset($_GET["ques$i"])){
            array_push($ketqua_array, $_GET["ques$i"]);
        }
    }
    print_r($ketqua_array);
?>