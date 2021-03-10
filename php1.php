

<form method="get">
<input type="submit" value="submit" name="save" />
</form>
<?php
if(isset($_get['save']))
{

echo' <script type="text/javascript"> 
alert("hi");
window.location.href = " addlead.php";
    </script>';

}

?>