<?php
/*This file should receive a link somethong like this: http://noobix.000webhostapp.com/TX.php?unit=1&b1=1
If you paste that link to your browser, it should update b1 value with this TX.php file. Read more details below.
The ESP will send a link like the one above but with more than just b1. It will have b1, b2, etc...
*/

//We loop through and grab variables from the received the URL
foreach($_REQUEST as $key => $value)  //Save the received value to the hey variable. Save each cahracter after the "&"
{
	//Now we detect if we recheive the id, the password, unit, or a value to update
if($key =="id"){
$unit = $value;
}	
if($key =="pw"){
$pass = $value;
}	
if($key =="unit"){
$update_number = $value;
}
	if($key =="b1"){
	$sent_bool_1 = $value;
	}	
	if($key =="b2"){
	$sent_bool_2 = $value;
	}	
	if($key =="b3"){
	$sent_bool_3 = $value;
	}
	if($key =="b4"){
	$sent_bool_4 = $value;
	}	
	if($key =="b5"){
	$sent_bool_5 = $value;
	}	
	if($key =="b6"){
	$sent_bool_6 = $value;
	}	
	if($key =="b7"){
	$sent_bool_7 = $value;
	}	
	if($key =="b8"){
	$sent_bool_8 = $value;
	}	
	if($key =="b9"){
	$sent_bool_9 = $value;
	}	
    if($key =="b10"){
	$sent_bool_10 = $value;
	}	
    if($key =="b11"){
	$sent_bool_11 = $value;
	}
	if($key =="b12"){
	$sent_bool_12 = $value;
	}	
	if($key =="b13"){
	$sent_bool_13 = $value;
	}
	if($key =="b14"){
	$sent_bool_14 = $value;
	}	
	if($key =="b15"){
	$sent_bool_15 = $value;
	}	
	if($key =="b16"){
	$sent_bool_16 = $value;
}	
}//End of foreach


include("database_connect.php"); 	//We include the database_connect.php which has the data for the connection to the database


// Check  the connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Now we update the values in database
function disp()
{
    include("database_connect.php"); 	//We include the database_connect.php which has the data for the connection to the database


// Check  the connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM HomeAutoSys");	//table select is ESPtable2, must be the same on yor database

//Loop through the table and filter out data for this unit id equal to the one taht we've received. 
while($row = mysqli_fetch_array($result)) {
		$output=$row;
		$b1 = $row['SENT_BOOL_1'];	
		$b2 = $row['SENT_BOOL_2'];	
		$b3 = $row['SENT_BOOL_3'];
		$b4 = $row['SENT_BOOL_4'];	
		$b5 = $row['SENT_BOOL_5'];
		$b6 = $row['SENT_BOOL_6'];	
		$b7 = $row['SENT_BOOL_7'];	
		$b8 = $row['SENT_BOOL_8'];
		$b9 = $row['SENT_BOOL_9'];
        $b10 = $row['SENT_BOOL_10'];
        $b11 = $row['SENT_BOOL_11'];		
		$b12 = $row['SENT_BOOL_12'];	
		$b13 = $row['SENT_BOOL_13'];
		$b14 = $row['SENT_BOOL_14'];	
		$b15 = $row['SENT_BOOL_15'];
		$b16 = $row['SENT_BOOL_16'];
		
	
		echo "b1=$b1 b2=$b2 b3=$b3 b4=$b4 b5=$b5 b6=$b6 b7=$b7 b8=$b8 b9=$b9 b10=$b10 b11=$b11 b12=$b12 b13=$b13 b14=$b14 b15=$b15 b16=$b16";
		//print (json_encode(array('results' => $output)));
}

	exit();
}
if($update_number == 21)
	{
        $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt1/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_1==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_1==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET SENT_BOOL_1 = $sent_bool_1
		WHERE id=$unit AND PASSWORD=$pass");	;
		disp();
	}
    if($update_number == 22)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt2/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_2==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_2==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_2 = $sent_bool_2
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 23)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt3/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_3==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_3==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET SENT_BOOL_3 = $sent_bool_3
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 24)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt4/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_4==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_4==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_4 = $sent_bool_4
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 25)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt5/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_5==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_5==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_5 = $sent_bool_5
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 26)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt6/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_6==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_6==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_6 = $sent_bool_6
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 27)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt7/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_7==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_7==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_7 = $sent_bool_7
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 28)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt8/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_8==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_8==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_8 = $sent_bool_8
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 29)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt9/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_9==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_9==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_9 = $sent_bool_9 
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 210)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt10/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_10==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_10==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET SENT_BOOL_10 = $sent_bool_10
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 211)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt11/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_11==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_11==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET SENT_BOOL_11 = $sent_bool_11
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 212)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt12/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_12==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_12==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_12 = $sent_bool_12
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 213)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt13/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_13==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_13==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_13 = $sent_bool_13
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 214)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt14/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_14==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_14==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_14 = $sent_bool_14
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 215)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt15/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_15==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_15==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_15 = $sent_bool_15
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}
    if($update_number == 216)
	{
	    $url ="https://app.remoteme.org/api/~640537_tm5bSckJPwCu/rest/v1/variable/set/variableValue/Butt16/BOOLEAN/";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        if(	$sent_bool_16==1)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'true');
        }
        if(	$sent_bool_16==0)
        {
            curl_setopt($ch,CURLOPT_POSTFIELDS, 'false');
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);
        echo $result;
		mysqli_query($con,"UPDATE HomeAutoSys SET  SENT_BOOL_16 = $sent_bool_16
		WHERE id=$unit AND PASSWORD=$pass");	;	
		disp();
	}




//In case that you need the time from the internet, use this line
date_default_timezone_set('UTC');
$t1 = date("gi"); 	//This will return 1:23 as 123

if($update_number == 3)
{
//Get all the values form the table on the database
$result = mysqli_query($con,"SELECT * FROM HomeAutoSys");	//table select is ESPtable2, must be the same on yor database

//Loop through the table and filter out data for this unit id equal to the one taht we've received. 
while($row = mysqli_fetch_array($result)) {
if($row['id'] == $unit){
		$output=$row;
		$b1 = $row['SENT_BOOL_1'];	
		$b2 = $row['SENT_BOOL_2'];	
		$b3 = $row['SENT_BOOL_3'];
		$b4 = $row['SENT_BOOL_4'];	
		$b5 = $row['SENT_BOOL_5'];
		$b6 = $row['SENT_BOOL_6'];	
		$b7 = $row['SENT_BOOL_7'];	
		$b8 = $row['SENT_BOOL_8'];
		$b9 = $row['SENT_BOOL_9'];
        $b10 = $row['SENT_BOOL_10'];
        $b11 = $row['SENT_BOOL_11'];		
		$b12 = $row['SENT_BOOL_12'];	
		$b13 = $row['SENT_BOOL_13'];
		$b14 = $row['SENT_BOOL_14'];	
		$b15 = $row['SENT_BOOL_15'];
		$b16 = $row['SENT_BOOL_16'];
		
	
		echo "b1=$b1 b2=$b2 b3=$b3 b4=$b4 b5=$b5 b6=$b6 b7=$b7 b8=$b8 b9=$b9 b10=$b10 b11=$b11 b12=$b12 b13=$b13 b14=$b14 b15=$b15 b16=$b16";
		//print (json_encode(array('results' => $output)));
}
}

	exit();
}
?>








