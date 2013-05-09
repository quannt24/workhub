<h1>View CV</h1>
<br />
<p><?php if ($cv == NULL || $applicant == NULL) echo "Unknown CV"; else { ?></p>

<table border="0" style="text-align: left">
	<tr>
		<th style="padding-right: 30px; vertical-align: top;" rowspan="7">Applicant information</th>
		<td>Name: <?php echo $applicant['Name']; ?></td>
	</tr>
	<tr>
		<td>Sex: <?php echo ($applicant['Sex'] == MALE ? 'Male' : 'Female'); ?></td>
	</tr>
	<tr>
		<td>Birthday: <?php echo $applicant['Birthday']; ?></td>
	</tr>
	<tr>
		<td>Email: <?php echo $applicant['Email']; ?></td>
	</tr>
	<tr>
		<td>
			Region: <?php
			  foreach ($regions as $row) {
			    if ($row['RID'] == $applicant['RID']) {
			      echo $row['Name'];
			      break;
			    }
			  }
			  ?>
		</td>
	</tr>
	<tr><td>Address: <?php echo $applicant['Address']; ?></td></tr>
	<tr><td>Description: <?php echo $applicant['Description']; ?></td></tr>
	<tr><td> </td></tr>
	<tr>
		<th style="padding-right: 30px; vertical-align: top;" rowspan="7">Working information</th>
		<td>CV's ID: <?php echo $cv['CID']; ?></td>
	</tr>
	<tr><td>Skills: <?php echo $cv['Skill']; ?></td></tr>
	<tr><td>Education Level: <?php echo $cv['EduLev']; ?></td></tr>
	<tr><td>Experience: <?php echo $cv['Exp']; ?></td></tr>
	<tr><td>Languages: <?php echo $cv['Language']; ?></td></tr>
	<tr><td>Additional Information: <?php echo $cv['AddInfo']; ?></td></tr>
	<tr><td>Work region: <?php
	  foreach ($regions as $row) {
	    if ($row['RID'] == $cv['RID']) {
	      echo $row['Name'];
	      break;
	    }
	  }
  ?></td></tr>
  <tr><td></td></tr>
</table>

<div style="padding-bottom: 50px">
  <?php echo anchor('employer/cv/invite/'.$cv['CID'], 'Invite'); ?>
</div>

<?php } /* Close if ($job == NULL) ...; else { */ ?>
