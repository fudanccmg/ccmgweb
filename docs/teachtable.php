		<link rel="stylesheet" media="all" href="css/table.css"/>


<?php 
		$fp = fopen(dirname(__FILE__).'/teachtable.txt','r'); 
		while(!feof($fp)){ 
				$line = trim(fgets($fp,999)); 
				if(strlen($line)==0)continue;
				if(substr($line ,0,5)=="begin"){
					$year=substr($line ,6);//echo substr($info,6); 
					echo '<a name="pub'.$year.'"> </a>';
					echo '<table class="bordered">';
					echo '<thead>    
    <tr>  
 			<th></th>  
    <th>'.$year.'</th>  
    <th>view</th>  
    </tr>  
    </thead>  ';
    $id=1;
    $row=0;
    continue;
    		}
    	if(substr($line,0,3)=="end") {
    				echo '</tr>
								</table><!--table end-->';
					echo '<br>';
								continue;
				}
				$row++;
				if($row==1) {echo '<tr><td width="25" >['.$id++.']</td><td>';}
				if($row==5){echo '</td><td width="30"><a href="'.$line.'">PDF</a></td></tr>';$row=0;continue;}
				if($row==4){if($line=='null')continue;echo 'CAUTION:';echo $line.'<br>';continue;}
				if($row==3){echo '<b>'.$line.'</b><br>';continue;}
				echo $line.'<br>';
		} 
fclose($fp); 
?>