<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="Assets/js/html2pdf.js"></script>
    <link rel="stylesheet" href="Assets/css/stylepdf.css">
</head>
<body style="margin:5px auto; width:98%;" titulo-pdf="invoice_<?=$concomprobantes_impr['v_BL']?>_<?=$invoice['com_NumComp']?>.pdf">
			<img style="width: 100%; align: center;" src="Assets/img/header.jpg">
			<br><br> 
    <header>
        <div class="header--title-container">
			<br><br>
            <h1>INVOICE DATED № 00<?=$invoice['com_NumComp']?> FROM <?=$invoice['com_FecContab']?></h1>
			<br><br>
            <button id="btnCrearPdf">Generate</button>
			<br><br>
        </div>
    </header>
    <main>
        <section id="encabFac" class="main-table--container" style="margin:3px auto; font-size: 8px; width:98%; vertical-align = center;">
            <h1 style="font-size: 3em; color:red !important; margin:5px auto; text-align: center; <?=(($invoice['com_Libro']=='9998')?'display: none;':'')?>">Proforma invoice</h1>
            <br><br><br><br>
			<table style="vertical-align = center;">
                <tr>
                    <td class="right">
                        <b>Seller:</b>
                        <br>
                        <?=$edoc_empresa['razonSocial']?>
                    </td>
                    <td>
                        <b>Buyer:</b>
                        <br>
                        <span class="filled-span"><?=$concomprobantes_impr['v_Description']?></span>
                    </td>
                    <td>
                        <b>Consignee:</b>
                        <br>
                        <?= $concomprobantes_impr['v_consignatario'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="right">
                        <b>Address:</b>
                        <br>
                        <?=$edoc_empresa_rus['dirEcuador']?>        
                    </td>
                    <td>
                        <b>Address Buyer:</b>
                        <br>
                        <?=$concomprobantes_impr['v_BuyerAddress']?>
                    </td>
                    <td>
                        <b>Address Consignee:</b>
                        <br>
                        <?= $concomprobantes_impr['v_consigAddress'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="right">
                        <b>Supplier’s details:</b><br>
                        <b>Beneficiary Bank: </b> <?=$bank['v_BankName']?><br>
                        <b>Swift Code: </b> <?=$bank['v_SwiftCode']?><br>
                        <b>Account: </b> <?=$bank['v_CheckingAccount']?><br>
                        <b>Brunch Address: </b> <?=$bank['v_AddressBank']?><br>
                        <b>Intermediary Bank: </b> <?=$bank['v_InterBank']?><br>
                        <b>Swift: </b> <?=$bank['v_IBSwift']?><br>
                        <b>ABA: </b> <?=$bank['v_ABACode']?><br>
                        <b>Address: </b> <?=$bank['v_IBAddress']?><br>
                        <b>Account Number: </b> <?=$bank['v_IBAccount']?>
                    </td>`
                    <td colspan="2">
                        <b>Buyer’s details:</b>
                        <br>
                        <?=str_replace("\n","<br>",$concomprobantes_impr['v_BuyerBank'])?>
                    </td>
                </tr>
                <tr>
                    <td >
                        <b>Consignor:</b>
                        <br>
                        <?=$edoc_empresa['razonSocial']?>
                    </td>
                    <td class="half" id="bolded">
                        Foreign trade contract
                    </td>
                    <td class="half">
                        <?=$concomprobantes_impr['v_Contract']?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <b>Address:</b>
                        <br>
                        <?=$edoc_empresa_rus['dirEcuador']?>   
                    </td>
                    <td id="bolded">
                        Delivery terms and conditions (Incoterms 2010):
                    </td>
                    <td>
                        <?=$concomprobantes_impr['v_Delivery_Cond']?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span id="bolded"> Lead time for delivery:</span> <br>
                        <!-- (If not indicated, the lead time of delivery of the Goods is 10 Days upon agreement upon of the Specification in accordance with the Contract) -->
                    </td>
                    <td>
                        <?=$concomprobantes_impr['v_Delivery_Term']?>
                    </td>
                </tr>
            </table>
			<footer class="common-footer">
				<tr>
                    <td colspan="17" style="border:0 !important;  text-align: center">
						<br><br><br><br>
                    </td>
                </tr>
				<tr>
                    <td colspan="17" style="border:0 !important;  text-align: center">
						<br><br><br><br><br><br><br><br><br><br>
						<img style="display: inline-block; width: 100%; vertical-align: bottom; " src="Assets/img/footer.jpg">
                    </td>
                </tr>
			</footer>
        </section>

        <section class="main-table--container" style="font-size: 8px; margin:3px auto; width:98%;vertical-align = center;">
		    <div class="header--title-container">
				<img style="width: 100%; align: center;" src="Assets/img/header2.jpg">
				<br>
            </div>
            <small><br><br><br>
            <table style="font-size: 8px; width:100%;vertical-align = center;">
                <tr>
                    <td class="right" rowspan="2" colspan="4">
                        <b>Other terms andconditions (if applicable):</b><br>
                        <?=$concomprobantes_impr['v_BL']?>
                    </td>
                    <td class="half" colspan="6">
                        <span id="bolded">Term of payment:</span><br>
                        <!-- The Parties have agreed that the postponement (installment) payment of funds is not a loan and interest for the period of utilization of the funds not be accrued and paid. -->
                    </td>
                    <td colspan="6">
                        <?=$concomprobantes_impr['v_Payment_Cond']?>
                    </td>
                </tr>
                <tr id="bolded">
                    <td class="half" colspan="6">
                        Currency:
                    </td>
                    <td class="half" id="center" colspan="6">
                        USD
                    </td>
                </tr>
                <tr>
                    <td class="first-left" id="bolded">
                        No.
                    </td>
                    <!--<td class="second-left" id="bolded">
                        PLU 
                    </td>-->
                    <td class="third-left" id="bolded">
                        Designation <br>of the <br>Goods
                    </td>
                    <td class="fourth-left" id="bolded">
                        Designation <br>of the <br>Goods
                    </td>
                    <td class="fifth-left" id="bolded">
                          Size  
                    </td>
                    <td class="first-center" id="bolded">
                        GLN
                    </td>
                    <td class="second-center" id="bolded">
                        Manufacturer of the Goods
                    </td>
                    <td class="third-center" id="bolded">
                        Harvest Year
                    </td>
                    <td class="fourth-center" id="bolded">
                        Package of the Goods
                    </td>
                    <td class="fifth-center" id="bolded">
                        Measure ment unit of the Goods
                    </td>
                    <td class="first-right" id="bolded">
                        Quantity <br> of the <br> Goods, <br> number
                    </td>
                    <td class="second-right" id="bolded">
                        Net weight box, kg
                    </td>
                    <td class="third-right" id="bolded">
                        Gross weight box, kg
                    </td>
                    <td class="fourth-right" id="bolded">
                        Net weight consig   <br> nment, kg
                    </td>
                    <td class="fifth-right" id="bolded">
                        Gross weight consig <br> nment, kg
                    </td>
                    <td class="sixth-right" id="bolded">
                        Price per a unit of
                    </td>
                    <td class="seventh-right" id="bolded">
                        Cost of the Goods
                    </td>
                </tr>
                <?php
                    $i=1;
                    foreach($invdetalle as $det){
                ?>
                <tr style="font-size: 8px;">
                    <td class="first-left">
                        <?=$i?>.
                    </td>
                    <td class="third-left">
                        <?=$concomprobantes_impr['v_Product']?>
                    </td>
                    <td class="fourth-left">
                        Ecuador<br>
                    </td>
                    <td class="fifth-left">
                        39 <br>to<br> 46 mm
                    </td>
                    <td style="border:0 !important; transform: rotate(-90deg); vertical-align: middle;">
                        <div style="font-size: 11px; margin:5px 0px;">
                            0735745905166
                        </div>
                    </td>
                    <td class="second-center">
                        <div style="font-size: 10px; margin:5px 0px;">
                            <?=$edoc_empresa['razonSocial']?>
                        </div>
                    </td>
                    <td class="third-center">
                        <?=substr($invoice['com_FecContab'],0,4)?>
                    </td>
                    <td class="fourth-center">
                        card <br> board box
                    </td>
                    <td class="fifth-center">
                        box
                    </td>
                    <td class="first-right">
                        <?=round($det['det_CanDespachada'])?>
                    </td>
                    <td class="second-right">
                        <?=round(($invoice['com_kgsneto']/$det['det_CanDespachada']),2)?>
                    </td>
                    <td class="third-right">
                        <?=round(($invoice['com_kgsbruto']/$det['det_CanDespachada']),2)?>
                    </td>
                    <td class="fourth-right">
                        <?=$invoice['com_kgsneto']?>
                    </td>
                    <td class="fifth-right">
                        <?=$invoice['com_kgsbruto']?>
                    </td>
                    <td class="sixth-right">
                        <?=round($det['det_valunitario'],2)?>
                    </td>
                    <td class="seventh-right">
                        <?=round(($det['det_valunitario']*$det['det_CanDespachada']),2)?>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="4" ><b>Total:</b> </td>
                    <td colspan="13" style="text-align: right"><b><?=round(($det['det_valunitario']*$det['det_CanDespachada']),2)?></b></td>
                </tr>
                <tr>
                    <td colspan="4" style=""><b>Total due under the invoice:</b> </td>
                    <td colspan="13" style=" text-align: right"><b><?=$concomprobantes_impr['v_TotalPayment']?></b></td>
                </tr>
				<br><br><br><br>
            </table>
            </small>
			<footer class="common-footer" style="border:0 text-align: center">
				<tr>
                    <td colspan="17" style="border:0 !important;  text-align: center">
						<br><br><br><br>
                    </td>
                </tr>
				<tr>
                    <td colspan="17" style="border:0 !important;  text-align: center;">
						<br><br><br><br>
						<img style="width: 100%;  display: inline-block; vertical-align: bottom;" src="Assets/img/SelloFirmaFooter.jpg">
                    </td>
                </tr>
			</footer>			
        </section>
    </main>
</body>
</html>