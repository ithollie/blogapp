<?php

    //validate  class 
    class  ValidateClass{

        public $temp;

        //constructor 
        function __construct(){

            $this->temp  =  false;
        
        }

        //validate function  takes  one  argument.
        function validate($str){

            $date =   explode('/', $str); 
            $data1 =  explode('-', $str); 
            $date2 =  explode('.', $str);

            if(strpos($str, '/') && !empty($str) && checkdate($date[0], $date[1], $date[2])){
                    
                $this->temp  =  true;

                return   $this->temp;

            }else{
                    return  false;
            }
            if(strpos($str, '-') && !empty($str) && checkdate($date1[0], $date1[1], $date1[2])){
                    
                $this->temp  =  true;

                return   $this->temp;

            }else{
                    return  false;
            }
            if(strpos($str, '.') && !empty($str) && checkdate($date2[0], $date2[1], $date2[2])){
                    
                $this->temp  =  true;

                return   $this->temp;

            }else{
                    return  false;
            }
        }
    }

?>

