<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once __DIR__.'/config/autoload.php';


//write all function here
if(isset($_POST['createFolder'])){

    if(!empty($_POST['createFolder'])){
    	$createFolder = $_POST['createFolder']."/".$_POST['folderName'];
    }else{
    	$createFolder = $_POST['folderName'];	
    }
    
    $folder->createDir($createFolder);
}

if(isset($_POST['createFile'])){

	if(!empty($_POST['createFile'])){

		$createFile = $_POST['createFile']."/".$_POST['fileName'];
	}else{

		$createFile = $_POST['fileName'];		
	}

    $folder->createFile($createFile);
}

if (isset($_POST['DeleteFolder'])) {
    
    $deleteFile = $_POST['DeleteFolder'];
    //echo $deleteFile;
    $folder->deleteFolder($deleteFile);

}

if (isset($_POST['DeleteFile'])) {
    
    $deleteFile = $_POST['DeleteFile'];
    //echo $deleteFile;
    $folder->deleteFile($deleteFile);

}
?>