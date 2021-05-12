<?php
    function insert($password, $emai, $firstname, $lastname, $jsonanswer, $mark, $groop){
        $dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130");
        $query = "EXISTS(SELECT * FROM htmltestform WHERE email=$emai);";
        $exist = pg_query($query);
        if(!$exist){
            $query = "INSERT INTO htmltestform(pass, firstname, lastname, email, jsonanswer, mark, groop) VALUES
                    ('$password', '$firstname', '$lastname', '$emai', '$jsonanswer', '$mark', '$groop') RETURNING id";
            $id = pg_query($query);
        }
        else{
            $id=false;
        }
        pg_close($dbconn);
        return pg_fetch_row($id)[0];
    }

    function getdetails($id, $password){
        $details = array();
        $dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130");   
        $query = "SELECT firstname, lastname, jsonanswer, mark FROM htmltestform WHERE id=$id AND pass='$password'";
        $result = pg_query($query);
        while ($line = pg_fetch_array($result , null, PGSQL_ASSOC)) {
            array_push($details, $line);
        }
        pg_close($dbconn);
        return $details;
    }
    
    function getothers($groop){
        $others = array();
        $dbconn = pg_connect("host=ec2-54-216-185-51.eu-west-1.compute.amazonaws.com dbname=d7qvjv66dimcfg user=nbvnsbswyvclsh password=f47f163b6ecbddaf0f3835b045eb07b1d609c6200269be2bf2716b76ead2b130");   
        $query = "SELECT firstname, lastname, mark FROM htmltestform WHERE groop=$groop ORDER BY lastname";
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