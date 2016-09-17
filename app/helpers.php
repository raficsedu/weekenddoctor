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

function get_doctor_off_days($user_id=''){
    $data = array();
    $schedules = DB::table('doctor_off_days')->where('user_id', '=' , $user_id)->get();
    if(sizeof($schedules)>0){
        foreach($schedules as $k => $s){
            $data[$s->date] = $s;
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

function getDBdateformat($date=''){
    $temp = explode('-',$date);
    $date = $temp[2].'-'.$temp[0].'-'.$temp[1];
    return $date;
}

function getUSdateformat($date=''){
    $temp = explode('-',$date);
    $date = $temp[1].'-'.$temp[2].'-'.$temp[0];
    return $date;
}

function get_doctor_meta($doctor_id=''){
    $metas = DB::table('doctor_metas')
            ->where('user_id', '=', $doctor_id)
            ->get();

    $data = array();

    foreach($metas as $meta){
        $data[$meta->meta_key] = $meta->meta_value;
    }

    return $data;
}

function get_patient_meta($patient_id=''){
    $metas = DB::table('patient_metas')
        ->where('user_id', '=', $patient_id)
        ->get();

    $data = array();

    foreach($metas as $meta){
        $data[$meta->meta_key] = $meta->meta_value;
    }

    return $data;
}

function update_meta($type='',$user_id='',$meta_key='',$meta_value=''){
    $metas = DB::table($type)
        ->where('user_id', '=', $user_id)
        ->where('meta_key', '=', $meta_key)
        ->get();

    if($metas){
        //Updating
        DB::table($type)
            ->where('user_id', '=', $user_id)
            ->where('meta_key', '=', $meta_key)
            ->update(['meta_value' => $meta_value]);
    }else{
        //Inserting
        DB::table($type)->insert(
            ['user_id' => $user_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value]
        );
    }

    return 1;
}

?>