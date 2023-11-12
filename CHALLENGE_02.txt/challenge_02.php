<?php

    function increase($value){
        return $value + 1;
    }

    function decrease($value){
        return $value - 1; 
    }

    function mulItself($value){
        return $value * $value;
    }

    function return_process_data(&$return_data,$value){
        $return_data.=$value;
        return $value;
    }

    function pre_process(&$value,&$return_data,$code){

        $value = match (trim($code)) {
            '#' => increase($value),
            '@' => decrease($value),
            '*' => mulItself($value),
            '&' => return_process_data($return_data,$value)
        };

    }

    function process(&$process_data,&$return_data,$code){
        $pre_process_code = str_split($code);
        foreach ($pre_process_code as $pre_process_code_value) {
            pre_process($process_data,$return_data,$pre_process_code_value);
        }
    }

	function process_complete(){
		$code = '&###@&*&###@@##@##&######@@#####@#@#@#@##@@@@@@@@@@@@@@@*&&@@@@@@@@@####@@@@@@@@@#########&#&##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@&';
		$pre_process_value = 0;
		$return_data = '';
		
		process($pre_process_value,$return_data,$code);

		return $return_data;
	}


    echo process_complete();