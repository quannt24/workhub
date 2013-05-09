<h1>Edit Job</h1>

<?php
if (isset($saved) && $saved == TRUE) echo "<p>Job is saved</p>";
echo validation_errors();
?>

<?php echo form_open('employer/verify_job'); ?>
<table border="0" cellpadding="0" style="text-align: left">
	<tr>
  <td><label for="id">ID</label></td>
  <td><input type="text" size="20" name="id" readonly
    value="<?php echo ($job != NULL ? $job['JID'] : '0'); ?>"/></td>
  </tr>
	<tr>
  <td><label for="name">Name</label></td>
  <td><input type="text" size="20" name="name"
    value="<?php echo ($job != NULL ? $job['Name'] : set_value('name')); ?>"/></td>
  </tr>
	<tr>
  <td><label for="status">Status</label></td>
  <td><select name="status">
    <option value="<?php echo ACTIVE; ?>" <?php echo ($job != NULL && $job['Status'] == ACTIVE ? 'selected' : ''); ?>>Active</option>
    <option value="<?php echo INACTIVE; ?>" <?php echo ($job != NULL && $job['Status'] != ACTIVE ? 'selected' : ''); ?>>Inactive</option>
  </select></td>
  </tr>
	<tr><td colspan="2"> <h3>Job Description</h3></td></tr>
	<tr>
  <td><label for="level">Level</label></td>
  <td><select name="level">
    <?php
    foreach ($levels as $row) {
      if ($job != NULL) {
        echo '<option value="'.$row['JLID'].'" '.($row['JLID'] == $job['JLID'] ? 'selected' : '').'>'.$row['Name'].'</option>';
      } else {
        echo '<option value="'.$row['JLID'].'" '.($row['JLID'] == set_value('level') ? 'selected' : '').'>'.$row['Name'].'</option>';
      }
    }
    ?>
  </select></td>
  </tr>
	<tr>
  <td><label for="category">Category</label></td>
  <td><select name="category">
    <?php
    foreach ($categories as $row) {
      if ($job != NULL) {
        echo '<option value="'.$row['CAID'].'" '.($row['CAID'] == $job['CAID'] ? 'selected' : '').'>'.$row['Name'].'</option>';
      } else {
        echo '<option value="'.$row['CAID'].'" '.($row['CAID'] == set_value('category') ? 'selected' : '').'>'.$row['Name'].'</option>';
      }
    }
    ?>
  </select></td>
  </tr>
	<tr>
  <td><label for="min_salary">Min salary</label></td>
  <td><input type="text" size="20" name="min_salary"
    value="<?php echo ($job != NULL ? $job['MinSalary'] : set_value('min_salary')); ?>"/></td>
  </tr>
	<tr>
  <td><label for="max_salary">Max salary</label></td>
  <td>
  <input type="text" size="20" name="max_salary"
    value="<?php echo ($job != NULL ? $job['MaxSalary'] : set_value('max_salary')); ?>"/></td>
  </tr>
	<tr>
  <td><label for="expire">Expire date</label></td>
  <td>
  <input type="text" size="20" name="expire"
    value="<?php echo ($job != NULL ? $job['ExpiredDate'] : set_value('expire')); ?>"/></td>
  </tr>
	<tr>
  <td><label for="region">Region</label></td>
  <td><select name="region">
    <?php
    foreach ($regions as $row) {
      if ($job != NULL) {
        echo '<option value="'.$row['RID'].'" '.($row['RID'] == $job['RID'] ? 'selected' : '').'>'.$row['Name'].'</option>';
      } else {
        echo '<option value="'.$row['RID'].'" '.($row['RID'] == set_value('region') ? 'selected' : '').'>'.$row['Name'].'</option>';
      }
    }
    ?>
  </select></td>
  </tr>
	<tr>
  <td><label for="address">Address</label></td>
  <td><input type="text" size="40" name="address"
    value="<?php echo ($job != NULL ? $job['Address'] : set_value('address')); ?>"/></td>
  </tr>
	<tr>
  <td><label for="description">Description</label></td>
  <td><textarea rows="5" cols="60" name="description"><?php echo ($job != NULL ? $job['Description'] : set_value('description')); ?></textarea></td>
 	</tr>
	<tr><td colspan="2"><h3>Job Requirements</h3></td> </tr>
  <tr>
  <td><label for="edu_req">Education</label></td>
  <td><textarea rows="5" cols="60" name="edu_req"><?php echo ($job != NULL ? $job['EduReq'] : set_value('edu_req')); ?></textarea></td>
  </tr>
	<tr>
  <td><label for="skill_req">Skills</label></td>
  <td><textarea rows="5" cols="60" name="skill_req"><?php echo ($job != NULL ? $job['SkillReq'] : set_value('skill_req')); ?></textarea></td>
	</tr>
	<tr>
  <td><label for="lang_req">Languages</label></td>
  <td><textarea rows="5" cols="60" name="lang_req"><?php echo ($job != NULL ? $job['LangReq'] : set_value('lang_req')); ?></textarea></td>
  </tr>
	<tr>
  <td><label for="exp_req">Experience</label></td>
  <td><textarea rows="5" cols="60" name="exp_req"><?php echo ($job != NULL ? $job['ExpReq'] : set_value('exp_req')); ?></textarea></td>
	</tr>
	<tr><td colspan="2" style="text-align: center"><input type="submit" value="Save"/></td></tr>
</table>
</form>

<div style="padding-bottom: 50px"><?php echo anchor('employer/managejobs', 'Cancel'); ?></div>
