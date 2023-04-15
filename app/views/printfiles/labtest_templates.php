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
            margin-top: 30px;
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
            <td><img src="<?php echo base_url();?>res/assets/images/oakwood.jpeg" style="height: 100px;"></td>
            <td style="padding-left: 20px;"></td>
            <td>
                <h2 style="margin-top:0;font-size: 22px;color: #535354;" class="text-left"><span style="color: #043161;">Oakwood Hospital Ltd.</span><br>
                <b style="font-size: 12px;">Kikuyu / Gikambura/ Dagoretti Road off Southern Bypass<br></b>
                <b style="font-size: 12px;">P O. Box 395-10230<br></b>
                    <br><b style="font-size: 12px;">TEL: 0720 126 297<br>Email: info@oakwoodhospital.co.ke</b></h2>
            </td>
            <td colspan="3" style="color: white; padding-left: 150px;"></td>
            <td style="background-color: #055797;padding-left: 5px;"></td>
            <td style="background-color: #900309;padding-left: 5px;"></td>
            <td style="background-color: #6E6D6D;padding-left: 5px;"></td>
        </tr>
    </table>
    <hr>

    <table class="inv_info">
        <tr class="product_row">
            <td><b>NAME: </b></td>
            <td><?php echo $tdetails['pname']." ".$tdetails['mname']." ".$tdetails['lname'];?></td>
            <td><b>AGE: </b></td>
            <td><?php echo date('Y-m-d')-$tdetails['dob'];?></td>
        </tr>
        <tr class="product_row">
            <td><b>GENDER: </b></td>
            <td><?php echo $tdetails['gender'];?></td>
            <td><b>TEST: </b></td>
            <td><?php echo $this_test;?></td>
        </tr>
        <tr class="product_row">
            <td><b>REPORTED BY: </b></td>
            <td><?php echo $requested_by;?></td>
            <td><b>DATE: </b></td>
            <td><?php echo date('Y-m-d H:i:s');?></td>
        </tr>
        <tr class="product_row">
            <td colspan="4">
               
            </td>
        </tr>
        
    </table>
    <?php if($test == "11"){?>
    <table id="products" style="border-collapse: collapse;">
        <tr>
            <td colspan="4">
               
            </td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell" style="color: #450662;"><b>URINE MACROSCOPY</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['urine_macroscopy'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell" style="color: #450662;"><b>URINE CHEMISTRY</b></td>
            <td class="bordered-cell" colspan="2"></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>LEUC</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['leuc'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>NITRITES</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['nitrites'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>UROBILINOGEN</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['urobilinogen'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>PROTEIN</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['protein'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>PH</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['ph'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>BLOOD</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['blood'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>SG</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['sg'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>KETONS</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['ketons'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>BIL</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['bil'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>GLUCOSE</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['glucose'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell" style="color: #450662;"><b>URINE MICROSCOPY</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['urine_microscopy'];?></td>
        </tr>
    </table>
<?php } ?>

 <?php if($test == "22"){?>
    <table id="products" style="border-collapse: collapse;">
        <tr>
            <td colspan="4">
               
            </td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell" style="color: #450662;"><b>ANC PROFILE</b></td>
            <td class="bordered-cell" colspan="2"></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>BLOOD BROUP</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['blood_grp'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>RHESUS</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['rhesus'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>HB</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['hb'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>VDRL</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['vdrl'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>HBSAG</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['hbsag'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell"><b>HIV/AIDS</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['hiv_aids'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell" style="color: #450662;"><b>URINE MACROSCOPY</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['urine_macroscopy'];?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell" style="color: #450662;"><b>URINE MICROSCOPY</b></td>
            <td class="bordered-cell" colspan="2"><?php echo $ticket_data['urine_microscopy'];?></td>
        </tr>
    </table>
<?php } ?>

<?php if($test == "13"){?>

    <table id="products" style="border-collapse: collapse;">
        <tr class="product_row" style="background-color: #D6D4D7;">
            <td class="bordered-cell" style="color: #450662;"><b>TEST NAME</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>RESULTS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>UNITS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>LOW LIMIT</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>HIGH LIMIT</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>STATUS</b></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">ALBUMIN</td>
            <td class="bordered-cell"><?php echo $ticket_data['albumin'];?></td>
            <td class="bordered-cell">g/l</td>
            <td class="bordered-cell">35</td>
            <td class="bordered-cell">50</td>
            <td class="bordered-cell"><?php if($ticket_data['albumin']<='35'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['albumin']>='50'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">ALKP</td>
            <td class="bordered-cell"><?php echo $ticket_data['alkp'];?></td>
            <td class="bordered-cell">u/l</td>
            <td class="bordered-cell">40</td>
            <td class="bordered-cell">105</td>
            <td class="bordered-cell"><?php if($ticket_data['alkp']<='40'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['alkp']>='105'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">BIL DIRECT</td>
            <td class="bordered-cell"><?php echo $ticket_data['bil_direct'];?></td>
            <td class="bordered-cell">Umol/l</td>
            <td class="bordered-cell">0</td>
            <td class="bordered-cell">5</td>
            <td class="bordered-cell"><?php if($ticket_data['bil_direct']<='0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['bil_direct']>='5'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">BIL TOTAL</td>
            <td class="bordered-cell"><?php echo $ticket_data['bil_total'];?></td>
            <td class="bordered-cell">Umol/l</td>
            <td class="bordered-cell">3</td>
            <td class="bordered-cell">22</td>
            <td class="bordered-cell"><?php if($ticket_data['bil_total']<='3'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['bil_total']>='22'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">GOT</td>
            <td class="bordered-cell"><?php echo $ticket_data['got'];?></td>
            <td class="bordered-cell">u/l</td>
            <td class="bordered-cell">17</td>
            <td class="bordered-cell">59</td>
            <td class="bordered-cell"><?php if($ticket_data['got']<='17'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['got']>='59'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">GPT</td>
            <td class="bordered-cell"><?php echo $ticket_data['gpt'];?></td>
            <td class="bordered-cell">u/l</td>
            <td class="bordered-cell">21</td>
            <td class="bordered-cell">72</td>
            <td class="bordered-cell"><?php if($ticket_data['gpt']<='21'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['gpt']>='72'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">PROTEIN</td>
            <td class="bordered-cell"><?php echo $ticket_data['protein'];?></td>
            <td class="bordered-cell">g/l</td>
            <td class="bordered-cell">63</td>
            <td class="bordered-cell">82</td>
            <td class="bordered-cell"><?php if($ticket_data['protein']<='63'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['protein']>='82'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">gGT</td>
            <td class="bordered-cell"><?php echo $ticket_data['ggt'];?></td>
            <td class="bordered-cell">u/l</td>
            <td class="bordered-cell">15</td>
            <td class="bordered-cell">73</td>
            <td class="bordered-cell"><?php if($ticket_data['ggt']<='15'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['ggt']>='73'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        
    </table>
<?php } ?>

<?php if($test == "28"){?>

    <table id="products" style="border-collapse: collapse;">
        <tr class="product_row" style="">
            <td class="bordered-cell" style="color: #450662;background-color: #D6D4D7; width: 50px;"><b>STOOL MICROSCOPY</b></td>
            <td class="bordered-cell"><?php echo $ticket_data['stool_microscopy'];?></td>
        </tr>
       <tr class="product_row" style="">
            <td class="bordered-cell" style="color: #450662;background-color: #D6D4D7; width: 50px;"><b>STOOL MACROSCOPY</b></td>
            <td class="bordered-cell"><?php echo $ticket_data['stool_macroscopy'];?></td>
        </tr>
      
     </table>

 <?php } ?>
 <?php if($test == "27"){?>

    <table id="products" style="border-collapse: collapse;">
        <tr class="product_row" style="background-color: #D6D4D7;">
            <td class="bordered-cell" style="color: #450662;"><b>TEST NAME</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>RESULTS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>UNITS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>LOW LIMIT</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>HIGH LIMIT</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>STATUS</b></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">WBC</td>
            <td class="bordered-cell"><?php echo $ticket_data['wbc'];?></td>
            <td class="bordered-cell">X10^9/L</td>
            <td class="bordered-cell">4.0</td>
            <td class="bordered-cell">10.0</td>
            <td class="bordered-cell"><?php if($ticket_data['wbc']<='4.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['wbc']>='10.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">LYMPH</td>
            <td class="bordered-cell"><?php echo $ticket_data['lymph'];?></td>
            <td class="bordered-cell">X10^9/L</td>
            <td class="bordered-cell">0.6</td>
            <td class="bordered-cell">4.1</td>
            <td class="bordered-cell"><?php if($ticket_data['lymph']<='0.6'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['lymph']>='4.1'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">MID</td>
            <td class="bordered-cell"><?php echo $ticket_data['mid'];?></td>
            <td class="bordered-cell">X10^9/L</td>
            <td class="bordered-cell">0.1</td>
            <td class="bordered-cell">1.8</td>
            <td class="bordered-cell"><?php if($ticket_data['mid']<='0.1'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['mid']>='1.8'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">NEUT %</td>
            <td class="bordered-cell"><?php echo $ticket_data['neut_pc'];?></td>
            <td class="bordered-cell">%</td>
            <td class="bordered-cell">50.0</td>
            <td class="bordered-cell">70.0</td>
            <td class="bordered-cell"><?php if($ticket_data['neut_pc']<='50.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['neut_pc']>='70.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">LYMPH %</td>
            <td class="bordered-cell"><?php echo $ticket_data['lymph_pc'];?></td>
            <td class="bordered-cell">%</td>
            <td class="bordered-cell">20.0</td>
            <td class="bordered-cell">40.0</td>
            <td class="bordered-cell"><?php if($ticket_data['lymph_pc']<='20.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['lymph_pc']>='40.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">MID %</td>
            <td class="bordered-cell"><?php echo $ticket_data['mid_pc'];?></td>
            <td class="bordered-cell">%</td>
            <td class="bordered-cell">1.0</td>
            <td class="bordered-cell">15.0</td>
            <td class="bordered-cell"><?php if($ticket_data['mid_pc']<='1.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['mid_pc']>='15.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">NEUT</td>
            <td class="bordered-cell"><?php echo $ticket_data['neut'];?></td>
            <td class="bordered-cell">X10^9/L</td>
            <td class="bordered-cell">2.0</td>
            <td class="bordered-cell">7.8</td>
            <td class="bordered-cell"><?php if($ticket_data['neut']<='2.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['neut']>='7.8<'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">HB</td>
            <td class="bordered-cell"><?php echo $ticket_data['hb'];?></td>
            <td class="bordered-cell">g/ld</td>
            <td class="bordered-cell">12.0</td>
            <td class="bordered-cell">16.0</td>
            <td class="bordered-cell"><?php if($ticket_data['hb']<='12.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['hb']>='16.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">RBC</td>
            <td class="bordered-cell"><?php echo $ticket_data['rbc'];?></td>
            <td class="bordered-cell">X10^9/L</td>
            <td class="bordered-cell">4.0</td>
            <td class="bordered-cell">5.5</td>
            <td class="bordered-cell"><?php if($ticket_data['rbc']<='4.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['rbc']>='5.5'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">HCT</td>
            <td class="bordered-cell"><?php echo $ticket_data['hct'];?></td>
            <td class="bordered-cell">%</td>
            <td class="bordered-cell">40.0</td>
            <td class="bordered-cell">48.0</td>
            <td class="bordered-cell"><?php if($ticket_data['hct']<='40.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['hct']>='48.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">MCV</td>
            <td class="bordered-cell"><?php echo $ticket_data['mcv'];?></td>
            <td class="bordered-cell">fl</td>
            <td class="bordered-cell">80.0</td>
            <td class="bordered-cell">99.0</td>
            <td class="bordered-cell"><?php if($ticket_data['mcv']<='80.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['mcv']>='99.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">MCH</td>
            <td class="bordered-cell"><?php echo $ticket_data['mch'];?></td>
            <td class="bordered-cell">pg</td>
            <td class="bordered-cell">26.0</td>
            <td class="bordered-cell">32.0</td>
            <td class="bordered-cell"><?php if($ticket_data['mch']<='26.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['mch']>='32.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">MCHC</td>
            <td class="bordered-cell"><?php echo $ticket_data['mchc'];?></td>
            <td class="bordered-cell">g/dl</td>
            <td class="bordered-cell">32.0</td>
            <td class="bordered-cell">36.0</td>
            <td class="bordered-cell"><?php if($ticket_data['mchc']<='32.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['mchc']>='36.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">RDW-CV</td>
            <td class="bordered-cell"><?php echo $ticket_data['rdw_cv'];?></td>
            <td class="bordered-cell">%</td>
            <td class="bordered-cell">11.5</td>
            <td class="bordered-cell">14.5</td>
            <td class="bordered-cell"><?php if($ticket_data['rdw_cv']<='11.5'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['rdw_cv']>='14.5'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">RDW-SD</td>
            <td class="bordered-cell"><?php echo $ticket_data['rdw_sd'];?></td>
            <td class="bordered-cell">fl</td>
            <td class="bordered-cell">37.0</td>
            <td class="bordered-cell">54.0</td>
            <td class="bordered-cell"><?php if($ticket_data['rdw_sd']<='37.0'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['rdw_sd']>='54.0'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">PLT</td>
            <td class="bordered-cell"><?php echo $ticket_data['plt'];?></td>
            <td class="bordered-cell">X10^9/L</td>
            <td class="bordered-cell">100</td>
            <td class="bordered-cell">300</td>
            <td class="bordered-cell"><?php if($ticket_data['plt']<='100'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['plt']>='300'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">MPV</td>
            <td class="bordered-cell"><?php echo $ticket_data['mpv'];?></td>
            <td class="bordered-cell">fl</td>
            <td class="bordered-cell">7.4</td>
            <td class="bordered-cell">10.4</td>
            <td class="bordered-cell"><?php if($ticket_data['mpv']<='7.4'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['mpv']>='10.4'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
    </table>
    <?php } ?>
 <?php if($test == "20"){?>

    <table id="products" style="border-collapse: collapse;">
        <tr class="product_row" style="background-color: #D6D4D7;">
            <td class="bordered-cell" style="color: #450662;"><b>TEST NAME</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>RESULTS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>UNITS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>LOW LIMIT</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>HIGH LIMIT</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>STATUS</b></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">TF3</td>
            <td class="bordered-cell"><?php echo $ticket_data['tf3'];?></td>
            <td class="bordered-cell">mg/dl</td>
            <td class="bordered-cell">0.202</td>
            <td class="bordered-cell">0.443</td>
            <td class="bordered-cell"><?php if($ticket_data['tf3']<='0.202'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['tf3']>='0.443'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">FT4</td>
            <td class="bordered-cell"><?php echo $ticket_data['tf4'];?></td>
            <td class="bordered-cell">pmol/l</td>
            <td class="bordered-cell">12.00</td>
            <td class="bordered-cell">22.00</td>
            <td class="bordered-cell"><?php if($ticket_data['tf4']<='12.00'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['tf4']>='22.00'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">T3</td>
            <td class="bordered-cell"><?php echo $ticket_data['t3'];?></td>
            <td class="bordered-cell">nmol/l</td>
            <td class="bordered-cell">1.30</td>
            <td class="bordered-cell">3.10</td>
            <td class="bordered-cell"><?php if($ticket_data['t3']<='1.30'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['t3']>='3.10'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">TSH</td>
            <td class="bordered-cell"><?php echo $ticket_data['tsh'];?></td>
            <td class="bordered-cell">Uiu/ml</td>
            <td class="bordered-cell">0.270</td>
            <td class="bordered-cell">4.200</td>
            <td class="bordered-cell"><?php if($ticket_data['tsh']<='0.270'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['tsh']>='4.200'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        
    </table>
    <?php } ?>
 <?php if($test == "26"){?>
    <table id="products" style="border-collapse: collapse;">
        <tr class="product_row" style="background-color: #D6D4D7;">
            <td class="bordered-cell" style="color: #450662;"><b>TEST NAME</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>RESULTS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>UNITS</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>LOW LIMIT</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>HIGH LIMIT</b></td>
            <td class="bordered-cell" style="color: #450662;"><b>STATUS</b></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">CREATININE</td>
            <td class="bordered-cell"><?php echo $ticket_data['creatinine'];?></td>
            <td class="bordered-cell">umol/l</td>
            <td class="bordered-cell">53</td>
            <td class="bordered-cell">120</td>
            <td class="bordered-cell"><?php if($ticket_data['creatinine']<='53'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['creatinine']>='120'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">UREA</td>
            <td class="bordered-cell"><?php echo $ticket_data['urea'];?></td>
            <td class="bordered-cell">nmol/l</td>
            <td class="bordered-cell">3.2</td>
            <td class="bordered-cell">7.1</td>
            <td class="bordered-cell"><?php if($ticket_data['urea']<='3.2'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['urea']>='7.1'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">SODIUM</td>
            <td class="bordered-cell"><?php echo $ticket_data['sodium'];?></td>
            <td class="bordered-cell">nmol/l</td>
            <td class="bordered-cell">134</td>
            <td class="bordered-cell">144</td>
            <td class="bordered-cell"><?php if($ticket_data['sodium']<='134'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['sodium']>='144'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">POTASSIUM</td>
            <td class="bordered-cell"><?php echo $ticket_data['potassium'];?></td>
            <td class="bordered-cell">nmol/l</td>
            <td class="bordered-cell">3.5</td>
            <td class="bordered-cell">5.6</td>
            <td class="bordered-cell"><?php if($ticket_data['potassium']<='3.5'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['potassium']>='5.6'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        <tr class="product_row">
            <td class="bordered-cell">CHLORIDES</td>
            <td class="bordered-cell"><?php echo $ticket_data['chloride'];?></td>
            <td class="bordered-cell">nmol/l</td>
            <td class="bordered-cell">98</td>
            <td class="bordered-cell">108</td>
            <td class="bordered-cell"><?php if($ticket_data['chloride']<='98'){echo "<span style='color: red'>Low</span>";}elseif ($ticket_data['chloride']>='108'){echo "<span style='color: red;'>High</span>";}else{echo "Normal";}?></td>
        </tr>
        
    </table>
<?php } ?>
    <hr>
    <table>
        
        <tr>
           <td colspan="3">
               &nbsp; 
            </td> 
        </tr>
        
        <tr>
           <td>Tests by: </td> 
           <td><?php echo $tests_by;?></td>
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
