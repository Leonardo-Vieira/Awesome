<?php
    session_start();
    include 'dbh.php';

    $statusMsg = '';
    $fileName = basename($_FILES["file"]["name"]);
    $fileTmpName = $_FILES["file"]["tmp_name"];

    $fileExt = explode('.', $fileName);
    $fileAtualExt = strtolower(end($fileExt));
    $fileNameNew = uniqid('', true) . "." . $fileAtualExt;
    $targetFilePath = "../uploads/animes/" . $fileNameNew;

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        $allowedType = array('jpg', 'png', 'jpeg');  
        if(in_array($fileType, $allowedType)){
            if(move_uploaded_file($fileTmpName, $targetFilePath)){
                $insert = $conn->query("INSERT INTO animes (animes_file_name, animes_uploaded_on) VALUES ('".$fileNameNew."', NOW())");
                if($insert){
                    
                    echo "sucess";
                    echo "O Upload foi feito com sucesso!";
                    
                } else {
                    
                    echo "fail";
                    $statusMsg = "O Upload da imagem falho, porfavor tente novamente!";
                    
                }
            } else {
                echo "error";
                $statusMsg = "Ocorreu um erro a fazer o Upload da imagem!";
                
            }
        } else {
            echo "type";
            $statusMsg = "As únicas imagens que pode dar Upload são do tipo JPG, JPEG e PNG!";
            
        }
    }else{
        echo "s_file";
        $statusMsg = "Porfavor selecione um ficheiro!";
        
    }
    header('Location: ../animes.php');
    echo $statusMsg;
    echo '<script src="aa.js"></script>';
    exit();
?>