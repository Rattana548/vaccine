<?php

  require_once "conn/conn.php";
  $sql = "SELECT * FROM v_vaccine";
  $query = mysqli_query($conn,$sql);
  $result_list = array();
  while($row = mysqli_fetch_array($query)) {
    $result_list[] = $row;
  }
?>
<div class="container-lg">
    <h1>วัคซีนโควิด-19</h1>
    <table class="table">
        <thead class="table-dark">
            <th>ชื่อ</th>
            <th>ผู้ผลิต</th>
            <th>ประสิทธิภาพ</th>
            <th style="width: 130px;">อายุที่ฉีดได้</th>
            <th style="width: 200px;">จำนวนโดส</th>
            <th>ผลข้างเคียง</th>
        </thead>
        <?php foreach ($result_list as $row){?>
        <tr>
            <td><?= $row["v_name"]?></td>
            <td><?= $row["v_producer"]?></td>
            <td><?= $row["v_effect"]?></td>
            <td style="width: 130px;"><?= $row["v_minage"]?></td>
            <td><?= $row["v_detail"]?></td>
            <td><?= $row["v_seffects"]?></td>
        </tr>
        <?php } ?>
    </table>
</div>