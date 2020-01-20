<?php

    # Je créé une focntion de débug 
    function debug($var, $mode=1)
    {
        print "<div class='alert alert-warning id='debug'>";

        $trace = debug_backtrace();
        $trace = array_shift($trace);

        print"<p>Le débug de ma fonction $trace[file] indique la ligne $trace[line]</p>";
        
            print"<pre>"; 
                switch($mode){
                    case "1": 
                        print_r($var);
                    break;
                    case"2": 
                        var_dump($var);
                    break;
                }
            print"</pre>";
        
        print"</div>";
    }

    # Je vérifie ma connexion pour un user

    function userConnect()
    {
        if(isset($_SESSION['user'])) return TRUE;
            else return FALSE;
        
    } 







?>