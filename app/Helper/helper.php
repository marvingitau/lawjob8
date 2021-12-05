<?php
if (! function_exists('month_arr')){
    function month_arr(){
        return [
            1=>'January',
            2=>'February',
            3=>'March',
            4=>'April',
            5=>'May',
            6=>'June',
            7=>'July',
            8=>'August',
            9=>'September',
            10=>'October',
            11=>'November',
            12=>'December'
        ];

    }
}

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

if (! function_exists('years_menu')) {

    function years_menu(){
        $results =[
        0000,
        2020,
        2019,
        2018,
        2017,
        2016,
        2015,
        2014,
        2013,
        2012,
        2011,
        2010,
        2009,
        2008,
        2007,
        2006,
        2005,
        2004,
        2003,
        2002,
        2001,
        2000,
        1999,
        1998,
        1997,
        1996,

        ];

        return $results;
    }
}

if (! function_exists('months_menu')) {

    function months_menu(){
        $results =[
            0,1,2,3,4,5,6,7,8,9,10,11,12,
        ];

        return $results;
    }
}
