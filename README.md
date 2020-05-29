# manageDirectory
This is a virtual directory management system create on php and javascript

This library will help you to create directory or fetch directory into your project.
you can manage or you can create your own cpanel using this directory.
# Features=>
# Right click or contextmenu are available in this library
1. you can add directory using folder sign or
2. you can add directory using right click.
3.you can delete whole project using right click delete option
4. or you can seperate delete a file
5.you can create any online editor using this library
6. you can create own super admin panel using this library.
7. you can create a tree structure in few sec using this library.

# initialization
**
kindly add this css into top after bootstrap file
<link rel="stylesheet" href="<?= baseUrl ?>/dir_lib/css/style.css">
<link rel="stylesheet" href="<?= baseUrl ?>/dir_lib/css/context.css">

1. Kindly add this autoload file into top in your project
    <?php
       include_once __DIR__.'/dir_lib/Autoload.php';
    ?>
2.Next you can only write this things for showing directory or file or folder

  <?php
    $folder->leftPanel()
  ?>
  
3. for create the new folder or file 

  <?php
     $folder->callModel(); // function for create a folder
     $folder->callFileModel(); //function for create a file
  ?>
  
  4. for delete a folder or file 
  
  <?php
    $folder->confirmBox(); // for delete whole folder or project
    $folder->fileconfirmBox(); // delete only specific file
  ?>

** kindly add this js into top after jquery file
<script src="<?= baseUrl ?>/dir_lib/js/foldertree.js"></script>
