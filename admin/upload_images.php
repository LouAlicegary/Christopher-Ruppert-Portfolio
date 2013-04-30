<html>
<head></head>
<body>
<h2>Site Administration - Upload New Piece</h2>
<br>

<?php
    require_once 'includes/resize.image.class.php';
    //require_once 'uploader.php';
    uploader();
    


function uploader($num_of_uploads=1, $file_types_array=array("jpg"), $max_file_size=10485760, $upload_dir="") {
    
    $username = "ruppert";
    $password = "CRupp3rt!";

    if(!is_numeric($max_file_size))
        $max_file_size = 10485760;
  
    if(!isset($_POST["submitted"])) {
        
        $form = "<form action='".$PHP_SELF."' method='post' enctype='multipart/form-data'>";
        
        $form .= "File to Upload: <input type='hidden' name='submitted' value='TRUE' id='".time()."'><input type='hidden' name='MAX_FILE_SIZE' value='".$max_file_size."'>";
    
        $form .= "<input type='file' name='file[]'><font color='red'>*</font><br />";
        
        $form .= "<br>Category of Work: <select name='formGroup'><option value='3'>Tattoo</option><option value='9'>Recent Work</option><option value='7'>Bio</option><option value='1'>Original Paintings</option><option value='2'>Sculpture and Performance</option><option value='4'>Master Copies</option><option value='5'>Early Work</option></select><br />";
        
        $form .= "<br>Title of Work: <input type='text' name='work_title'><br />";
        
        $form .= "Subtitle: <input type='text' name='work_subtitle'><br />";
        
        $form .= "Year of Work: <input type='text' name='work_year'><br />";
        
        $form .= "Location: <input type='text' name='work_location'><br />";
        
        $form .= "<br><input type='submit' value='Upload Image'>";
        
        /* <br /><font color='red'>*</font>Valid file type(s): ";
    
        for($x=0;$x<count($file_types_array);$x++) {
            if($x<count($file_types_array)-1)
                $form .= $file_types_array[$x].", ";
            else
                $form .= $file_types_array[$x].".";
        }
        */
        
        $form .= "</form>";
        echo($form);
    }
    
    else {
    
        $varGroup = $_POST['formGroup'];
        $varYear = $_POST['work_year'];
        $varTitle = $_POST['work_title'];
        $varSubtitle = $_POST['work_subtitle'];
        $varSubtitle = $_POST['work_location'];
    
        switch ($varGroup) {
            case 1:
                $varGroupName = 'original_paintings';
                break;
            case 2:
                $varGroupName = 'sculpture_and_performance';
                break;
            case 3:
                $varGroupName = 'tattoo';
                break;
            case 4:
                $varGroupName = 'master_copies';
                break;
            case 5:
                $varGroupName = 'early_work';
                break;
            case 7:
                $varGroupName = 'bio';
                break;
            case 9:
                $varGroupName = 'recent_work';
                break;
        }

    
        foreach ($_FILES["file"]["error"] as $key => $value) {
            
            if ($_FILES["file"]["name"][$key]!="") {
                
                if ($value==UPLOAD_ERR_OK) {
                
                    $origfilename = $_FILES["file"]["name"][$key];
                    $filename = explode(".", $_FILES["file"]["name"][$key]);
                    $filenameext = $filename[count($filename)-1];
                    unset($filename[count($filename)-1]);
                    $filename = implode(".", $filename);
                    $filename .= "." . $filenameext; //substr($filename, 0, 15).".".$filenameext;
                    $file_ext_allow = FALSE;
                    
                    for ($x=0;$x<count($file_types_array);$x++) {
                        if($filenameext==$file_types_array[$x])
                            $file_ext_allow = TRUE;
                    }
          
                    if ($file_ext_allow) {
                        if ($_FILES["file"]["size"][$key]<$max_file_size) {
                            if (move_uploaded_file($_FILES["file"]["tmp_name"][$key], $upload_dir.$filename)) {
                            
                                echo("File uploaded successfully. - <a href='".$upload_dir.$filename."' target='_blank'>".$filename."</a><br />");
                                
                                
                                // IMAGE 1 - 900px
                                
                                $image = new Resize_Image;

                                $image->new_width = 900;
                                $image->image_to_resize = $upload_dir.$filename;
                                $image->ratio = true; 
                                $image->new_image_name = substr($filename, 0, strlen($filename)-4);
                                $image->save_folder = '../imgs/chris_big/' . $varGroupName . '/';

                                $process = $image->resize();
                                if($process['result'] ) 
                                    echo 'The new 900px image ('.$process['new_file_path'].') has been saved.<br />';

                                // IMAGE 2 - 600px
                                
                                $image = new Resize_Image;

                                $image->new_width = 600;
                                $image->image_to_resize = $upload_dir.$filename;
                                $image->ratio = true; 
                                $image->new_image_name = substr($filename, 0, strlen($filename)-4);
                                $image->save_folder = '../imgs/chris/' . $varGroupName . '/';

                                $process = $image->resize();
                                if($process['result'] ) 
                                    echo 'The new 600px image ('.$process['new_file_path'].') has been saved.<br />';
                                
                                // IMAGE 3 - 80px
                                
                                $image = new Resize_Image;

                                $image->new_width = 80;
                                $image->image_to_resize = $upload_dir.$filename;
                                $image->ratio = true; 
                                $image->new_image_name = substr($filename, 0, strlen($filename)-4);
                                $image->save_folder = '../imgs/chris/'  . $varGroupName . '/thumbs/';

                                $process = $image->resize();
                                if($process['result'] ) 
                                    echo 'The new 80px image ('.$process['new_file_path'].') has been saved.<br />';
                                
                                
                                // IMAGE 4 - full size
                                rename($filename, "../imgs/chris_big/" . $varGroupName . "/hi-res/" . $filename);
                                echo 'The new full size image (../imgs/chris_big/' . $varGroupName . '/hi-res/' . $filename . ') has been saved.<br />';
                                
                                

                                 // Connects to your Database
                                 mysql_connect("ruppert.db.9721098.hostedresource.com", $username, $password) or die(mysql_error());
                                 mysql_select_db("ruppert") or die(mysql_error()); 
                                
                                 /*
                                 $data = mysql_query("SELECT * FROM items WHERE groups='3'") or die(mysql_error());
                                 Print "<table border cellpadding=3>"; 
                                 while($info = mysql_fetch_array( $data )) 
                                 { 
                                     Print "<tr>"; 
                                     Print "<th>Name:</th> <td>".$info['item_filename'] . "</td> "; 
                                     Print "<th>ID:</th> <td>".$info['id'] . "</td></tr>"; 
                                 }
                                 Print "</table>"; 
                                 */
                                
                                /* 2013.04.26
                                $data = mysql_query("SELECT MAX(id) AS id FROM items") or die(mysql_error());
                                $info = mysql_fetch_array( $data );
                                $max_id = $info['id'];
                                $max_id = intval($max_id) + 1;
                                echo("<br>1 Record Written to 'items' with ID = " . $max_id . "<br />");
                                $data = mysql_query("INSERT INTO items (id, item_filename, groups) VALUES ('" . $max_id . "','" . $filename . "','" . $varGroup . "')") or die(mysql_error());

                                $data = mysql_query("SELECT MAX(display_order) AS display_order FROM item_details JOIN items ON item_details.id = items.id WHERE items.groups = " . $varGroup) or die(mysql_error());
                                $info = mysql_fetch_array( $data );
                                $max_disp = $info['display_order'];
                                $max_disp = intval($max_disp) + 1;
                                $varYear = intval($varYear);
                                //$varYearUNIX = (($varYearUNIX-1970) * 31557600) + 1;
                                echo("1 Record Written to 'item_details' with Max Display Order = " . $max_disp . "<br />");
                                $data = mysql_query("INSERT INTO item_details (id, title, subtitle, create_date, display_order) VALUES ('" . $max_id . "','" . $varTitle . "','" . $varSubtitle . "','" . $varYear . "','" . $max_disp . "')") or die(mysql_error());
                                */
                                
                                
                                $data1 = mysql_query("SELECT MAX(id) AS id FROM works") or die(mysql_error());
                                $info1 = mysql_fetch_array( $data1 );
                                $max_id = $info1['id'];
                                $max_id = intval($max_id) + 1;
                                
                                $data2 = mysql_query("SELECT MAX(display_order) AS display_order FROM works WHERE works.groups = " . $varGroup) or die(mysql_error());
                                $info2 = mysql_fetch_array( $data2 );
                                $max_disp = $info2['display_order'];
                                $max_disp = intval($max_disp) + 1;                               

                                $varYear = intval($varYear);
                                echo("<br><br>1 Record Written to 'works' with Group Name: " . $varGroupName . " (" . $varGroup . ") / Title: " . $varTitle . " / Subitle: " . $varSubtitle . " / Year: " . $varYear . "<br>");
                                echo("<br><br><b>IMAGE UPLOAD FINISHED</b>");
                                $data = mysql_query("INSERT INTO works (id, item_filename, groups, title, subtitle, create_date, display_order) VALUES ('" . $max_id . "','" . $filename . "','" . $varGroup . "','" . $varTitle . "','" . $varSubtitle . "','" . $varYear . "','" . $max_disp . "')") or die(mysql_error());
                                                                
                                
                            }
                            else
                                echo($origfilename." was not successfully uploaded<br />");
                        }
                        else
                            echo($origfilename." was too big, not uploaded<br />");
                    }
                    else
                        echo($origfilename." had an invalid file extension, not uploaded<br />");
                }
                else
                    echo($origfilename." was not successfully uploaded<br />");
            }
        }
    }
} 
    
    
    
    
?>

<br>
<br>
<a href="index.php">[Return to Main Menu]</a>

</body>
</html>