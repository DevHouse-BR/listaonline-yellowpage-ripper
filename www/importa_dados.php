<?
//error_reporting(0);
//set_time_limit(0);

$busca = trim($_POST["busca"]);
$cidade = trim($_POST["cidade"]);
$estado = trim($_POST["estado"]);

switch($estado){
	case "579":
		$nmestado = "AC";
		break;
	case "580":
		$nmestado = "AL";
		break;
	case "325":
		$nmestado = "AM";
		break;
	case "581":
		$nmestado = "AP";
		break;
	case "326":
		$nmestado = "BA";
		break;
	case "582":
		$nmestado = "CE";
		break;
	case "327":
		$nmestado = "DF";
		break;
	case "328":
		$nmestado = "ES";
		break;
	case "329":
		$nmestado = "GO";
		break;
	case "584":
		$nmestado = "MA";
		break;
	case "585":
		$nmestado = "MG";
		break;
	case "586":
		$nmestado = "MS";
		break;
	case "587":
		$nmestado = "MT";
		break;
	case "330":
		$nmestado = "PA";
		break;
	case "588":
		$nmestado = "PB";
		break;
	case "589":
		$nmestado = "PE";
		break;
	case "590":
		$nmestado = "PI";
		break;
	case "331":
		$nmestado = "PR";
		break;
	case "333":
		$nmestado = "RJ";
		break;
	case "591":
		$nmestado = "RN";
		break;
	case "592":
		$nmestado = "RO";
		break;
	case "593":
		$nmestado = "RR";
		break;
	case "334":
		$nmestado = "RS";
		break;
	case "335":
		$nmestado = "SC";
		break;
	case "594":
		$nmestado = "SE";
		break;
	case "336":
		$nmestado = "SP";
		break;
	case "595":
		$nmestado = "TO";
		break;
}

$linhas = file("http://www.listaonline.com.br/pagamanet/web/companyCategory.aspx?ipa=16&npa=Brasil&ies=" . $estado . "&nes=" . $nmestado . "&idi=3&txb=" . $busca  . "&nci=" . $cidade);

echo(strip_tags($linhas[3])); 

die();





$fp = fsockopen("www.listaonline.com.br", 80, $errno, $errstr);
if (!$fp) {
    echo "ERROR: $errno - $errstr<br />\n";
} 
else {
	fwrite($fp, "GET /Default.aspx HTTP/1.1\r\n");
	fwrite($fp, "Host: www.listaonline.com.br\r\n");
	fwrite($fp, "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; pt-BR; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15\r\n");
	fwrite($fp, "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5\r\n");
	fwrite($fp, "Accept-Language: pt-br,pt;q=0.8,en-us;q=0.5,en;q=0.3\r\n");
	fwrite($fp, "Accept-Encoding: gzip,deflate\r\n");
	fwrite($fp, "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n");
	fwrite($fp, "Keep-Alive: 300\r\n");
	fwrite($fp, "Connection: keep-alive\r\n");
	fwrite($fp, "Cookie: s_lastvisit=1215692234906; CTG=1216231907; WSS_GW=V1z%B%eBBCi@Q; CP=null*; stateCookie=www.listaonline.com.brCityId=7816&www.listaonline.com.brCity=JOINVILLE&www.listaonline.com.brStateId=335&www.listaonline.com.brStateName=SC\r\n");
	fwrite($fp, "\r\n\r\n");
	$resposta .= fread($fp, 999999);
	sleep(2);
	$resposta .= fread($fp, 999999);
	sleep(2);
	$resposta .= fread($fp, 999999);
	sleep(2);
    fclose($fp);
}

$teste = split('id="__VIEWSTATE" value="', $resposta);
$teste = split('"', $teste[1]);
$viewstate = rawurlencode($teste[0]);



