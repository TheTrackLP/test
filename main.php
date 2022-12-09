<?php
	session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
</head>
<body>
	<div class="main">
		<div class="invidual">
			<h2>INDIVIDUAL PAYSLIP</h2>
			<h2>DECEMBER 12, 2021</h2>
		</div>
		<div class="name_emp_no">
			<div class="empno">
				<h4>EMPNO:</h4>
            	<p><?php echo $_SESSION['emp_no'];?></p>
			</div>
			<div class="name">
				<h4>Name:</h4>
            	<p><?php echo $_SESSION['lastname'].",".$_SESSION['firstname']." ".$_SESSION['middlename'];?></p>
			</div>
		</div>
		<div class="earning">
			<h3>EARNINGS: &emsp; &emsp; DEDUCTIONS:</h3>
		</div>
		<div class="earn_deduc">
			<p><span>Salary: </span> <?php echo $_SESSION['salary'];?><span>&emsp;&emsp;&emsp;&emsp;&emsp;SSS: </span><?php echo $_SESSION['sss']?></p>
			<p><span>Allowance: </span> <?php echo $_SESSION['allow'];?><span>&emsp;&emsp;&emsp;PAGIBIG: </span><?php echo $_SESSION['ibig']?></p>
			<p><span>Overload: </span><?php echo $_SESSION['load'];?><span>&emsp;&emsp;&emsp;&emsp;PHILHEALTH: </span><?php echo $_SESSION['phil']?></p>
		</div>
	</div>
</body>
</html>

<?php

	$userfile = fopen('employess.txt', 'r');

	while (!feof($userfile)) 
	{
		$info = fgets($userfile);
		$emparray = explode('|', $info);
		$empname = explode(',', $emparray[0]);
		$earnings = explode(',', $emparray[1]);
		$deductions = explode(',', $emparray[2]);

		if(strcmp(trim($empname[0]),$_SESSION['logged']) == 0){
			displayPayslip($empname[0],$empname[1],$empname[2],$empname[3],$earnings[0],$earnings[1],$earnings[2],$deductions[0],$deductions[1],$deductions[2]);
		}
	}

	function displayPayslip($empno, $lname, $fname, $mname, $salary, $allow, $load, $sss, $ibig, $phil){

		$_SESSION['emp_no'] = $empno;
		$_SESSION['lastname'] = $lname;
		$_SESSION['firstname'] = $fname;
		$_SESSION['middlename'] = $mname;
		$_SESSION['salary'] = $salary;
		$_SESSION['allow'] = $allow;
		$_SESSION['load'] = $load;
		$_SESSION['sss'] = $sss;
		$_SESSION['ibig'] = $ibig;
		$_SESSION['phil'] = $phil;
	}
?>