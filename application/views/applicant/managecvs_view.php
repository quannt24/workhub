<h1>Manage CVs</h1>

<?php if (isset($discarded) && $discarded == TRUE) echo "<p>Notice: CV is discarded</p>"; ?>

<div style="padding-bottom: 50px">
	<table border="0" cellpadding="10" style="text-align: center">
	  <tr>
	    <th>ID</th>
	    <th>Subject</th>
	    <th>Active</th>
	    <th>Number of invitations</th>
	  </tr>
	
	  <?php foreach ($cvs as $row) if ($row['Status'] > DISABLED) { ?>
	  <tr>
	    <td><?php echo $row['CID']; ?></td>
	    <td><?php echo $row['Subject']; ?></td>
	    <td><?php echo ($row['Status'] == ACTIVE ? 'Yes' : '-'); ?></td>
	    <td><?php echo count($invs[$row['CID']]); ?></td>
	    <td><?php echo anchor('applicant/managecvs/examine/'.$row['CID'], 'Examine'); ?></td>
	    <td><?php echo anchor('applicant/cv/edit/'.$row['CID'], 'Edit'); ?></td>
	    <td><?php echo anchor('applicant/cv/discard/'.$row['CID'], 'Discard'); ?></td>
	  </tr>
	  <?php } /* Close 'foreach if' */ ?>
	</table>
	<?php echo anchor('applicant/cv', 'Add a CV'); ?>
</div>

<?php if ($excid > 0) { ?>
<h3>Examine CV: <?php echo $excv.' - ID: '.$excid; ?></h3>
<table border="1">
  <tr>
    <th>Job ID</th>
    <th>Name</th>
    <th>Employer</th>
    <th>Job status</th>
    <th>Expiration date</th>
    <th>Level</th>
    <th>Category</th>
    <th>Min salary</th>
    <th>Max salary</th>
    <th>Region</th>
    <th>Address</th>
    <th>Invitation Status</th>
  </tr>

  <?php if (isset($invs[$excid]) && $jobs != NULL) foreach ($jobs as $row) { ?>
  <tr>
    <td><?php echo $row['JID']; ?></td>
    <td><?php echo anchor('applicant/job/view/'.$row['JID'], $row['Job_Name']); ?></td>
    <td><?php echo $row['Employer_Name']; ?></td>
    <td><?php
        if ($row['Job_Status'] == ACTIVE) {
          echo 'Active';
        } else if ($row['Job_Status'] == INACTIVE) {
          echo 'Inactive';
        } else {
          echo 'Deleted';
        }
        ?></td>
    <td><?php echo $row['ExpiredDate']; ?></td>
    <td><?php echo $row['Level_Name']; ?></td>
    <td><?php echo $row['Category_Name']; ?></td>
    <td><?php echo $row['MinSalary']; ?></td>
    <td><?php echo $row['MaxSalary']; ?></td>
    <td><?php echo $row['Region_Name']; ?></td>
    <td><?php echo $row['Job_Address']; ?></td>
    <td><?php
        if ($row['Inv_Status'] == ACCEPTED) {
          echo 'Accepted';
        } else if ($row['Inv_Status'] == REFUSED) {
          echo 'Refused';
        } else {
          echo 'Waiting';
        }
        ?></td>

    <?php if ($row['Job_Status'] == ACTIVE) { ?>
    <td><?php echo anchor('applicant/managecvs/accept/'.$excid.'/'.$row['JID'], 'Accept'); ?></td>
    <td><?php echo anchor('applicant/managecvs/refuse/'.$excid.'/'.$row['JID'], 'Refuse'); ?></td>
    <?php } /* Close if ($row['Job_Status']) */ ?>

  </tr>
  <?php } /* Close 'if foreach' */ ?>
</table>
<?php } /* Close if ($exjid > 0) */ ?>
