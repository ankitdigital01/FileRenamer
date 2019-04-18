<?php
/*
*****************File Renamer Program********************
*This program rename the files according to their date and time when they are created.
*NOTE: before running the program, put all your files in 'put_your_files_here' directory.
*/

//global array of file names
$files = array();

//get all the files using directory iterator
$dir = new DirectoryIterator('put_your_files_here/');

//iterate the files and get an array of their names
foreach ($dir as $fileinfo) {
   $files[date("YmdHis.u",$fileinfo->getMTime())] = $fileinfo->getFilename();
}

//function krsort will sort names
ksort($files);


//Excluding this file (named index.php and the dir "." )
$count=1;
foreach($files as $file){
    if ($file == "index.php" or $file == "." or $file == ".." ){
    	//do nothing here
    }
    else{
    	//put a new name of the file
		$newName = $count."_".$file;

		//rename the old file name with new file name
        rename("put_your_files_here/".$file, "put_your_files_here/".$newName);

		$count++;

        echo $file." ==Renamed to==> ";
		print $newName."</br>";
    }
}
//Program ends
?>