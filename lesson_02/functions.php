<?php 
    function calculateAgeBirthday($month, $date, $year) {
        $result = "";

        if (!isValidDateMonthYear($year, $month, $date)) {
            $result = "Ngày $date tháng $month năm $year không hợp lệ.";
        } else {
            $checkValidate = checkdate($month, $date, $year);
            // Check if the day, month and year are valid
            if (!$checkValidate) {
                $result = "Ngày tháng năm sinh không hợp lệ.";
            } else {
                // Create a DateTime object for the birthday
                $date_of_birth = new DateTime("$year-$month-$date");
                // Create a DateTime object for the current time
                $today = new DateTime();
                // Calculate current age
                $current_age = $date_of_birth->diff($today)->y;
                $currentYear = date("Y");
                
                // Create a DateTime object for birthdays in the current year
                $date_of_birth_in_year = new DateTime("$currentYear-$month-$date");
                
                // Check if a birthday has passed in the current year
                if ($today >= $date_of_birth_in_year) {
                    // Calculate the number of days past your birthday in the current year
                    $number_of_days_passed = $today->diff($date_of_birth_in_year)->days;
                    
                    // Check to see if it matches the current date
                    if ($today->format("d-m") == $date_of_birth_in_year->format("d-m")) {
                        $result = "Chúc mừng sinh nhật. Bạn đã $current_age tuổi.";
                    } else {
                        if($current_age > 0) {
                            $result = "Năm nay bạn $current_age tuổi. Ngày sinh nhật của bạn đã qua $number_of_days_passed ngày.";
                        } else {
                            $result = "Tuổi: $current_age không hợp lệ. Nên không tính được ngày sinh nhật của bạn đã qua.";
                        }
                    }
                } else {
                    // Calculate the number of days remaining until your birthday in the current year
                    $remaining_days = $date_of_birth_in_year->diff($today)->days;
                    $result = "Năm nay bạn $current_age tuổi còn $remaining_days ngày là sinh nhật bạn.";
                }
            }
        }

        return $result;
    }


    function isValidDateMonthYear($year, $month, $date) {
        // Kiểm tra tính hợp lệ của năm (ví dụ, yêu cầu 4 chữ số)
        if (strlen($year) !== 4 || !is_numeric($year)) {
            return false;
        }
    
        // Kiểm tra tính hợp lệ của tháng ($month)
        if ($month < 1 || $month > 12) {
            return false;
        }
    
        // Xác định số ngày trong tháng và kiểm tra ngày có hợp lệ không
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        if ($date < 1 || $date > $daysInMonth) {
            return false;
        }
    
        return true;
    }