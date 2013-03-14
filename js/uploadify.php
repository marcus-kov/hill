<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination


$someVar = $_POST['someKey'];

$targetFolder = '/images/'.$someVar; // Relative to the root
$tempFile = $_FILES['Filedata']['tmp_name'];

$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];

if (!empty($_FILES)) {

    //class for resize images
	 class Image {
            
            var $uploaddir;
            var $quality = 80;
            var $ext;
            var $dst_r;
            var $img_r;
            var $img_w;
            var $img_h;
            var $output;
            var $data;
            var $datathumb;
            
            function setFile($src = null) {
                $this->ext = strtoupper(pathinfo($src, PATHINFO_EXTENSION));
                if(is_file($src) && ($this->ext == "JPG" OR $this->ext == "JPEG")) {
                    $this->img_r = ImageCreateFromJPEG($src);
                } elseif(is_file($src) && $this->ext == "PNG") {
                    $this->img_r = ImageCreateFromPNG($src);      
                } elseif(is_file($src) && $this->ext == "GIF") {
                    $this->img_r = ImageCreateFromGIF($src);
                }
                $this->img_w = imagesx($this->img_r);
                $this->img_h = imagesy($this->img_r);
            }
            
            function resize($w = 100) {
                $h =  $this->img_h / ($this->img_w / $w);
                $this->dst_r = ImageCreateTrueColor($w, $h);
                imagecopyresampled($this->dst_r, $this->img_r, 0, 0, 0, 0, $w, $h, $this->img_w, $this->img_h);
                $this->img_r = $this->dst_r;
                $this->img_h = $h;
                $this->img_w = $w;
            }
            
            function createFile($output_filename = null)
             {
                if($this->ext == "JPG" OR $this->ext == "JPEG")
                 {
                    imageJPEG($this->dst_r, $this->uploaddir.$output_filename, $this->quality);
                } 
                elseif($this->ext == "PNG") 
                {
                    imagePNG($this->dst_r, $this->uploaddir.$output_filename.'.'.$this->ext);
                } elseif($this->ext == "GIF") {
                    imageGIF($this->dst_r, $this->uploaddir.$output_filename.'.'.$this->ext);
                }
                $this->output = $this->uploaddir.$output_filename.'.'.$this->ext;
            }
            
            function setUploadDir($dirname) {
                $this->uploaddir = $dirname;
            }
            
         	function flush() {
				$tempFile = $_FILES['Filedata']['tmp_name'];
                var_dump($targetFolder);
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
				//$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];

				//imagedestroy($this->dst_r);
				//unlink($targetFile);
				//imagedestroy($this->img_r);

			}
            
        }

	



	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);

	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
    
		$image = new Image();
        $image->setFile($targetFile);
        $image->setUploadDir($_SERVER['DOCUMENT_ROOT'] . $targetFolder.'/');
       // $image->resize(640);
        //$image->createFile(md5($tempFile));
        $image->resize(380);
        $image->createFile(sha1($_FILES['Filedata']['name']));
        $image->flush();
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
