<?php
    session_start();
    include 'dbh.php';

    $statusMsg = '';
    $fileName = basename($_FILES["file"]["name"]);
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $gender = $_POST["gender"];
    $user = $_SESSION['u_id'];

    $n_files = "SELECT COUNT(*) FROM wallpapers WHERE wp_user";
    $result = mysqli_query($conn, $n_files);
    $row = mysqli_fetch_assoc($result);

    if($_SESSION['u_id']==1){
        
        $row = 0;
        
    } 

    if($row >= 20){

        echo "Colocou o máximo de imagens possiveis!";

    }else{

        $fileExt = explode('.', $fileName);
        $fileAtualExt = strtolower(end($fileExt));
        $fileNameNew = uniqid('', true) . "." . $fileAtualExt;
        $targetFilePath = '../utilizadores/'.$_SESSION["u_id"].'_'.$_SESSION["u_username"].'/' . $fileNameNew;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]) && !empty($gender)){
            $allowedType = array('jpg', 'png', 'jpeg');  
            if(in_array($fileType, $allowedType)){
                if(move_uploaded_file($fileTmpName, $targetFilePath)){

                    $insert = $conn->query("INSERT INTO wallpapers (wp_file_name, wp_uploaded_on, wp_category, wp_user) VALUES ('".$fileNameNew."', NOW(),'".$gender."','".$user."')");
                    if($insert){

                        echo "sucess";
                        $statusMsg = "O Upload foi feito com sucesso!";

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
    }
        
    echo $statusMsg;
    header('Location: ../perfil.php');
    exit();
?>