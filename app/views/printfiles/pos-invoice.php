<?php //echo $total;die;?>
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
   <h2 style="margin-top:0" class="text-center">Oakwood Hospital Ltd.<br>
    <b style="font-size: 10px;">Kikuyu / Gikambura/ Dagoretti Road off Southern Bypass</b><br>
    <b style="font-size: 10px;">P O. Box 395-10230</b>
        <br><b style="font-size: 10px;">TEL: 0720 126 297<br>Email: info@oakwoodhospital.co.ke</b></h2>

    <table class="inv_info">
        <tr>
            <td>Client:</td>
            <td><?php echo $receipt['name']; ?> <?php echo $receipt['lname']; ?></td>
        </tr>
        <tr>
            <td>Receipt no:</td>
            <td>#<?php echo str_pad( $receipt['id'], 4, "0", STR_PAD_LEFT ); ?></td>
        </tr>
        <tr>
            <td>Receipt Date: </td>
            <td><?php echo date('d/m/Y H:s', strtotime($receipt['created_at']))?><br></td>
        </tr>
    </table>
    <hr>
    <table id="products" >
        <tr class="product_row">
            <td colspan="2"><b> Medicine</b></td>
            <td><b>Qty&nbsp;</b></td>
            <td><b>Cost&nbsp;</b></td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <?php foreach(json_decode($receipt['particulars'],true) as $one){?>
            <tr class="product_row">
            <td colspan="2"><?php echo $one['prodName'];?></td>
            <td><?php echo $one['prodQty'];?></td>
            <td><?php echo $one['prodCost'];?></td>
        </tr>
        <?php }?>

    </table>
    <hr>
   
    <table class="inv_info">
        <tr>
            <td><b>Total</b></td>
            <td><b>Ksh. <?php echo $receipt['amount_payable']+$receipt['discount'] ?></b></td>
        </tr>
        <tr>
            <td><b>Discount</b></td>
            <td><b>Ksh. <?php echo number_format($receipt['discount']) ?></b></td>
        </tr>
       <tr>
            <td><b>Total</b></td>
            <td><b>Ksh. <?php echo number_format($receipt['amount_payable']); ?></b></td>
        </tr>

    </table>
    <hr>
    <table>

       
        <tr>
            <td>Served by: </td>
            <td><?php echo $this->session->userdata('user_aob')->name;?></td>
        </tr>
    </table>
    <hr>
    <div class="text-center">  ** Powered by: Fortsort 0724654191 **</div>


</div>
</body>
</html>
