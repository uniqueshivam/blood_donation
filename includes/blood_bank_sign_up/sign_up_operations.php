<?php
class sign_up_operations{
	public $con;

	function __construct()
	{
		require_once '../DbConnect.php';
		$db = new DbConnect();
		$this->con= $db->connect();

	}

    function Register_blood_bank($b_reg_id,$b_email,$b_pass,$b_name,$b_contact,$b_latitude,$b_longitude,$b_postal_address
    ,$A_positive,$A_negative,$B_positive,$B_negative,$O_positive,$O_negative,$AB_positive,$AB_negative)
	{
		if($this->isUserExist($b_email))
		{
			return 0;
		}
		else
		{
		$password = md5($b_pass);
		$query = "INSERT INTO `blood_bank_info`(`b_reg_id`, `b_name`, `b_email`, `b_password`, `b_contact`, `b_address`, `b_latitude`, `b_longitude`, `A+`, `A-`, `B+`, `B-`, `O+`, `O-`, `AB+`, `AB-`)
         VALUES ('$b_reg_id','$b_name','$b_email','$password','$b_contact','$b_postal_address','$b_latitude','$b_longitude',
        '$A_positive','$A_negative','$B_positive','$B_negative','$O_positive','$O_negative','$AB_positive','$AB_negative')";

		$run=mysqli_query($this->con,$query);
		if($run==true)
		{
			return 1;
		}
		else
		{
			return 2;
		}
	}
	}
	function isUserExist($b_email)
	{
		$query = "SELECT * FROM blood_bank_info where b_email='$b_email'";
		$run  = mysqli_query($this->con,$query);
		$data = mysqli_fetch_assoc($run);
		if(!empty($data))
			return true;
		else
		{
			return false;
		}
		
	}
}