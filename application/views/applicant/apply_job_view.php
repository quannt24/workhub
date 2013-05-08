<?php if ($job == NULL) redirect('home', 'refresh'); else { ?>
<h1>Apply for job</h1>
<div style="padding-bottom: 50px">
<table style="text-align: left;" border="0" cellpadding="10">
    <tr>
    	<th>Job Name:</th>
    	<td><?php echo $job['Name']; ?></td>
    </tr>
    <tr>
    	<th>Job ID:</th>
    	<td><?php echo $job['JID']; ?></td>
    </tr>
    <tr>
    	<th>Employer:</th>
    	<td><?php echo $employer['Name']; ?></td>
    </tr>
</table>
</div>

<div style="padding-bottom: 50px"
<p>Please select one of your CVs. Note: You cannot use a CV to apply for a job twice.</p>

  <?php
  if ($cvs == NULL) {
    echo '<p>Notice: You have no CV now. Please create one!</p>';
  } else {
    echo validation_errors();
    echo form_open('applicant/verify_apply');
  ?>
      <!-- Hidden field for Job ID, Employer ID -->
      <input type="hidden" name="job" value="<?php echo $job['JID']; ?>">
      <input type="hidden" name="euid" value="<?php echo $employer['UID']; ?>">

      <!-- Radio button for CVs -->
	<table style="text-align: left">	
    <?php foreach ($cvs as $row) if ($row['Status'] > DISABLED) { ?>
    	<tr><td><input type="radio" name="cv" value="<?php echo $row['CID']; ?>"/><?php echo $row['Subject']; ?></td></tr>
    <?php } /* Close 'foreach if' */ ?>
	</table>
	
	<br />
      <input type="submit" value="Apply"/>
    </form>

  <?php } /* Close if ($cvs == NULL) {}; else { */ ?>
<?php } /* Close if ($job == NULL) {}; else { */ ?>
</div>