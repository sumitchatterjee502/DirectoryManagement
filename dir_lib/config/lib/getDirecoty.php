<?php
defined('BASEPATH') OR exit('No direct script access allowed');
namespace getDir;
/**
 * 
 */
class getDirecoty{
    
    public function fetchAllDirectory(){
        $this->getFolder();
    }

    public  function getFolder(){
        $dir =  getcwd(); // get current directory

        //fetch all directory and sub directory
        $fetchFolder = $this->dirToArray($dir);
        arsort($fetchFolder);

        $getIndex = (array_keys($fetchFolder));
        $getValue = (array_values($fetchFolder));
        echo '<ul id="tree1">';
        //print_r($getValue);
        for($i = 0; $i < sizeof($getIndex);$i++){

            if(is_numeric($getIndex[$i])){

                echo '<li class ="createDir">
                        <span >
                            <form method="post">
                                <button class="btn" value="'.$getValue[$i].'" name="viewPage">
                                    <i class="far fa-file-code"></i>&nbsp;'.$getValue[$i].
                                '</button>
                            </form>
                        </span>
                    </li>';

            }else{

                echo '<li class ="createDir">'
                        .'<span data-toggle="tooltip" data-placement="right">
                            <a href="#">'    
                            . '<i class="fas fa-folder-open"></i>&nbsp;'.$getIndex[$i].''
                            . '&nbsp;<i class="fas fa-angle-right"></i>
                            </a>&nbsp; 
                                <button class="menuButton" value="'.$getIndex[$i].'" name ="create_dir" id="create_dir" data-toggle="modal" data-target="#myModal">
                                    <i class="fas fa-folder-plus"></i>'
                            . '</button>
                        </span>
                        <div class="context-menu" id="contextMenu'.$i.'">
                            <ul>
                                <li>
                                    <button class="menuButton" value="'.$getIndex[$i].'" name ="create_dir" data-toggle="modal" data-target="#myModal">
                                       <i class="fas fa-folder-plus"></i>&nbsp; Create Folder
                                    </button>
                                </li>
                                <li>
                                    <button class="menuFileButton" value="'.$getIndex[$i].'" name ="create_dir_file" data-toggle="modal" data-target="#myFile">
                                       <i class="fas fa-file-code"></i>&nbsp; Create File
                                    </button>
                                </li>
                                <li>
                                    <button class="menuDeleteButton" value="'.$getIndex[$i].'" name ="delete_dir" data-toggle="modal" data-target="#delFolder">
                                       <i class="fas fa-trash-alt"></i>&nbsp; Delete Folder
                                    </button>
                                </li>
                            </ul>
                        </div>';
                    if(is_array($getValue[$i])){
                        $this->callReverse($getValue[$i],$getIndex[$i]);
                    }
                 echo '</li>';


            }
        }
        echo '</ul>';
    }

