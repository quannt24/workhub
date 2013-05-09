<h1>Invitations</h1>
<br />
<?php if (isset($invitations) && $invitations != NULL) { ?>
<table border="0" cellpadding="10" style="text-align: center">
  <tr>
    <th>Job ID</th>
    <th>Job</th>
    <th>CV ID</th>
    <th>Applicant</th>
    <th>Status</th>
  </tr>

  <?php foreach ($invitations as $row) { ?>
  <tr>
    <td><?php echo $row['JID']; ?></td>
    <td><?php echo $row['Job_Name']; ?></td>
    <td><?php echo $row['CID']; ?></td>
    <td><?php echo $row['Applicant_Name']; ?></td>
    <td><?php
        if ($row['Status'] == ACCEPTED) {
          echo 'Accepted';
        } else if ($row['Status'] == REFUSED) {
          echo 'Refused';
        } else {
          echo 'Waiting';
        }
        ?></td>
  </tr>
  <?php } /* Close 'foreach' */ ?>
</table>
<?php } /* Close if */ ?>
