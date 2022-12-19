<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        /* .line-title {
            border: 0;
            border-style: unset;
            border-top: 1px solid #000;
            font-size: large;
        } */

        table,
        td,
        th {
            border: 1px solid;
        }

        td {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        p {
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <p>PT DRY INLAND DRYPORT INDONESIA</p>

    <table class="table table-bordered">
        <tr>
            <th>Container Number</th>
            <th>Size</th>
            <th>Type</th>
            <th>Gate on Date</th>
        </tr>

        <?php
        foreach ($data as $key => $value) { ?>
            <tr>
                <td><?= $value->cn_number ?></td>
                <td><?= $value->size ?></td>
                <td><?= $value->type ?></td>
                <td><?= $value->date ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>