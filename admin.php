<?php

    require_once "conn/conn.php";

    $sql = "SELECT v_data.v_amount,v_vaccine.v_id,v_vaccine.v_name,v_user.v_age,v_vaccine.v_effect,v_data.date1,v_data.date2,v_user.v_fname FROM v_data INNER JOIN v_vaccine ON v_data.v_idvaccine = v_vaccine.v_id INNER JOIN v_user ON v_data.v_iduser = v_user.v_id";
    $query = mysqli_query($conn, $sql);
    $result_list = array();
    while($row = mysqli_fetch_array($query)) {
        $result_list[] = $row;
      }
?>


<div class="container-lg" style="min-height:600px;padding-top:50px;">
    <h1>Status Vaccine-19 ( สถาณะ วัคซีนโควิด-19 )</h1>
    <table class="table">
        <thead class="table-dark">
            <th>ชื่อ</th>
            <th>ชื่อวัคซีน</th>
            <th>อายุ</th>
            <th>จำนวนโดส</th>
            <th>วัน เข็ม 1</th>
            <th>ตัวเลือก</th>
            <th>วัน เข็ม 2</th>
            <th>ตัวเลือก</th>
        </thead>
        <?php foreach ($result_list as $row){?>
        <tr>
            <td><?= $result['v_fname']?></td>
            <td><?= $result['v_name']?></td>
            <td><?= $result['v_age']?></td>
            <td><?= $result['v_amount']?></td>
            <td><?= $result['date1']?></td>
            <td>
                <form action="allow.php" method="POST" style="float: left;margin-right:10px;">
                    <input type="text" class="btn btn-primary" name="id" value="" style="display:none;">
                    <input type="submit" class="btn btn-primary" name="submit" value="อนุญาต">
                </form>
                <form action="delectvaccine.php" method="POST">
                    <input type="text" class="btn btn-primary" name="id" value="" style="display:none;">
                    <input type="submit" class="btn btn-primary" name="submit" value="ยกเลิกการจอง">
                </form>
            </td>
            <td><?= $result['date2']?></td>
            <td>
                <form action="allow.php" method="POST" style="float: left;margin-right:10px;">
                    <input type="text" class="btn btn-primary" name="id" value="" style="display:none;">
                    <input type="submit" class="btn btn-primary" name="submit" value="อนุญาต">
                </form>
                <form action="delectvaccine.php" method="POST">
                    <input type="text" class="btn btn-primary" name="id" value="" style="display:none;">
                    <input type="submit" class="btn btn-primary" name="submit" value="ยกเลิกการจอง">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>


</div>