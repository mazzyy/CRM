<?php

include("q/snoopy.class.php");
    include("q/htmlsql.class.php");


    $wsql = new htmlsql();
    
    // connect to a URL
    if (!$wsql->connect('url', 'http://broadbandnow.com')){
        print 'Error while connecting: ' . $wsql->error;
        exit;
    }
    
    /* cubrid_execute(conn_identifier, SQL) a query:
        
       This query extracts all links with the classname = nav_item   
    */
    if (!$wsql->query('SELECT * FROM div')){
        print "Query error: " . $wsql->error; 
            }

    // show results:
    foreach($wsql->fetch_array() as $row){
    
        echo $row;
        
        /* 
        $row is an array and looks like this:
        Array (
            [href] => /feedback.htm
            [class] => nav_item
            [tagname] => a
            [text] => Feedback
        )
        */
        
    }
?>