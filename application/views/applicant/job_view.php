<h1>View Job</h1>
<br />
<p><?php if ($job == NULL) echo "Unknown job"; else { ?></p>

<table border="0" style="text-align: left">
<!-- Information -->
	<tr>
		<th style="padding-right: 30px; vertical-align: top;" rowspan="5">Basic information</th>
		<td>Job name: <?php echo $job['Name']; ?></td>
	</tr>
	<tr>
		<td>ID: <?php echo $job['JID']; ?></td>
	</tr>
	<tr>
		<td>Employer: <?php if ($employer != NULL) echo $employer['Name']; ?></td>
	</tr>
	<tr>
		<td>Status: <?php if ($job['Status'] == ACTIVE) echo "Active"; else echo "Inactive"; ?></td>
	</tr>
	<tr>
		<td>Expiration date: <?php echo $job['ExpiredDate']; ?></td>
	</tr>
	<tr><td></td></tr>
<!-- Job Description -->
	<tr>
		<th style="padding-right: 30px; vertical-align: top;" rowspan="7">Job Description</th>
		<td>
			Job level: 
			<?php
			  foreach ($levels as $row) {
			    if ($row['JLID'] == $job['JLID']) {
			      echo $row['Name'];
			      break;
			    }
			  }
			?>
		</td>
	</tr>

	<tr>
		<td>
			Category: 
			<?php
			  foreach ($categories as $row) {
			    if ($row['CAID'] == $job['CAID']) {
			      echo $row['Name'];
			      break;
			    }
			  }
			?>
		</td>	
	</tr>

	<tr><td>Min salary: <?php echo $job['MinSalary']; ?></td></tr>
	<tr><td>Max salary: <?php echo $job['MaxSalary']; ?></td></tr>
	<tr>
		<td>
			Region: 
			<?php
			  foreach ($regions as $row) {
			    if ($row['RID'] == $job['RID']) {
			      echo $row['Name'];
			      break;
			    }
			  }
			?>
		</td>
	</tr>
	<tr><td>Address: <?php echo $job['Address']; ?></td></tr>
	<tr><td>Description: <?php echo $job['Description']; ?></td></tr>
	<tr><td></td></tr>
<!-- Job Requirements -->
	<tr>
		<th style="padding-right: 30px; vertical-align: top" rowspan="4">Job Requirements</th>
		<td>Education: <?php echo $job['EduReq']; ?></td>
	</tr>
	<tr><td>Skills: <?php echo $job['SkillReq']; ?></td></tr>
	<tr><td>Languages: <?php echo $job['LangReq']; ?></td></tr>
	<tr><td>Experience: <?php echo $job['ExpReq']; ?></td></tr>
	<tr><td></td></tr>
</table>

<div style="padding-bottom: 50px">
  <?php echo anchor('applicant/job/apply/'.$job['JID'], 'Apply'); ?>
</div>

<?php } /* Close if ($job == NULL) ...; else { */ ?>
