<?php include("pgconfig.php"); ?>
<html>
<head>
	<title>ACCOSA PG - Test Merchant - PHP</title>
</head>
<?php 
$transactionTypeCode=$_POST["transaction_type_code"];
$installments=$_POST["installments"];
$transactionId=$_POST["transaction_id"];

$amount=$_POST["amount"];
$exponent=$_POST["exponent"];
$currencyCode=$_POST["currency_code"];
$merchantReferenceNo=$_POST["merchant_reference_no"];

$status=$_POST["status"];
$eci=$_POST["3ds_eci"];
$pgErrorCode=$_POST["pg_error_code"];

$pgErrorDetail=$_POST["pg_error_detail"];
$pgErrorMsg=$_POST["pg_error_msg"];

$messageHash=$_POST["message_hash"];


$messageHashBuf=$pgInstanceId."|".$merchantId."|".$transactionTypeCode."|".$installments."|".$transactionId."|".$amount."|".$exponent."|".$currencyCode."|".$merchantReferenceNo."|".$status."|".$eci."|".$pgErrorCode."|".$hashKey."|";

$messageHashClient = "13:".base64_encode(sha1($messageHashBuf, true));

$hashMatch=false;

if ($messageHash==$messageHashClient){
  $hashMatch=true;
} else {
  $hashMatch=false;
} 
?>

<body topmargin="0" leftmargin="0">
<br />
<center>
	<h3>ACCOSA PG - Test Merchant - PHP</h3>
	<br />
	<table>
	<tr> 
		<td valign="top" align="center">
			<?
				if("50020"==$status) {
					?><font color="#339900"><b>Transaction Passed</b></font><?
				} else if("50097"==$status) {
					?><font color="#339900"><b>Test Transaction Passed</b></font><?
				} else {
					?><font color="#FF0000"><b>Transaction Failed</b></font><?
				}
			?>
		</td>
	</tr>
	<tr> 
		<td valign="top" class="mainText">
			<table border="1" width="400" align="center">	
			
			<tr>
				<td align="right">HashMatch</td>
				<td align="left">: <? echo $hashMatch;?></td>
			</tr>

			<tr>
				<td align="right">TransactionTypeCode</td>
				<td align="left">: <? echo $transactionTypeCode;?></td>
			</tr>
			<tr>
				<td align="right">TransactionId</td>
				<td align="left">: <? echo $transactionId;?></td>
			</tr>

			<tr>
				<td align="right">Amount</td>
				<td align="left">: <? echo $amount;?></td>
			</tr>
			<tr>
				<td align="right">Exponent</td>
				<td align="left">: <? echo $exponent;?></td>
			</tr>
			<tr>
				<td align="right">CurrencyCode</td>
				<td align="left">: <? echo $currencyCode;?></td>
			</tr>
			<tr>
				<td align="right">MerchantReferenceNo</td>
				<td align="left">: <? echo $merchantReferenceNo;?></td>
			</tr>

			<tr>
				<td align="right">Status</td>
				<td align="left">: <? echo $status;?></td>
			</tr>
			<tr>
				<td align="right">3dsEci</td>
				<td align="left">: <? echo $eci;?></td>
			</tr>
			<tr>
				<td align="right">PG ErrorCode</td>
				<td align="left">: <? echo $pgErrorCode;?></td>
			</tr>

			<tr>
				<td align="right">PG ErrorDetail</td>
				<td align="left">: <? echo $pgErrorDetail;?></td>
			</tr>
			<tr>
				<td align="right">PG ErrorMsg</td>
				<td align="left">: <? echo $pgErrorMsg;?></td>
			</tr>
								 
			</table>
		</td>
	</tr>
	<tr> 
		<td valign="top" align="center">
			<a href="index.html">Buy Again</a>
		</td>
	</tr>
	</table>
</center>
</body>
</html>

