<?php
//function for force download
function DownloadFile($stringFilePath){
    $file_to_download = $stringFilePath; // file to be downloaded
    header("Expires: 0");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");  header("Content-type: application/file");
    header('Content-length: '.filesize($file_to_download));
    header('Content-disposition: attachment; filename="'.basename($file_to_download).'"');
    readfile($file_to_download);
}
session_start();

$message = '';
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Convert')     //determine whether file has been uploaded
{
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
    {
        // get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];     //file temp path
        $fileName = $_FILES['uploadedFile']['name'];            //filename with extension
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));    //file extension
        $realFileName = pathinfo($fileName)['filename'];            //file name minus extension


        // check if file has one of the following extensions
        $allowedfileExtensions = array('pdf');

        if (in_array($fileExtension, $allowedfileExtensions))
        {
            // directory in which the uploaded file will be moved
            //$destination_path = getcwd().DIRECTORY_SEPARATOR;
            $uploadFileDir = './uploaded_files/';
            $dest_path = $uploadFileDir . 'upload.pdf';

            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
                //$message ='File is successfully uploaded.';
                $jarDir = "\"".getcwd()."/out/artifacts/Assignment_CAT201_jar/Assignment CAT201.jar"."\"";
                exec('java -jar '.$jarDir, $output);
                //exec('java -jar "C:\Users\Erdos\Desktop\Assignment CAT201\out\artifacts\Assignment_CAT201_jar\Assignment CAT201.jar"', $output);
                // rename(getcwd()."/downloaded_files/download.txt", getcwd()."/downloaded_files/".$realFileName.".txt");
                // readfile(getcwd().'/downloaded_files/download.txt');
                $message = $fileName.' successfully converted! <a href="/downloaded_files/download.txt" download> Download File </a>';
            }
            else
            {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
        else
        {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    }
    else
    {
        $message = 'There is some error in the file upload';
    }

}
$_SESSION['message'] = $message;
header("Location: index.php");
