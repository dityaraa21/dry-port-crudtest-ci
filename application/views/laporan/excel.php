<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Nama_File.xls");
?>

<style type="text/css">
    table,
    th,
    td {
        border-collapse: collapse;
        padding: 15px;
        margin: 10px;
        color: #000;
    }
</style>

<div style="text-align: center;">
    <span style="font-size: 20px;"><b>Dryport Inland Indonesia</b></span>
</div>

<br>

<table border="1">
    <thead>
        <tr>
            <th>Container Number</th>
            <th>Size</th>
            <th>Type</th>
            <th>Gate on Date</th>
        </tr>
    </thead>

    <?php
    foreach ($data as $key => $value) { ?>
        <tr>
            <td scope="row"><?= $value->cn_number ?></td>
            <td scope="row"><?= $value->size ?></td>
            <td scope="row"><?= $value->type ?></td>
            <td scope="row"><?= $value->date ?></td>
        </tr>
    <?php } ?>
</table>