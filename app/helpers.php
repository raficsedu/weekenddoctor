<?php
function get_system_info(){
    $system_info = DB::table('system_settings')
        ->get();

    $info = array();
    foreach($system_info as $single){
        $info[$single->meta_key] = $single->meta_value;
    }

    return $info;
}
?>