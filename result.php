<?php

$con = mysql_connect("ec2-54-216-185-51.eu-west-1.compute.amazonaws.com","d7qvjv66dimcfg","f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("cis_id", $con);

 

$sql="INSERT INTO nametable (fname, lname)VALUES('$_POST[fname]','$_POST[lname]')";

 

if (!mysql_query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }

echo "1 record added";

mysql_close($con)
?>
