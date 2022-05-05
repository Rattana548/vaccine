<?php
  require_once "conn/conn.php";
  $sql = "SELECT * FROM v_vaccine";
  $query = mysqli_query($conn,$sql);
  $result_list = array();
  while($row = mysqli_fetch_array($query)) {
    $result_list[] = $row;
  }

  if(isset($_POST['submit'])){ ?>


<?php }
?>
<div class="container-lg" style="min-height:600px;padding-top:50px;">
    <h1>วัคซีนโควิด-19</h1>
    <table class="table">
        <thead class="table-dark">
            <th>ชื่อ</th>
            <th>ผู้ผลิต</th>
            <th style="width: 100px;">ประสิทธิภาพ</th>
            <th style="width: 130px;">อายุที่ฉีดได้</th>
            <th>จำนวนโดส</th>
            <th>ผลข้างเคียง</th>
            <th style="width: 80px;">ตัวเลือก</th>
        </thead>
        <?php foreach ($result_list as $row){?>
        <tr>
            <td><?= $row["v_name"]?></td>
            <td><?= $row["v_producer"]?></td>
            <td><?= $row["v_effect"]?></td>
            <td><?= $row["v_minage"]?></td>
            <td><?= $row["v_detail"]?></td>
            <td><?= $row["v_seffects"]?></td>
            <td>
                <?php if($row["v_name"]=="Shinovac" && ($_SESSION["age"]<18 || $_SESSION["age"]>60) ){ ?>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    disabled>
                    จอง
                </button>


                <?php }else if($_SESSION["age"]<18){ ?>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    disabled>
                    จอง
                </button>

                <?php }else if($row["v_amount"] < 1){ ?>


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    disabled>
                    จอง
                </button>

                <?php }else{ ?>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    จอง
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ยืนยัน 2 ชั้น</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                กด จอง เพื่อยืนยัน
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <form action="vaccine.php" method="POST">
                                  <input type="text" class="btn btn-primary" name="vaccine" value="<?= $row["v_name"]?>" style="display:none;">
                                    <input type="submit" class="btn btn-primary" name="submit" value="จอง">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>