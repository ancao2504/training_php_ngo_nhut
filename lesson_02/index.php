<?php 
    require_once "./functions.php";
    $result = "";
    $date = "";
    $month = "";
    $year = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            // Get the date, month and year of birth values from the form
            $date = isset($_POST["date"]) ? intval($_POST["date"]) : "";
            $month = isset($_POST["month"]) ? intval($_POST["month"]) : "";
            $year = isset($_POST["year"]) ? intval($_POST["year"]) : "";
            $result = calculateAgeBirthday($month, $date, $year);
        } catch (\Exception $e) {
            $result = 'Caught exception: '.  $e->getMessage(). "\n";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tuổi ngày sinh</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 align="center">Ngày sinh</h1>
        <form action="" method="Post">
            <table align="center">
                <tr class="item-tr-header">
                    <th>Ngày/Tháng/Năm:</th>
                    <td>
                        <input class="month-and-year" type="text" name="date" value="<?php echo $date ?>"> /
                        <input class="month-and-year" type="text" name="month" value="<?php echo $month ?>"> /
                        <input class="month-and-year" type="text" name="year" value="<?php echo $year ?>">
                        <button type="submit" name="button_notification" class="notification">Thông báo</button>
                    </td>
                </tr>
                <tr class="item-tr-result">
                    <th>Nội dung:</th>
                    <td>
                        <input class="result" type="text" value="<?php echo $result ?>" readonly>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>