$fp = fsockopen("www.listaonline.com.br", 80, $errno, $errstr);
//$fp = fopen("lixo.txt", "w");
if (!$fp) {
    echo "ERROR: $errno - $errstr<br />\n";
} 
else {
	fwrite($fp, "POST /Default.aspx HTTP/1.1
Host: www.listaonline.com.br
User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; pt-BR; rv:1.8.1.16) Gecko/20080702 Firefox/2.0.0.16
Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5
Accept-Language: pt-br,pt;q=0.8,en-us;q=0.5,en;q=0.3
Accept-Encoding: gzip,deflate
Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7
Keep-Alive: 300
Connection: keep-alive
Referer: http://www.listaonline.com.br/Default.aspx
Cookie: s_lastvisit=1215692234906; CTG=1216252802; WSS_GW=V1z%B%eBQBirB; CP=null*; stateCookie=www.listaonline.com.brCityId=7816&www.listaonline.com.brCity=JOINVILLE&www.listaonline.com.brStateId=335&www.listaonline.com.brStateName=SC
Content-Type: application/x-www-form-urlencoded
Content-Length: 4257
__LASTFOCUS=&__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=%2FwEPDwULLTE3MDgxNTIwOTAPZBYCZg9kFgICAw9kFgwCAw8PFggeB2FyTGlua3MVBDR%2BL3BhZ2FtYW5ldC93ZWIvbWFwc1Jlc3VsdC5hc3B4P2lwYT0xNiZpZGk9MyZpZXM9MzM1P34vcGFnYW1hbmV0L3dlYi90ZWxlZm9uZXNSZXNpZGVuY2lhaXMuYXNweD9pcGE9MTYmaWRpPTMmaWVzPTMzNS1%2BL3BhZ2FtYW5ldC93ZWIvQ0VQLmFzcHg%2FaXBhPTE2JmlkaT0zJmllcz0zMzUsaHR0cDovL3d3dy5idXNjYXBlLmNvbS5ici9za2luLzQyMjgvP3ByPTQyMjgeB2FyTmFtZXMVBA1NYXBhcyBlIFJvdGFzFlRlbGVmb25lcyBSZXNpZGVuY2lhaXMDQ0VQGkNvbXBhcmUgUHJvZHV0b3MgZSBQcmXDp29zHgdhclBhdGhzFQQSaWNvX21hcGFzZXJ1YXMuZ2lmFmljb190ZWxyZXNpZGVuY2lhbC5naWYLaWNvX2NlcC5naWYRYnRfY29tcHJhbm92by5naWYeEHNDb3VudHJ5RmxhZ05hbWUFD2JhbmRfYnJhc2lsLmdpZmQWBmYPZBYCZg8WAh4EVGV4dAUhUXVhcnRhLUZlaXJhLCAxNiBEZSBKdWxobyBEZSAyMDA4ZAICD2QWBGYPEGRkFgECAmQCAQ8PFgIeCEltYWdlVXJsBTN%2BL0FwcF9UaGVtZXMvTE9fRGVmYXVsdFRoZW1lL2ltYWdlcy9iYW5kX2JyYXNpbC5naWZkZAIDD2QWCGYPDxYCHgtOYXZpZ2F0ZVVybAU0fi9wYWdhbWFuZXQvd2ViL21hcHNSZXN1bHQuYXNweD9pcGE9MTYmaWRpPTMmaWVzPTMzNWQWAmYPDxYCHwUFNn4vQXBwX1RoZW1lcy9MT19EZWZhdWx0VGhlbWUvaW1hZ2VzL2ljb19tYXBhc2VydWFzLmdpZmRkAgIPDxYCHwYFP34vcGFnYW1hbmV0L3dlYi90ZWxlZm9uZXNSZXNpZGVuY2lhaXMuYXNweD9pcGE9MTYmaWRpPTMmaWVzPTMzNWQWAmYPDxYCHwUFOn4vQXBwX1RoZW1lcy9MT19EZWZhdWx0VGhlbWUvaW1hZ2VzL2ljb190ZWxyZXNpZGVuY2lhbC5naWZkZAIEDw8WAh8GBS1%2BL3BhZ2FtYW5ldC93ZWIvQ0VQLmFzcHg%2FaXBhPTE2JmlkaT0zJmllcz0zMzVkFgJmDw8WAh8FBS9%2BL0FwcF9UaGVtZXMvTE9fRGVmYXVsdFRoZW1lL2ltYWdlcy9pY29fY2VwLmdpZmRkAgYPDxYCHwYFLGh0dHA6Ly93d3cuYnVzY2FwZS5jb20uYnIvc2tpbi80MjI4Lz9wcj00MjI4ZBYCZg8PFgIfBQU1fi9BcHBfVGhlbWVzL0xPX0RlZmF1bHRUaGVtZS9pbWFnZXMvYnRfY29tcHJhbm92by5naWZkZAIFD2QWBgIBDw8WAh4HVmlzaWJsZWhkZAIDD2QWAmYPZBYEZg9kFgJmDw8WAh8EBfoCPE9CSkVDVCBpZD0iYmFubmVyRmxhc2gidHlwZT0iYXBwbGljYXRpb24veC1zaG9ja3dhdmUtZmxhc2giZGF0YT0iaHR0cDovL3d3dy5wYWdpbmFzYW1hcmlsbGFzLmNvbS9wYWdhbWFuZXQvYmFubmVycy8zMjAxNTM4XzFfMy5zd2YiaGVpZ2h0PSIxODAiIHdpZHRoPSIyODAiVklFV0FTVEVYVD48UEFSQU0gTkFNRT0ibW92aWUiIFZBTFVFPSJodHRwOi8vd3d3LnBhZ2luYXNhbWFyaWxsYXMuY29tL3BhZ2FtYW5ldC9iYW5uZXJzLzMyMDE1MzhfMV8zLnN3ZiI%2BPFBBUkFNIE5BTUU9InF1YWxpdHkiIFZBTFVFPSJoaWdoIj48UEFSQU0gTkFNRT0id21vZGUiIFZBTFVFPSJ0cmFuc3BhcmVudCI%2BPFBBUkFNIE5BTUU9Im1lbnUiIFZBTFVFPSJmYWxzZSI%2BPC9PQkpFQ1Q%2BZGQCAQ9kFgJmD2QWCGYPZBYCZg9kFgRmDw8WAh8HaGQWBAIFDw8WAh8EBQdFTkdMSVNIZGQCCw8PFgIfBAUYQ2FtYmlhciBkZSBwYcOtcyBpbmljaWFsZGQCAQ9kFgICAQ8PFgQfBAUUR3JhdmFyIGxvY2FsaXphw6fDo28eB1Rvb2xUaXAFPkdyYXZhciBlc3RhIGxvY2FsaXphw6fDo28oZXN0YWRvIGUgY2lkYWRlKSBjb21vIHByZWRldGVybWluYWRhFgIeB29uY2xpY2sFPHJldHVybiB2YWxTdGF0ZSgnY3RsMDBfQzFfQ2hvb3NlU3RhdGUnLCdJbmdyZXNzZSB1bSBlc3RhZG8nKWQCAQ9kFgJmD2QWAgIBDw8WAh8EBRBJbmdyZXNzZSBhIGJ1c2NhZGQCAg9kFgZmD2QWBAIBDw8WAh8EBQ1Qcm9jdXJhciBwb3I6ZGQCAw8PZBYCHglvbmtleWRvd24FNHJldHVybiBzdWJtaXRPbkVudGVyKCdjdGwwMF9DMV9TZWFyY2hCdXR0b24nLGV2ZW50KTtkAgEPZBYEAgEPDxYCHwQFB0NpZGFkZTpkZAIDDw9kFgIfCgU0cmV0dXJuIHN1Ym1pdE9uRW50ZXIoJ2N0bDAwX0MxX1NlYXJjaEJ1dHRvbicsZXZlbnQpO2QCAg9kFgYCAQ8PFgIfBAUHRXN0YWRvOmRkAgMPEGQQFRwAAkFDAkFMAkFNAkFQAkJBAkNFAkRGAkVTAkdPAk1BAk1HAk1TAk1UAlBBAlBCAlBFAlBJAlBSAlJKAlJOAlJPAlJSAlJTAlNDAlNFAlNQAlRPFRwBKgM1NzkDNTgwAzMyNQM1ODEDMzI2AzU4MgMzMjcDMzI4AzMyOQM1ODQDNTg1AzU4NgM1ODcDMzMwAzU4OAM1ODkDNTkwAzMzMQMzMzMDNTkxAzU5MgM1OTMDMzM0AzMzNQM1OTQDMzM2AzU5NRQrAxxnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnFgECGGQCBA8PZBYCHwoFNHJldHVybiBzdWJtaXRPbkVudGVyKCdjdGwwMF9DMV9TZWFyY2hCdXR0b24nLGV2ZW50KTtkAgQPZBYIZg8PFgIfB2hkFgICAg8PFgQfBGUfBmVkZAIBD2QWAmYPDxYEHwQFD0J1c2NhIEF2YW7Dp2FkYR8GBVh%2BL3BhZ2FtYW5ldC93ZWIvYWR2YW5jZWRTZWFyY2guYXNweD9pcGE9MTYmbnBhPUJyYXNpbCZpZXM9MzM1Jm5lcz1TQyZpZGk9MyZuY2k9Sk9JTlZJTExFZGQCAg9kFgJmDw8WAh8GBV5qYXZhc2NyaXB0OnByZXZpZXcoJy9wYWdhbWFuZXQvd2ViL2FqdWRhLmFzcHg%2FaXBhPTE2JmlkaT0zJywnSGVscCcsJzUwMCcsJzUwMCcsJ3llcycsJ2NlbnRlcicpZGQCAw9kFgJmDw9kFgIfCQVtcmV0dXJuIHZhbFJlc3VsdCgnY3RsMDBfQzFfVGV4dEJveFdoYXQnLCdjdGwwMF9DMV9DaG9vc2VTdGF0ZScsJ3RydWUnLCdQb3IgZmF2b3IgLCBwcmVlbmNoYSB0b2RvcyBvcyBjYW1wb3MnKWQCBQ8PFgIfBGVkZAITD2QWAmYPZBYCZg8PFgIfB2hkFgJmD2QWAmYPZBYCZg9kFgJmD2QWAmYPZBYCAgEPZBYCZg8PFgIfBGVkZAIXDxQrAAIPFgIfB2hkZGQCIw8PFgIfBAUIUEhYV0VCMDJkZAIlDxYCHwRlZBgBBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WAQUVY3RsMDAkQzEkU2VhcmNoQnV0dG9unT7F25zAAiPFF7fbFzECBOuoQzc%3D&ctl00%24ctrUpperMenu%24ddlCountry=16&ctl00%24C1%24TextBoxWhat=dentistas&ctl00%24C1%24TextBoxCity=JOINVILLE&ctl00%24C1%24ChooseState=335&ctl00%24C1%24SearchButton.x=66&ctl00%24C1%24SearchButton.y=32");
	//while (!feof($fp)) {
		echo fread($fp, 999999);
		echo fread($fp, 999999);
		echo fread($fp, 999999);
		echo fread($fp, 999999);
		echo fread($fp, 999999);
		echo fread($fp, 999999);
		flush();
	//}
    fclose($fp);
	die();
}








































$fp = fsockopen("www.listaonline.com.br", 80, $errno, $errstr);

if (!$fp) {
    echo "ERROR: $errno - $errstr<br />\n";
} else {

	fwrite($fp, "POST /Default.aspx HTTP/1.0\r\n");
	fwrite($fp, "Accept:image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/ag-plugin, application/x-shockwave-flash, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/msword, */*\r\n");
	fwrite($fp, "Referer: http://www.listaonline.com.br/Default.aspx \r\n");
	fwrite($fp, "Accept-Language: pt-br\r\n");
	fwrite($fp, "UA-CPU: x86\r\n");
	fwrite($fp, "Accept-Encoding: gzip, deflate\r\n");
	fwrite($fp, "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; en-GB; rv:1.8.1.8) Gecko/20071008 Firefox/2.0.0.8\r\n");
	fwrite($fp, "Host: listaonline.com.br\r\n");
	fwrite($fp, "Connection: Keep-Alive\r\n");	
	//fwrite($fp, $cookies . "\r\n");
	
	fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n\r\n");
	
	fwrite($fp, "\r\n\r\n");
    $resposta = fread($fp, 9999);
    fclose($fp);
}
die($resposta);
$cookies = "Cookie: ";
$resposta = split("\r\n", $resposta);

foreach ($resposta as &$linha) {
    if(ereg("Set-Cookie:", $linha)){
		$cookies .= trim(str_replace('Set-Cookie:', "", $linha)) . "; ";
	}
}
$cookies = substr(trim($cookies), 0, -1);

