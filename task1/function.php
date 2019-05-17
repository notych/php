<?php
include 'file_perms.php';

function my_uploadfile(){
    if(isset($_FILES) && $_FILES['inputfile']['error'] == 0){
        if(is_uploaded_file($_FILES['inputfile']['tmp_name'])){ 
            if(file_exists(FILEDIR)){ 
                if(file_per_write(FILEDIR)){ 
                   $destiation =  FILEDIR.$_FILES['inputfile']['name'];  
                   if(move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation )){
                          return 'File Uploaded';
                   } else {
                    return "No move upload file.";  
                   }
                }         
             }else { return "No directory". FILEDIR;}
         }        
     } else{
       switch ($_FILES['inputfile']['error'])  {
         case 1:
           $e = "UPLOAD_ERR_INI_SIZE";
         break;
         case 2:
           $e= "UPLOAD_ERR_FORM_SIZE";
         break;
         case 3:
            $e = "UPLOAD_ERR_PARTIAL";
         break;
         case 4:
            $e = "UPLOAD_ERR_NO_FILE";
         break;
        } 
      return "No File Uploaded " . $e;
     }
}

function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 
    return round($bytes, $precision) . ' ' . $units[$pow]; 
}  

function viewdir(){
    if(file_exists(FILEDIR)){ 
	if (file_per_read(FILEDIR)){ 
            $cdir = scandir(FILEDIR); 
	        $i = 0;
            $result = array();
            foreach ($cdir as $value) {
                if (!in_array($value,array(".", "..")) && !is_dir($value)) {
                   $result[$i]['name'] = $value;
                   $result[$i]['size'] = formatBytes( filesize( FILEDIR . $value ));
                   $i++;
                }
            }    
            return $result;      
         }       
     } else echo "No directory". FILEDIR; 
}

function del_file(){
	$f = (FILEDIR.$_GET["filedel"]);
           if(file_exists($f)){
             if(file_per_write($f))
                 if(!unlink($f)) return "No delete file. Permissions ". $f. "(" . fileperms($f) . ")";  
            
	} else echo "No file ".$f; 		
       //header("Location: ");

}  		
?>
