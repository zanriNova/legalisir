<?php
include('phpmailer/class.phpmailer.php');
include('phpmailer/class.smtp.php');
if($req==1){
	$data['email'] = 'azkazemix@gmail.com';
	$data['nm_alumni']='Petugas Sekretiat Fakultas Teknik';
	$user= 'azkazemix@gmail.com';
	$subj = "PENDAFTARAN";
	$body = "Data Pendaftar Baru (NIM : $username,Email : ".$_POST['email'].", Progdi : $progdi)"; 
	$altbody = "This is the body when user views in plain text format";
}else{
	$user=$_SESSION['SES_USER'];
	$subj = "Permohonan Legalisir";
	$body = "Selamat Permohonan Legalisir anda telah selesai. Cek permohonan legalisir anda, CETAK QR-CODE serahkan ke sekretariat Fakultas Teknik Universitas Muria Kudus"; 
	$altbody= "This is the body when user views in plain text format"; 
}
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host     = "ssl://smtp.gmail.com"; 
$mail->Mailer   = "smtp";
$mail->SMTPAuth = true; 

$mail->Username = "azkazemix@gmail.com"; 
$mail->Password = "User-123";
$webmaster_email = "azkazemix@gmail.com"; 
$email =  $data['email'];
$name = $data['nm_alumni']; 
$mail->From = $webmaster_email;
$mail->FromName = "Fakultas Teknik";
$mail->AddAddress($email,$name);
$mail->AddReplyTo($webmaster_email,$user);
$mail->WordWrap = 50; 
//$mail->AddAttachment("module.txt"); // attachment  
if(!empty($nm_qr)){
$mail->AddAttachment($nm_qr); // attachment $nm_qr darigenerate phpqr
}
$mail->IsHTML(true); 
$mail->Subject = $subj;
$mail->Body = $body;
$mail->AltBody = $altbody; 

if(!$mail->Send())
{
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
// echo "email berhasil dikirim";
}
?>