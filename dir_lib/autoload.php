/*
MIT License

Copyright (c) 2020 sumitchatterjee

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
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
