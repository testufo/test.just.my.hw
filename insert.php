<?php
    function insert($password, $emai, $firstname, $lastname, $jsonanswer, $mark, $groop, $class){
        $dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130");

            $query = "INSERT INTO htmltestform(pass, firstname, lastname, email, jsonanswer, mark, groop, classname) VALUES
                    ('$password', '$firstname', '$lastname', '$emai', '$jsonanswer', '$mark', '$groop', '$class') RETURNING id";
            $id = pg_query($query);
        pg_close($dbconn);
        if($id==false){
            return false;
            throw new Exception();
        }
        return pg_fetch_row($id)[0];
    }

    function getdetails($id, $password){
        $dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130");   
        $query = "SELECT firstname, lastname, jsonanswer, mark FROM htmltestform WHERE id=$id AND pass='$password'";
        $result = pg_query($query);
        pg_close($dbconn);
        return pg_fetch_row($result);
    }
    
    function getothers($groop, $class){
        $others = array();
        $dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130");   
        $query = "SELECT firstname, lastname, mark FROM htmltestform WHERE classname='$class' AND groop=$groop ORDER BY lastname";
        $result = pg_query($query);
        while ($line = pg_fetch_array($result , null, PGSQL_ASSOC)) {
            array_push($others, $line);
        }
        pg_close($dbconn);
        return $others;
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 16; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
?>
