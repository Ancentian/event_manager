<?php echo $total['total_price']; ?>
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
            <td><?php echo $receipt['customerName']; ?> </td>
        </tr>
        <tr>
            <td>Receipt no:</td>
            <td>INV<?php echo str_pad( $receipt['id'], 4, "0", STR_PAD_LEFT ); ?></td>
        </tr>
        <tr>
            <td>Receipt Date: </td>
            <td><?php echo date('d/m/Y H:s', strtotime($receipt['created_at']))?><br></td>
        </tr>
    </table>
    <hr>
    <table id="products" >
        <tr class="product_row">
            <td colspan="2"><b> Mode of Payment</b></td>
            <td><b>Amount&nbsp;</b></td>
        </tr>
        <tr>
            <td colspan="2"><?php echo ucfirst($receipt['pmnt_mode']) ?></td>
            <td><?php echo $receipt['amount_paid'] ?></td>
        </tr>
    </table>
    <hr>

    <table class="inv_info">
        <tr>
            <td><b>Total</b></td>
            <td><b>Ksh. <?php echo number_format($receipt['amount_paid']) ?></b></td>
        </tr>
        <tr>
            <td><b>Total Due</b></td>
            <td><b>Ksh. <?php  echo number_format((float)abs($totdue), 2,'.','');?></b></td>
        </tr>
    </table>
    <hr>
    <table>
        <!-- <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr> -->

        <tr>
            <td>Received by: </td>
            <td><?php echo $receipt['firstname']." ".$receipt['lastname'];?></td>
        </tr>
        <!-- <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr>

        <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr> -->
    </table>
    <hr>
    <div class="text-center" hidden> Powered by: fortsortinnovations.co.ke</div>
</div>
</body>
</html>
