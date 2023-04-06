
@php
    dequy($category)
    
@endphp


{{-- <?php

    foreach($category as $key_cap_1 => $val_cap_1){
        if($val_cap_1->parent_id == "0"){
            echo '<li>--|'.$val_cap_1->categoryname.'</li>';
            unset($category[$key_cap_1]);
            
            foreach($category as $key_cap_2 => $val_cap_2){
                if($val_cap_2->parent_id == $val_cap_1->id){
                    echo '<li>--|--|'.$val_cap_2->categoryname.'</li>';
                    unset($category[$key_cap_2]);
                        
                    foreach($category as $key_cap_3 => $val_cap_3){
                        if($val_cap_3->parent_id == $val_cap_2->id){
                            echo '<li>--|--|--|'.$val_cap_3->categoryname.'</li>';
                            unset($category[$key_cap_3]);                               
                        }
                    }
                }
            }
        }
    }

?> --}}
