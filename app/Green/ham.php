<?php

    function dequy($category,$parent_id = 0,$str = '---|')
    {
        foreach($category as $key => $val){
            if($val->parent_id == $parent_id){
                echo $str . $val->categoryname .'<br/>';
                unset($category[$key]);

                dequy($category,$val->id,$str.'--|');
            }
        }
    }

    
?>
