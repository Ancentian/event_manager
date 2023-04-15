<?php

$totincome = 0;
foreach($incomes as $one){
    $totincome += $one['amount'];
}

$totexp = 0;
foreach($expenses as $one){
    $totexp += $one['amount'];
}

if(sizeof($incomes) >0){
    $inc = sizeof($incomes);
}else{
    $inc = 1;
}

if(sizeof($expenses) >0){
    $exp = sizeof($expenses);
}else{
    $exp = 1;
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Print P&L</title>
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
            <th style="text-align: center" colspan="3">INCOME STATEMENT BETWEEN <?php echo $sdate;?> AND <?php echo $edate;?></th>
        </tr>
        <thead>
                                    <tr>
                                        <th style="border: 1px solid black;text-align: left">Type</th>
                                        <th style="border: 1px solid black;text-align: left">Accounts</th>
                                        <th style="border: 1px solid black;text-align: left">Amount</th>
                                    </tr>
                                </thead>
        <tbody>
                                    <tr>
                                        <th rowspan="<?php echo $inc+1;?>" style="border: 1px solid black;text-align: left">Income</th>
                                        <td style="border-right: 1px solid black;text-align: left"><?php echo $incomes[0]['account'];?></td>
                                        <td style="border-right: 1px solid black;text-align: left"><?php echo number_format($incomes[0]['amount'],2,'.',',');?></td>
                                    </tr>
                                    <?php for($i=1;$i<sizeof($incomes);$i++){$one = $incomes[$i];
                                        
                                    ?>
                                    <tr>
                                        <td style="border-right: 1px solid black;text-align: left"><?php echo $incomes[$i]['account'];?></td>
                                        <td style="border-right: 1px solid black;text-align: left"><?php echo number_format($incomes[$i]['amount'],2,'.',',');?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th style="border: 1px solid black;text-align: left">TOTAL</th>
                                        <th style="border: 1px solid black;text-align: left"><?php echo number_format($totincome,2,'.',',');?></th>
                                    </tr>
                                    <tr>
                                        <th rowspan="<?php echo $exp+1;?>" style="border: 1px solid black;text-align: left">Expense</th>
                                        <td style="border-right: 1px solid black;text-align: left"><?php echo $expenses[0]['account'];?></td>
                                        <td style="border-right: 1px solid black;text-align: left"><?php echo number_format($expenses[0]['amount'],2,'.',',');?></td>
                                    </tr>
                                    <?php for($i=1;$i<sizeof($expenses);$i++){$one = $expenses[$i];
                                        
                                    ?>
                                    <tr>
                                        <td style="border-right: 1px solid black;text-align: left"><?php echo $expenses[$i]['account'];?></td>
                                        <td style="border-right: 1px solid black;text-align: left"><?php echo number_format($expenses[$i]['amount'],2,'.',',');?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th style="border: 1px solid black;text-align: left">TOTAL</th>
                                        <th style="border: 1px solid black;text-align: left"><?php echo number_format($totexp,2,'.',',');?></th>
                                    </tr>
                                     <tr>
                                        <th style="border: 1px solid black;text-align: left">NET INCOME</th>
                                        <td style="border: 1px solid black;text-align: left"></td>
                                        <th style="border: 1px solid black;text-align: left"><?php echo number_format($totincome-$totexp,2,'.',',');?></th>
                                    </tr>
                                </tbody>
        
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
