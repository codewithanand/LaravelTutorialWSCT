<?php
    // All functions

    if(!function_exists("array_formatted_data")){
        function array_formatted_data($data){
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        }
    }

    if(!function_exists("get_formatted_date")){
        function get_formatted_date($date, $format){
            $formattedDate = date($format, strtotime($date));
            return $formattedDate;
        }
    }

?>