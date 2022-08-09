<?php
//export.php  
$connect = mysqli_connect("localhost", "root", "", "microv2");
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT * FROM payments";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>clientid</th>
                    <th>date</th>
                    <th>Paid Amount</th>
                    <th>Installment</th>
                    <th>Total Panalty</th>
                    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>  
                         <td>' . $row["clientid"] . '</td>  
                         <td>' . $row["date"] . '</td>  
                         <td>' . $row["payed_amount"] . '</td>  
       <td>' . $row["payinstrlment"] . '</td>  
       <td>' . $row["paypanalty"] . '</td>
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $output;
    }
}