    //function for main dir and subdir
    protected function dirToArray($dir) {
       $result = array();

       $cdir = scandir($dir,1);

       foreach ($cdir as $key => $value)
       {
          if (!in_array($value,array(".","..")))
          {
             if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
             {

                $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value);
             }
             else
             {
                $result[] = $value;
             }
          }
       }
       return $result;
    }

    //
    private function callReverse($getValue,$val2){
        $getIndex = (array_keys($getValue));
        $getValueNew = (array_values($getValue));
        echo '<ul>';
        $j=1;
        for($i = 0; $i < sizeof($getIndex);$i++){

            if(is_numeric($getIndex[$i])){

                echo '<li class="createFile">
                        <span>
                            
                                <button class="btn" value="'.$val2.'/'.$getValueNew[$i].'" name="viewPage">
                                    <i class="far fa-file-code"></i>&nbsp;'.$getValueNew[$i].'
                                </button>
                            
                                <button class="fileDeleteButton" value="'.$val2.'/'.$getValueNew[$i].'" name ="delete_dir" data-toggle="modal" data-target="#delFile">
                                   <i class="fas fa-trash-alt"></i>&nbsp;
                                </button>
                            
                        </span>
                    </li>';

            }else{

                echo '<li class="createDir">'
                        .'<span data-toggle="tooltip" data-placement="right">
                            <a href="#">'    
                            . '<i class="fas fa-folder-open"></i>&nbsp;'.$getIndex[$i].''
                                . '&nbsp;<i class="fas fa-angle-right"></i>
                            </a>&nbsp;
                                <button class="menuButton" value="'.$val2.'/'.$getIndex[$i].'" name ="create_dir" data-toggle="modal" data-target="#myModal">
                                    <i class="fas fa-folder-plus"></i>'
                                . '</button>
                        </span>
                        <div class="context-menu" id="subcontextMenu">
                            <ul>
                                <li>
                                    <button class="menuButton" value="'.$val2.'/'.$getIndex[$i].'" name ="create_dir" data-toggle="modal" data-target="#myModal">
                                       <i class="fas fa-folder-plus"></i>&nbsp; Create Folder
                                    </button>
                                </li>
                                <li>
                                    <button class="menuFileButton" value="'.$val2.'/'.$getIndex[$i].'" name ="create_dir_file" data-toggle="modal" data-target="#myFile">
                                       <i class="fas fa-file-code"></i>&nbsp; Create File
                                    </button>
                                </li>
                                <li>
                                    <button class="menuDeleteButton" value="'.$val2.'/'.$getIndex[$i].'" name ="delete_dir" data-toggle="modal" data-target="#delFolder">
                                       <i class="fas fa-trash-alt"></i>&nbsp; Delete Folder
                                    </button>
                                </li>
                            </ul>
                        </div>';
                if(is_array($getValueNew[$i])){
                    $val3 = $val2.'/'.$getIndex[$i];
                    $this->callReverse($getValueNew[$i],$val3);
                }
                $j++;
             echo '</li>';
                
            }
        }
        echo '</ul>';

    }

    public function leftPanel(){
        ?>
        <div class="treeview-animated border">
            <h6 class="btn btn-primary">Folders & Files</h6>
            <hr>
            <button class="btn btn-success" value="" id="mainDir" name ="mainDir" data-toggle="modal" data-target="#myModal"><i class="fas fa-folder-plus" data-toggle="tooltip" data-placement="bottom" title="Create folder"></i>&nbsp;</button>
            <button class="btn btn-success" value="" id="mainDirFile" name ="mainDirFile" data-toggle="modal" data-target="#myFile"><i class="fas fa-file-code" data-toggle="tooltip" data-placement="bottom" title="Create File"></i>&nbsp;</button>
<!--            <button class="btn btn-success" value="" id="mainDir" name ="mainDir" data-toggle="modal" data-target="#myModal"><i class="fas fa-folder-plus"></i>&nbsp;</button>-->
            <div class="tree well">
                
                <?php 
                
                $this->fetchAllDirectory();
                
                ?>
                
            </div>
        </div>
        <?php
    }

    public function rightPanel($data = null){
        ?>
        <div class="treeview-animated border" style="margin-left:-15px !important;margin-right:-15px !important;">
            <h6 class="pt-3 pl-3">Code View area</h6>
            <hr>
            <div style="background: #14212f; color:#fff;padding: 10px">
        <?php
        if(isset($_POST['viewPage'])){

            $merchantMobileNumber = isset($_POST['viewPage'])? $_POST['viewPage']:'';
            echo "<h6 style='border:1px solid grey'>Page Name : ".$merchantMobileNumber."</h6><br>";
            $sourcedir = $merchantMobileNumber;
            $data = htmlentities(file_get_contents($sourcedir));
            echo '<pre style="color:#fff !important">'.$data.'</pre>';
        }
        ?>
        <!-- Button to Open the Modal -->
            </div>
        </div>
        <?php
    }

    //create a directory

    public function createDir($data = null){
         if($data){
             $directoryName = $data;
             //echo $directoryName;
            //Check if the directory already exists.
            if(!is_dir($directoryName)){
                 //Directory does not exist, so lets create it.
                  mkdir($directoryName, 0777,true);
            }
         }
    }

    public function createFile($data = null){
        if ($data) {
            $file_pointer  = $data;
            if(!file_exists($file_pointer)){
                fopen($file_pointer, 'a');
            }
        }
    }

    public function deleteFolder($dirname = null){
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
            if (!$dir_handle)
                return false;
            while($file = readdir($dir_handle)) {
                if ($file != "." && $file != "..") {
                    if (!is_dir($dirname."/".$file))
                        unlink($dirname."/".$file);
                    else
                        $this->deleteFolder($dirname.'/'.$file);
                }
            }
            closedir($dir_handle);
            rmdir($dirname);
            return true;
    }

    public function deleteFile($dirname = null){
        if (!is_dir($dirname)){
            unlink($dirname);
        }else{
            echo "nothing";
        }

    }

    public function callModel(){
        ?>
        <!-- The Folder Model-->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Create Folder</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="post">
                        <input type="text" name="folderName" class="form-control" style="width:80%;display: inline-block;">
                        <button type="submit" class="btn btn-success" style="position: absolute;" value="" name="createFolder" id="createFolder">
                            <i class="fas fa-folder-plus"></i>
                        </button>
                    </form>
                  </div>
                  <p id="modelF" style="padding: 5px"></p>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <?php
    }

    public function callFileModel(){
        ?>
        <!-- The ?File Model-->
        <div class="modal" id="myFile">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Create File</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post">
                    <input type="text" name="fileName" class="form-control" style="width:80%;display: inline-block;">
                    <button type="submit" class="btn btn-success" style="position: absolute;" value="" name="createFile" id="createFile">
                        <i class="fas fa-folder-plus"></i>
                    </button>
                </form>
              </div>
              <p id="modelFile" style="padding: 5px"></p>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <?php
    }

    public function confirmBox(){
        ?>
        <!-- The ?File Model-->
        <div class="modal" id="delFolder">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Confirmation !</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post">
                    <center>
                        <div>
                            <h5>Are you sure to permanently delete this folder!</h5>
                        <!-- <input type="text" name="fileName" class="form-control" style="width:80%;display: inline-block;"> -->
                            <button type="submit" class="btn btn-success" style="width: 48%;display: inline-block;" value="" name="DeleteFolder" id="DeleteFolder">
                                <i class="fas fa-check"></i>&nbsp; Yes
                            </button>
                            <button type="button" class="btn btn-warning" style="width:48%;display: inline-block;"  data-dismiss="modal">
                                <i class="fas fa-times"></i>&nbsp; Cancel
                            </button>
                        </div>
                    </center>
                </form>
              </div>
              <p id="modelFile" style="padding: 5px"></p>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <?php
    }

    public function fileconfirmBox(){
        ?>
        <!-- The ?File Model-->
        <div class="modal" id="delFile">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Confirmation !</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post">
                    <center>
                        <div>
                            <h5>Are you sure to permanently delete this file!</h5>
                        <!-- <input type="text" name="fileName" class="form-control" style="width:80%;display: inline-block;"> -->
                            <button type="submit" class="btn btn-success" style="width: 48%;display: inline-block;" value="" name="DeleteFile" id="DeleteFile">
                                <i class="fas fa-check"></i>&nbsp; Yes
                            </button>
                            <button type="button" class="btn btn-warning" style="width:48%;display: inline-block;"  data-dismiss="modal">
                                <i class="fas fa-times"></i>&nbsp; Cancel
                            </button>
                        </div>
                    </center>
                </form>
              </div>
              <p id="modelFile" style="padding: 5px"></p>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
}

?>