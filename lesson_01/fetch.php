<?php
    require_once "./helpers/excute.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $arrayInput = isset($_POST['array_input']) ? $_POST['array_input'] : '';
        $valueNeedReplace = isset($_POST['value_need_replace']) ? $_POST['value_need_replace'] : '';
        $valueReplace = isset($_POST['value_replace']) ? $_POST['value_replace'] : '';

        if (empty($arrayInput)) {
            $response = array(
                'error' => true,
                'message' => 'Vui lòng nhập chuỗi cần thay thế'
            );
        } else if (empty($valueNeedReplace)) {
            $response = array(
                'error' => true,
                'message' => 'Vui lòng nhập giá trị cần thay thế'
            );
        } else if (empty($valueReplace)) {
            $response = array(
                'error' => true,
                'message' => 'Vui lòng nhập giá trị thay thế'
            );
        } else {
            if (!empty($arrayInput) && !empty($valueNeedReplace) && !empty($valueReplace)) {
                $string_before = $arrayInput;
                $needed_value_replace = $valueNeedReplace;
                $value_replace = $valueReplace;
                $results = replaceElementsArray($string_before, $needed_value_replace, $value_replace);
                // Return JSON response to update form fields
                $response = array(
                    'before_value' => $results['string_before'],
                    'after_value' => $results['string_after'],
                    'error' => false // No error
                );
            }
        }
    } else {
        // Return JSON response for invalid request
        $response = array(
            'error' => true,
            'message' => 'Invalid request!'
        );
    }

    echo json_encode($response);
    die();