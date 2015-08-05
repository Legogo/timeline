<?php
  
  // ASYNC REQUESTS
  // action, name, data
  // ==============

  if(isset($_POST["action"])){
    $act = $_POST["action"];
    
    switch($act){
      case "edit" :

        $name = $_POST["name"];
  
        $path = "files/".$name;
        if($name == "readme") $path = $name;
        $path .= ".json";
        
        $data = file_get_contents($path);
        echo $data;

        break;
      case "update" :

        $name = $_POST["name"];
        $data = stripslashes($_POST["data"]);

        $path = "./".$name;
        if($name == "readme") $path = $name;
        $path .= ".json";

        if(strlen($data) <= 0){
          if(file_exists($path))  unlink($path);
          echo "deleted";
        }else{
         file_put_contents($path, $data);
         echo $data;
        }

        break;
    }

    die();
  }
  
?>