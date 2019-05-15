<?php
require_once './sign_up_operations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

	if(
		isset($_POST['b_reg_id']) && !empty($_POST['b_reg_id'])
		and isset($_POST['b_name']) && !empty($_POST['b_name'])
	 	and isset($_POST['b_email']) && ($_POST['b_email']!="")
		and isset($_POST['b_password']) && !empty($_POST['b_password']) 
		and isset($_POST['b_contact']) && !empty($_POST['b_contact']) 
		and isset($_POST['b_address']) && !empty($_POST['b_address']) 
		and isset($_POST['b_latitude']) && !empty($_POST['b_latitude']) 
		and isset($_POST['b_longitude']) && !empty($_POST['b_longitude']) 
		and isset($_POST['A_positive']) && !empty($_POST['A_positive'])
		and isset($_POST['A_negative']) && !empty($_POST['A_negative']) 
        and isset($_POST['B_positive']) && !empty($_POST['B_positive'])
        and isset($_POST['B_negative']) && !empty($_POST['B_negative'])
        and isset($_POST['O_positive']) && !empty($_POST['O_positive'])
        and isset($_POST['O_negative']) && !empty($_POST['O_negative'])
        and isset($_POST['AB_positive']) && !empty($_POST['AB_positive'])
        and isset($_POST['AB_negative']) && !empty($_POST['AB_negative'])
		
		)
	{
		


		$db= new sign_up_operations();
		// $x = $_POST['email'].".jpg";
		// $imagename = $_FILES['lab_logo']['name'];//storing file name
		// $tempimagename = $_FILES['lab_logo']['tmp_name'];
		// move_uploaded_file($tempimagename, "profile_pic/$x");
	
        $result = $db-> Register_blood_bank($_POST['b_reg_id'],
        $_POST['b_email'],
        $_POST['b_password'],
        $_POST['b_name'],
        $_POST['b_contact'],
        $_POST['b_latitude'],
        $_POST['b_longitude'],
        $_POST['b_address'],
        $_POST['A_positive'],
        $_POST['A_negative'],
        $_POST['B_positive'],
        $_POST['B_negative'],
        $_POST['O_positive'],
        $_POST['O_negative'],
        $_POST['AB_positive'],
        $_POST['AB_negative']);
		if($result==1)
		{
		
			$response['message']="Blood bank registered Registered";
		}
		else if($result==2)
		{

			$response['error']=true;
			$response['message']="Unsuccessfully registered";
		}

		else if($result==0)
		{
			$response['error']=true;
			$response['message']="User exist";

		}



	}
	else
	{
		//echo "hii";
		$response['error']=true;
		$response['message']="required fields  missing";
	}

}
else
{
	$response['error']=true;
	$response['message']="Inavlid request";

}
echo json_encode($response);