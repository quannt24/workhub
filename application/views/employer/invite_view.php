<?php if ($cv == NULL) redirect('home', 'refresh'); else { ?>
<h1>Invite applicant</h1>
<div style="padding-bottom: 50px">
<table style="text-align: left;" border="0" cellpadding="10">
  <tr>
  	<th>Applicant</th>
  	<td><?php echo $applicant['Name']; ?></td>
  </tr>
  <tr>
  	<th>CV's ID</th>
  	<td><?php echo $cv['CID']; ?></td>
  </tr>
</table>
</div>

<div style="padding-bottom: 50px"
  <p>Please select one of your jobs. Note: You cannot send invitation for a CV twice.</p>

  <?php
  if ($jobs == NULL) {
    echo '<p>Notice: You have no job now. Please create one or activate an existing job!</p>';
  } else {
    echo validation_errors();
    echo form_open('employer/verify_invite');
  ?>
      <!-- Hidden field for CID, Applicant ID -->
      <input type="hidden" name="cid" value="<?php echo $cv['CID']; ?>">
      <input type="hidden" name="auid" value="<?php echo $applicant['UID']; ?>">

	<table style="text-align: left">
      <!-- Radio button for jobs -->
      <?php foreach ($jobs as $row) if ($row['Status'] == ACTIVE) { ?>
        <tr><td><input type="radio" name="job" value="<?php echo $row['JID']; ?>"/><?php echo $row['Name'].' (ID: '.$row['JID'].')'; ?></td></tr>
      <?php } /* Close 'foreach if' */ ?>
      </table>
	<br />
      <input type="submit" value="Invite"/>
    </form>

  <?php } /* Close if ($jobs == NULL) {}; else { */ ?>
<?php } /* Close if ($cv == NULL) {}; else { */ ?>
</div>