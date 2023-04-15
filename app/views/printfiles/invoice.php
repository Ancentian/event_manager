<?php //echo var_dump($history['customerName']);die; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Print Invoice</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-size: 12px;
            background-color: #fff;
        }

        #products {
            width: 100%;
        }

        #products tr td {
            font-size: 12px;
        }

        #printbox {
            width: 280px;
            margin: 5pt;
            padding: 5px;
            text-align: justify;
        }

        .inv_info tr td {
            padding-right: 10pt;
        }

        .product_row {
            margin: 15pt;
        }

        .stamp {
            margin: 5pt;
            padding: 3pt;
            border: 3pt solid #111;
            text-align: center;
            font-size: 20pt;
            color
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body  dir="<?= LTR ?>">

    <div id='printbox'>
        <h2 style="margin-top:0" class="text-center">NewDawn Nonwoven<br>
            <b style="font-size: 10px;">KIKUYU GIKAMBURA ROAD</b><br>
            <b style="font-size: 10px;">P O. Box 1335-00217</b><br>
            <b style="font-size: 10px;">TEL: 0737492953/0721735169<br></b><br>
            <b style="font-size: 10px;">Email: newdawnnonwoven@gmail.com</b><br>
            <b style="font-size: 10px;">PIN: P051600698M</b><br>
            <b style="font-size: 10px;">TILL: 549746</b><br>
            <b style="font-size: 10px;">Acc. Bank: Family Bank</b><br>
            <b style="font-size: 10px;">Acc. No: 047000035169</b><br>
        </h2>


        <table class="inv_info">
            <tr>
                <td>Customer:</td>
                <td><?php echo ucwords($request['customerName']); ?> </td>
            </tr>

            <tr>
                <td>Invoice no:</td>
                <td>INV<?php echo str_pad( $request['id'], 4, "0", STR_PAD_LEFT ); ?></td>
            </tr>

            <tr>
                <td>Invoice Date: </td>
                <td><?php echo date('d/m/Y H:i')?><br></td>
            </tr>
        </table>
        <hr>
        <table id="products" >
            <tr class="product_row">
                <td colspan="2"><b> Amount</b></td>
                <td><b>Mode</b></td>
                <td><b>Date of Payment<b></td>
            </tr>
            <?php $i = 1; foreach ($payment as $one) { $totpaid += $one['amount_paid']; ?>
            <tr>
                <th scope="row"><?php echo $i ."." ?></th>
                <td><?php echo $one['amount_paid']; ?></td>
                <td><?php echo ucfirst($one['pmnt_mode']); ?></td>   
                <td><?php echo date('d/m/Y H:i', strtotime($one['created_at'])); ?> </td>
            </tr>
            <?php $i++; } ?>
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>


        </table>
        <!-- <hr> -->
        <table class="inv_info">
            <tr>
                <td><b>Total Billed</b></td>
                <td><b>Ksh. <?php echo number_format($request['total_billed']); ?></b></td>
            </tr>
            <tr>
                <td><b>Total Paid</b></td>
                <td><b>Ksh. <?php echo number_format($totalPaid); ?></b></td>
            </tr>
            <tr>
                <td><b>Total Due</b></td>
                <td><b>Ksh. <?php echo number_format($request['total_billed'] - $totalPaid); ?></b></td>
            </tr>
        </table>
    </div>
</body>
</html>
