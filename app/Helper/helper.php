<?php
if (! function_exists('active_menu')) {

    function active_menu($arr,$result='',$extra=null){
        $results = '';
        if(in_array(url()->current(),$arr)){
            $results = $result;
        }else{
            if (null !== $extra){
                if(in_array(request()->route()->getName(),$extra)){
                    $results = $result;
                }
            }
        }
        return $results;
    }
}
