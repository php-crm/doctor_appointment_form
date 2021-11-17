<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $email=$_POST['email'];
	$phone=$_POST['phone'];
	$comment=$_POST['message'];
  $date=$_POST['date'];
  $gender=$_POST['gender'];
	$age=$_POST['age'];
	$attend=$_POST['attend'];
  $type1=$_POST['type1'];
  $type2=$_POST['type2'];
  $type3=$_POST['type3'];
    

 
  $field1="<b>Appointment Date:</b> ".$date;
  $field2="<b>Gender:</b> ".$gender."<br><b>Age:</b> ".$age."<br><b>Have you previously attended our facility?:</b> ".$attend;
  
  $field3="<b>Type of appointment:</b> ".$type1.",".$type2.",".$type3;
	$field4="<b>If Yes, state on which condition and when?:</b> ".$comment;
}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1."<br>".$field2."<br>".$field3."<br>".$field4);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>