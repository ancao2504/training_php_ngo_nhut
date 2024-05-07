<?php 

    function replaceElementsArray($string_before, $needed_value_replace, $value_replace, $needle = ",") {
        try {
            $results = [];
            if (str_contains($string_before, $needle)) {
                // Split the input string into an array using comma as the delimiter
                $array_before = explode($needle, $string_before);
    
                if (is_array($array_before) && count($array_before) > 0) {
                    foreach ($array_before as $key => $value) {
                        // Check if the current value in the array matches the value to be replaced
                        if (trim($value) == $needed_value_replace) {
                        $array_before[$key] = $value_replace;
                        }
                    }
                }
    
                $string_after = implode($needle, $array_before);
                $results = [
                    'string_before' => $string_before,
                    'string_after' => $string_after
                ];
            } else {
                $results = "The string '$needle' was not found in the string '$string_before'.";
            }
            return $results;
  
        } catch (\Exception $e) {
           // If any exception occurs, return an error message
           return 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }