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

function get_doctor_schedules($user_id=''){
    $data = array();
    $schedules = DB::table('doctor_schedules')->where('user_id', '=' , $user_id)->get();
    if(sizeof($schedules)>0){
        foreach($schedules as $k => $s){
            $data[$s->day] = $s;
        }
    }
    return $data;
}

function get_time_slots($stime='',$etime='',$intval='',$format=''){

    $datetime1 = new DateTime($stime);
    $datetime2 = new DateTime($etime);
    $interval = $datetime1->diff($datetime2);
    $min = $interval->format('%i');
    $hour = $interval->format('%h');
    $total_min = $hour*60 + $min;
    $loop = $total_min / $intval;
    $format_24 = array();
    $format_am_pm = array();
    for($l=0 ; $l <= $loop ; $l++){
        $time = date('G:i', strtotime($stime) + ($intval*60*$l));
        $time1 = date('h:i a', strtotime($stime) + ($intval*60*$l));
        $format_24[] = $time;
        $format_am_pm[] = $time1;
    }
    if($format==1){
        return $format_24;
    }else{
        return $format_am_pm;
    }
}
?>