<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>WorkHub - Sign up</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/style.css" />
</head>

<body>
  	<div class="wrapper" align="center">
  		<div style="height: 125px;"> </div>
  		<div>
		    <h1>Please tell us who you are!</h1>
		    <br />
		
		    <?php echo validation_errors(); ?>
		
		    <?php echo form_open('verify_type'); ?>
		      <p>
		      	<input type="radio" name="type" value="applicant" checked="checked" />
		      	<strong>JOB SEEKER</strong> - who's finding some places to use the talents.
		      </p>
		      
		      <p>
		      	<input type="radio" name="type" value="employer" />
		      	<strong>EMPLOYER</strong> - who's finding some talents to get jobs done.
		      </p>
		      <br />
		      <p><input type="submit" value="Next"/></p>
		    </form>
	    </div>
    </div>
</body>
</html>
