<?php

function img_load_content($id_content)
{

    //if(isset($_POST['upload_photos'])){
    // Include the database configuration file
    include_once 'conect.php';
    global $connection;

    // File upload configuration
    $targetDir = "../uploads/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if (!empty(array_filter($_FILES['photos']['name']))) {
        foreach ($_FILES['photos']['name'] as $key => $val) {
            // File upload path
            $fileName = basename($_FILES['photos']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["photos"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql
                    $insertValuesSQL .= "('" . $fileName . "', $id_content),";
                } else {
                    $errorUpload .= $_FILES['photos']['name'][$key] . ', ';
                }
            } else {
                $errorUploadType .= $_FILES['photos']['name'][$key] . ', ';
            }
        }


        // Delette pour uploads

        // selection de l'image pour comparaison
        $sql = "SELECT * FROM picture_contents WHERE id_content=$id_content";
        $sth = $connection->prepare($sql);
        $sth->execute();

        $resultat = $sth->fetch(PDO::FETCH_OBJ);

        if ($resultat) {
            $sql =  "DELETE FROM picture_contents
        WHERE id_content=$id_content";

            $sth = $connection->prepare($sql);
            $sth->execute();
        }


        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database
            $insert = $connection->query("INSERT INTO picture_contents (title_picture_content, id_content) VALUES $insertValuesSQL");
            if ($insert) {
                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . $errorUpload : '';
                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . $errorUploadType : '';
                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                $statusMsg = "Files are uploaded successfully." . $errorMsg;
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }


    // Display status message
    echo $statusMsg;
}
//}
