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
<body style="margin:1px auto; width:98%;" titulo-pdf="invoice_<?=$concomprobantes_impr['v_BL']?>_<?=$invoice['com_NumComp']?>.pdf">
			<img style="width: 100%; align: center;" src="Assets/img/header.jpg">
    <header>
        <div class="header--title-container">
            <h1>Инвойс ОТ/INVOICE DATED № 00<?=$invoice['com_NumComp']?> ot <?=$invoice['com_FecContab']?></h1>
            <br>
            <button id="btnCrearPdf">Generate</button>
        </div>
    </header>
    <main>
        <section id="encabFac" class="main-table--container" style="margin:1px auto; font-size: 8px; width:98%;">
            <h1 style="font-size: 3em; color:red !important; margin:1px auto; text-align: center; <?=(($invoice['com_Libro']=='9998')?'display: none;':'')?>">Proforma invoice / Счет-проформа</h1>
            <table>
                <tr>
                    <td class="right" id="bolded">Продавец / Seller: <?=$edoc_empresa_rus['razonSocial']?>/<?=$edoc_empresa['razonSocial']?></td>
                    <td colspan="2" id="bolded">Покупатель/Грузополучатель/Плательщик / Buyer/Consignee/Payer <br><br><br><span class="filled-span"><?=$concomprobantes_impr['v_Description']?></span> </td>
                </tr>
                <tr>
                    <td class="right">Адрес / Address: <?=$edoc_empresa_rus['dirMatriz']?> / <?=$edoc_empresa_rus['dirEcuador']?></td>
                    <td colspan="2">Адрес / Address<br><?=$concomprobantes_impr['v_BuyerAddress']?></td>
                </tr>
                <tr>
                    <td class="right"><b>Реквизиты Поставщика / Supplier’s details:</b><br>
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
                    <td colspan="2" id="bolded"> Реквизиты Покупателя / Buyer’s details:<br>
                        <?=str_replace("\n","<br>",$concomprobantes_impr['v_BuyerBank'])?>
                    </td>
                </tr>
                <tr>
                    <td >
                        Грузоотправитель / Consignor: <?=$edoc_empresa_rus['razonSocial']?> / <?=$edoc_empresa['razonSocial']?>
                    </td>
                    <td colspan="1">
                        Внешнеторговый контракт / Foreign trade contract
                    </td>
                    <td colspan="1">
                        <?=$concomprobantes_impr['v_Contract']?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">Адрес / Address: <?=$edoc_empresa_rus['dirMatriz']?> / <?=$edoc_empresa_rus['dirEcuador']?>
                    </td>
                    <td id="bolded">
                        Условия поставки (Инкотермс 2010) / Delivery terms and conditions (Incoterms 2010):
                    </td>
                    <td>
                        <?=$concomprobantes_impr['v_Delivery_Cond']?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span id="bolded"> Срок поставки / Lead time for delivery:</span> <br>
                        (Если не указан, то срок поставки Товара составляет 10 дней с момента согласования Спецификации в соответствии с Договором) / (If not indicated, the lead time of delivery of the Goods is 10 Days upon agreement upon of the Specification in accordance with the Contract)
                    </td>
                    <td>
                        <?=$concomprobantes_impr['v_Delivery_Term']?>
                    </td>
                </tr>
            </table>
			<footer class="common-footer">

				<tr>
                    <td colspan="17" style="border:0 !important;  text-align: center">
						<br><br><br><br><br><br><br><br><br>
						<img style="display: inline-block; width: 100%; vertical-align: bottom; " src="Assets/img/footer.jpg">
                    </td>
                </tr>
			</footer>
       </section>
		
        <section class="main-table--container" style="font-size: 8px; margin:1px auto; width:100%;">
		    <div class="header--title-container">
				<img style="width: 100%; align: center;" src="Assets/img/header2.jpg">
				<br>
            </div>
            <small>
            <table style="font-size: 5px; width:100%;">
                <tr>
                    <td class="right" rowspan="2" colspan="2">Иные условия(Если применимы) / Other terms andconditions (if applicable):
                        <?=$concomprobantes_impr['v_BL']?>
                    </td>
                    <td class="half" colspan="8">
                        <span id="bolded">Срок оплаты / Term of payment:</span><br>
                        (Если не указан, то срок оплаты Товара составляет 30 дней с момента его приемки Покупателем на складе Покупателя) / (If not indicated, the term of payment for the Goods is 30 days upon its receipt by Buyer at the Buyer’s warehouse) Стороны установили, что отсрочка (рассрочка) оплаты денежных средств не является кредитом и проценты за период пользования денежными средствами не начисляются и не выплачиваются. / The Parties have agreed that the postponement (installment) payment of funds is not a loan and interest for the period of utilization of the funds not be accrued and paid.
                    </td>
                    <td colspan="6">
                        <?=$concomprobantes_impr['v_Payment_Cond']?>
                    </td>
                </tr>
                <tr id="bolded">
                    <td class="half" colspan="6">
                        Валюта / Currency:
                    </td>
                    <td class="half" id="center" colspan="6">
                        USD
                    </td>
                </tr>
                <tr>
                    <td class="first-left" id="bolded">
                        №/<br>No.
                    </td>
                    <td class="third-left" id="bolded">
                        Наимено <br>вание <br>Товара / <br>Desig<br>nation <br>of the <br>Goods
                    </td>
                    <td class="fourth-left" id="bolded">
                        Наимено <br>вание <br>Товара / <br>Desig<br>nation <br>of the <br>Goods
                    </td>
                    <td class="fifth-left" id="bolded">
                        Калибр <br> / Size
                    </td>
                    <td class="first-center" id="bolded">
                        G<br>L<br>N
                    </td>
                    <td class="second-center" id="bolded">
                        Изготовитель Товара / Manufacturer of the Goods
                    </td>
                    <td class="third-center" id="bolded">
                        Год <br> Урожая/<br>Harvest Year
                    </td>
                    <td class="fourth-center" id="bolded">
                        Упаковка Товара / Package of the Goods
                    </td>
                    <td class="fifth-center" id="bolded">
                        Единица измерен ия Товара / Measure ment unit of the Goods
                    </td>
                    <td class="first-right" id="bolded">
                        Количе <br> ство <br> Товара, <br> шт. / <br> Quantity <br> of the <br> Goods, <br> number
                    </td>
                    <td class="second-right" id="bolded">
                        Вес нетто <br> короба, <br> кг/ Net <br> weight <br> box, kg
                    </td>
                    <td class="third-right" id="bolded">
                        Весбрутт <br> о короб <br> а, кг/ <br> Gross <br> weight <br> box, kg
                    </td>
                    <td class="fourth-right" id="bolded">
                        Вес нетто <br> партии, кг/ <br> Net weight consig   <br> nment, kg
                    </td>
                    <td class="fifth-right" id="bolded">
                        Вес брутто <br> партии, кг/ <br> Gross weight consig <br> nment, kg
                    </td>
                    <td class="sixth-right" id="bolded">
                        Цена за едини цу Товар а / Price per a unit of
                    </td>
                    <td class="seventh-right" id="bolded">
                        Стоимо сть Товара / <br>Cost of the Goods
                    </td>
                </tr>
                <?php
                    $i=1;
                    foreach($invdetalle as $det){
                ?>
                <tr style="font-size: 4px;">
                    <td class="first-left">
                        <?=$i?>.
                    </td>
                    <td class="third-left" style="font-size=4px" >
                        <?=$concomprobantes_impr['v_Product']?>
                    </td>
                    <td class="fourth-left">
                        Ecuador/ <br>Эквадор
                    </td>
                    <td class="fifth-left">
                        39-46 mm
                    </td>
                    <td style="border:0 !important; transform: rotate(-90deg); vertical-align: middle;">
                        <div style="font-size: 11px; margin:1px 0px;">
                            0735745905166
                        </div>
                    </td>
                    <td class="second-center">
                        <div style="font-size: 10px; margin:1px 0px;">
                        <?=$edoc_empresa_rus['razonSocial']?>/<?=$edoc_empresa['razonSocial']?>
                        </div>
                    </td>
                    <td class="third-center">
                        <?=date('Y')?>
                    </td>
                    <td class="fourth-center">
                        Картонная <br> коробка/ <br> card <br> board box
                    </td>
                    <td class="fifth-center">
                        короб/box
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
                        <?=round($invoice['com_kgsneto'],2)?>
                    </td>
                    <td class="fifth-right">
                        <?=round($invoice['com_kgsbruto'],2)?>
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
                    <td colspan="4" >Итого / Total: </td>
                    <td colspan="13" style="text-align: right"><b><?=round(($det['det_valunitario']*$det['det_CanDespachada']),2)?></b></td>
                </tr>
                <tr>
                    <td colspan="4" style="">Итого к оплате по инвойсу / Total due under the invoice </td>
                    <td colspan="13" style=" text-align: right"><b><?=$concomprobantes_impr['v_TotalPayment']?></b></td>
                </tr>
            </table>
            </small>
			<footer class="common-footer" style="border:0 text-align: center">
				<tr>
                    <td colspan="17" style="border:0 !important;  text-align: center;">
						<img style="height: 170px; width: 100%;  display: inline-block; " src="Assets/img/SelloFirmaFooter.jpg">
                    </td>
                </tr>
			</footer>
        </section>
    </main>
</body>
</html>