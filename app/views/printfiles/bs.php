<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Print BS</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-size: 12px;
            background-color: #fff;
        }

        #products {
            width: 100%;
            margin-bottom: 30px;
        }

        #products tr td {
            font-size: 12px;
        }

        #printbox {
            width: 2480px;
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
        .text-left {
            text-align: left;
        }
        .bordered-cell{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body dir="<?= LTR ?>">

<div id='printbox'>
    <table style=" border-collapse: collapse;">
        <tr>
           <td><h2 style="margin-top:0;font-size: 22px;color: #535354;text-align: center;"><span style="color: #043161;">F-TIBA LTD </span><br><b style="font-size: 12px;">NAIROBI<br>PO BOX <br>NAIROBI-KENYA</b>
                        <br><b style="font-size: 12px;">TEL: 0724654191<br>Email: info@fortsortinnovations.co.ke</b></h2></td>
        </tr>
    </table>
    <hr>


    <table id="products" style="border-collapse: collapse;">
        <tr>
            <th style="text-align: center" colspan="2">BALANCE SHEET AS AT <?php echo date('d/m/Y');?></th>
        </tr>
        
        <tr class="product_row" style="background-color: #D6D4D7; margin-top: 10px">
            <td class="bordered-cell" style="color: #450662;"><b>ASSETS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>LIABILITIES</b></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell" rowspan="2">
                <h5 class="box-title titlefix">Assets</h5>
                <?php $totass = 0; foreach($assets as $one){ $totass +=$one['amount'];  ?>
                    <?php echo $one['account'];?>&nbsp; = &nbsp;<?php echo number_format($one['amount'],2,'.',',');?> <br>
                <?php } ?>
                <h5 class="box-title titlefix">Subtotal: &nbsp; <?php echo number_format($totass,2,'.',',');?></h5>
            </td>
            <td class="bordered-cell">
                <h5 class="box-title titlefix">Liabilities</h5>
                <?php $totli = 0; foreach($liabilities as $one){ $totli +=$one['amount'];  ?>
                    <?php echo $one['account'];?>&nbsp; = &nbsp;
                    <?php echo number_format($one['amount'],2,'.',',');?><br>
                <?php } ?>
                <h5 class="box-title titlefix">Subtotal: &nbsp; <?php echo number_format($totli,2,'.',',');?></h5>
            </td>
        </tr>
        <tr class="product_row">
            
            <td class="bordered-cell">
                <h5 class="box-title titlefix">Shareholders Equity</h5>
                    <?php $toteq = 0; foreach($equity as $one){ $totli +=$one['amount'];  ?>
                        <?php echo $one['account'];?>&nbsp; = &nbsp;
                        <?php echo number_format($one['amount'],2,'.',',');?><br>
                    <?php } ?>
                <h5 class="box-title titlefix">Subtotal: &nbsp; <?php echo number_format($toteq,2,'.',',');?></h5>
            </td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>TOTAL: </b><?php echo number_format($totass,2,'.',',');?></td>
            <td class="bordered-cell"><b>TOTAL: </b><?php echo number_format($toteq+$totli,2,'.',',');?></td>
        </tr>
        
    </table>

    <table>
        
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
           <td>Sign: </td> 
           <td>................................</td>
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
           <td>Stamp: </td> 
           <td></td>
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
    </table>
    
</div>
</body>
</html>
