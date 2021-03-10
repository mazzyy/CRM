<?php  
$string = " PHP with Edureka";  
echo "Your string is:".$string;  
echo "<br>";  
echo "Hex formed by md5 function is ".md5($string);  
  
$string = ' PHP with Edureka';  
if (md5($string) =='9a1359e7be2d2670780b85471675dc72'){  
	echo "<br>"; 
    echo md5($string) ;  
}  
else {
    echo"look for the error";
}
?> 