# DirectoryManagement
This is a virtual directory management system create on php and javascript

This library will help you to create directory or fetch directory into your project.
you can manage or you can create your own cpanel using this directory.
# Features
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
<ul><li>kindly add this css into top after bootstrap file
  <ul><li> dir_lib/css/style.css </li>
  <li> dir_lib/css/context.css </li></ul><li></ul>

<p>Kindly add this autoload file into top in your project</p>
    
   <code>include_once __DIR__.'/dir_lib/Autoload.php'</code>
  
<p>Next you can only write this things for showing directory or file or folder</p>
  
  <code> $folder->leftPanel()</code>

<p>for create the new folder or file </p>
  
   <code>$folder->callModel(); // function for create a folder</code>
     
   <code>$folder->callFileModel(); //function for create a file</code>
  
<p>for delete a folder or file </p>

   <code> $folder->confirmBox(); // for delete whole folder or project</code>
    
   <code>$folder->fileconfirmBox(); // delete only specific file</code>
 ?>

<p>** kindly add this js into top after jquery file</p>

<code><script src="/dir_lib/js/foldertree.js"></script></code>