$target = split("/", $target);
$caminho = $target[0] . "/" . $target[1] . "/" . $target[2];

$i = 0;
foreach($_POST as $chave => $valor){
	if(($chave != "pagina") && ($chave != "usuario") && ($chave != "p_cod_operador") && ($chave != "senha")){
		if($i != 0) $post .= "&";
		$post .= $chave . "=" . $valor;
		$i++;
	}
}
$post .= "&p_cod_operador=" . $_POST["usuario"];


$fp = fsockopen("ssl://servicos.spc.org.br", 443, $errno, $errstr);

if (!$fp) {
    echo "ERROR: $errno - $errstr<br />\n";
} else {
	fwrite($fp, "POST ssl://servicos.spc.org.br" . $caminho . "/" . $pagina . " HTTP/1.0\r\n");
	fwrite($fp, "Accept:image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/ag-plugin, application/x-shockwave-flash, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/msword, */*\r\n");
	fwrite($fp, "Referer: https://servicos.spc.org.br" . $caminho . "/spc_template.pr_monta_menu \r\n");
	fwrite($fp, "Accept-Language: pt-br\r\n");
	fwrite($fp, "UA-CPU: x86\r\n");
	fwrite($fp, "Accept-Encoding: gzip, deflate\r\n");
	fwrite($fp, "User-Agent:Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; InfoPath.2)\r\n");
	fwrite($fp, "Host: servicos.spc.org.br\r\n");
	fwrite($fp, "Connection: Keep-Alive\r\n");
	fwrite($fp, $cookies . "\r\n");
	fwrite($fp, "Content-Length: " . strlen($post) . "\r\n");
	fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n\r\n");
	fwrite($fp, $post);
	fwrite($fp, "\r\n\r\n");
	$resposta = fread($fp, 550);
	$resposta = fread($fp, 14);
	ob_start();
	fpassthru($fp);
	$html = ob_get_contents();
	ob_clean();
	echo('<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />');
	echo($html);
	flush();
    fclose($fp);	
}
?> 