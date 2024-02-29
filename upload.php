<?php
session_start();
$msg = null;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['uploadBtn']) and $_POST['uploadBtn'] == 'vUpload' ){
        if(isset($_FILES['uploadedFile']) and !empty($_FILES['uploadedFile'])){
            $fileName = $_FILES['uploadedFile']['name'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileNameSeprate = explode('.',$fileName);
            $fileExtetion = strtolower(end($fileNameSeprate));
            $newFileName = md5(time() . $fileName).'.' . $fileExtetion;
            $allowedFileExtention = ['jpg','jpeg','gift','doc','zip','rar','srt'];
            if(in_array($fileExtetion,$allowedFileExtention)){
                
                $uploadFileDir = 'upload/';
                $destPath = $uploadFileDir . $newFileName ;
                if(move_uploaded_file($fileTmpPath,$destPath)){
                    echo  $msg = "file upolad shode!";

                }else{
                    echo  $msg = "file upload nashod";

                }

            }else{
              echo  $msg = "file mored nazar baraye upload mojaz nmibashad";

            }

        }else{
             $msg = "lotfan file ra entekhab konid";
            }
        

    }
}
$_SESSION['msg'] = $msg;
header("Location:index.php");
