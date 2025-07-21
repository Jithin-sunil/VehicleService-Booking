<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_booking where user_id='".$_SESSION["uid"]."' and booking_status='0'";

$result=$Con->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$bid = $row["booking_id"];
		
		
		
		$selqry="select * from tbl_singleservice where booking_id='".$bid."' and serviceamount_id='".$_GET["bid"]."'";
		//echo $selqry;
		$result=$Con->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Booked";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_singleservice(serviceamount_id,booking_id)values('".$_GET["bid"]."','".$bid."')";
         if($Con->query($insQry1))
          { 
             echo "Booked Successfully";
                        }
                        else
                        {
	                       echo"Failed";
                        }
		}
		
	}
	
}
else
{
	

$insQry=" insert into tbl_booking(user_id,booking_date)values('".$_SESSION["uid"]."',curdate())";
			if($Con->query($insQry))
			{
				$selqry1="select MAX(booking_id) as id from tbl_booking";
                $result=$Con->query($selqry1);
				if($row=$result->fetch_assoc())
				{
					$bid=$row["id"];
					
					
					$selqry="select * from tbl_singleservice where booking_id='".$bid."'and serviceamount_id='".$_GET["bid"]."'";
		$result=$Con->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Booked";
			
		}
		else
		{
					
					
	                   $insQry1="insert into tbl_singleservice(serviceamount_id,booking_id)values('".$_GET["bid"]."','".$bid."')";
                        if($Con->query($insQry1))
                        { 
                          echo "Booked Successfully";
                        }
                        else
                        {
	                       echo"Failed";
                        }
					  
		}

                }
			}
}
?>