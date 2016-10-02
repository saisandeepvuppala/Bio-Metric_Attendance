<!DOCTYPE html>
<html>
<body>

<?php
 $row = 1;
 if (($handle = fopen("Employeelist.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $num = count($data);
    if ($row == 1) {
        echo '<tr>';
    }else{
        echo '<tr>';
    }

    for ($c=0; $c < $num; $c++) {

        if(empty($data[$c])) {
           $value = "&nbsp;";
        }else{
           $value = $data[$c];
        }
        if ($row == 1) {

             echo '<td style="border-top: 1px solid rgb(111,180,224); border-left: 1px solid rgb(111,180,224); border-bottom: 1px solid rgb(111,180,224);"  align="left" bgcolor="#0066cc" height="36" valign="middle" ><b><font color="#ffffff" size="2">&nbsp;&nbsp;'.$value.'&nbsp;&nbsp;</font></b></td>';
        }else{


            echo '<td style=" border-bottom: 1px solid rgb(111,180,224);" sdval="9" sdnum="1040;" align="left" bgcolor="#ffffff" height="25"  valign="middle"><font color="#000000" size="2">&nbsp;&nbsp;'.$value.'&nbsp;&nbsp;</font></td>';
        }
    }

    if ($row == 1) {
        echo '</tr>';
    }else{
        echo '</tr>';
    }
    $row++;
   }

  echo '</tbody></table>';
echo '</center>';   
    fclose($handle);
 }
 ?>
 </body>
</html>
