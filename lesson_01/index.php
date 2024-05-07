
<?php 
    /* 
    * Bài 1
    *  Yêu cầu: 
    * Tách chuỗi và gán vào mảng
    * Xây dựng các hàm xuất mảng và thay thế
    * In ra các mảng cũ và mảng sau khi thay thế bằng cách gọi các hàm đã xây dựng ở trên
    */
?>

<!DOCTYPE html>
<html>
<head>
   <title>Lesson 1</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/style.css">
   <script type="text/javascript" src="./js/jquery-3.7.1.min.js"></script>
   <script type="text/javascript" src="./js/index.js"></script>
</head>
<body>
    <?php 
        $before_value = "";
        $after_value = "";
        $arrayInput = "";
        $valueNeedReplace = "";
        $valueReplace = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $arrayInput = isset($_POST['array_input']) ? $_POST['array_input'] : '';
            $valueNeedReplace = isset($_POST['value_need_replace']) ? $_POST['value_need_replace'] : '';
            $valueReplace = isset($_POST['value_replace']) ? $_POST['value_replace'] : '';
        }
    ?>
    <div class="container">
        <h1>THAY THẾ</h1>
        <form method="post" action="fetch.php" id="form_id">
            Nhập các phần tử: <input type="text" name="array_input" id="array_input_id" value="<?php echo $arrayInput ?>" />
            <br/><br/>
            Gía trị cần thay thế: <input type="text" name="value_need_replace" id="value_need_replace_id" value="<?php echo $valueNeedReplace ?>" />
            <br/><br/>
            Gía trị thay thế: <input type="text" name="value_replace" id="value_replace_id" value="<?php echo $valueReplace ?>" />
            <br/><br/>
            <input type="submit" name="btn_replace" id="submit_id" value="Thay thế" />
            <br/><br/>
            Gía trị cũ: <input type="post" name="before_value" id="before_value_id" value="<?php echo $before_value ?>" />
            <br/><br/>
            Gía trị mới: <input type="post" name="after_value" id="after_value_id" value="<?php echo $after_value ?>" />
            <br/><br/>
        </form>
        <div id="result_error"></div>
    </div>
</body>
</html>