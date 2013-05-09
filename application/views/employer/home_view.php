<!-- Search -->
<div style="padding-bottom: 50px">
	<h1>Search</h1>
	<?php echo form_open('employer/verify_search'); ?>
  	<input type="text" size="60" name="search"
    placeholder="Education level, Skill, Language, Experience..."
    value="<?php echo set_value('search'); ?>"/>
  	<input type="submit" value="Search"/>
  <br/>

  <select name="sex">
    <option value="-1">Any gender</option>
    <option value="<?php echo MALE; ?>">Male</option>
    <option value="<?php echo FEMALE; ?>">Female</option>
  </select>

  <select name="region">
    <option value="0">Any region</option>
    <?php
    foreach ($regions as $row) {
      echo '<option value="'.$row['RID'].'" '.($row['RID'] == set_value('region') ? 'selected' : '').'>'.$row['Name'].'</option>';
    }
    ?>
  </select>
</form>
</div>

<!-- View Jobs -->
<div style="padding-bottom: 50px">
	<?php if (isset($jobs) && $jobs != NULL) { ?>
    <h1>Jobs</h1>
    <?php } /* Close if */ ?>
    
    <?php if (isset($jobs) && $jobs != NULL) { ?>
    <table border="0" cellpadding="10" style="text-align: center">
    	<tr>
    		<th>ID</th>
        	<th>Name</th>
        	<th>Expired date</th>
        	<th>Active</th>
        	<th>NoA</th>
    	</tr>
    	
    	<?php foreach ($jobs as $row) if ($row['Status'] > DISABLED) { ?>
        <tr>
          <td><?php echo $row['JID']; ?></td>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['ExpiredDate']; ?></td>
          <td><?php echo ($row['Status'] == ACTIVE ? 'Yes' : '-'); ?></td>
          <td><?php echo count($apps[$row['JID']]); ?></td>
          <td><?php echo anchor('employer/managejobs/examine/'.$row['JID'], 'Examine'); ?></td>
          <td><?php echo anchor('employer/job/edit/'.$row['JID'], 'Edit'); ?></td>
          <td><?php echo anchor('employer/job/discard/'.$row['JID'], 'Discard'); ?></td>
        </tr>
        <?php } /* Close 'foreach if' */ ?>
      </table>
      <?php } /* Close if */ ?>
</div>

<!-- View Invitations -->
<div style="padding-bottom: 50px">
	<?php if (isset($invitations) && $invitations != NULL) { ?>
	<h1>Invitations</h1>
	<?php } /* Close if */ ?>
	
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
</div>