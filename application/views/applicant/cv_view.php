<h1>Edit CV</h1>

<?php
if (isset($saved) && $saved == TRUE) echo "<p>CV is saved</p>";
echo validation_errors();
?>

<?php echo form_open('applicant/verify_cv'); ?>
<table border="0" cellpadding="0" style="text-align: left">
	<!-- ID -->
	<tr>
		<td><label for="id">ID</label></td>
		<td><input type="text" size="20" name="id" readonly
    value="<?php echo ($cv != NULL ? $cv['CID'] : '0'); ?>"/></td>
	</tr>
	<!-- Subject -->
	<tr>
		<td><label for="subject">Subject</label></td>
		<td><input type="text" size="20" name="subject"
    value="<?php echo ($cv != NULL ? $cv['Subject'] : set_value('subject')); ?>"/></td>
	</tr>
	<!-- Status -->
	<tr>
		<td><label for="status">Status</label></td>
		<td>
			<select name="status">
				<option value="<?php echo ACTIVE; ?>" <?php echo ($cv != NULL && $cv['Status'] == ACTIVE ? 'selected' : ''); ?>>Active</option>
				<option value="<?php echo INACTIVE; ?>" <?php echo ($cv != NULL && $cv['Status'] != ACTIVE ? 'selected' : ''); ?>>Inactive</option>
			</select>
		</td>
  	</tr>
	<!-- Educational level -->
	<tr>
		<td><label for="edu_lev">Education level</label></td>
		<td><textarea rows="5" cols="60" name="edu_lev"><?php echo ($cv != NULL ? $cv['EduLev'] : set_value('edu_lev')); ?></textarea></td>
	</tr>
	
	<tr>
		<td><label for="skill">Skills</label></td>
		<td><textarea rows="5" cols="60" name="skill"><?php echo ($cv != NULL ? $cv['Skill'] : set_value('skill')); ?></textarea></td>
	</tr>

	<tr>
		<td><label for="language">Language</label></td>
		<td><textarea rows="5" cols="60" name="language"><?php echo ($cv != NULL ? $cv['Language'] : set_value('language')); ?></textarea></td>
	</tr>

	<tr>
		<td><label for="exp">Experience</label></td>
		<td><textarea rows="5" cols="60" name="exp"><?php echo ($cv != NULL ? $cv['Exp'] : set_value('exp')); ?></textarea></td>
	</tr>

	<tr>
		<td><label for="region">Region</label></td>
		<td>
			<select name="region">
				<?php
				foreach ($regions as $row) {
					if ($cv != NULL) {
					echo '<option value="'.$row['RID'].'" '.($row['RID'] == $cv['RID'] ? 'selected' : '').'>'.$row['Name'].'</option>';
					} else {
					echo '<option value="'.$row['RID'].'" '.($row['RID'] == set_value('regions') ? 'selected' : '').'>'.$row['Name'].'</option>';
					}
				}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td><label for="add_info">Additional information</label></td>
		<td><textarea rows="5" cols="60" name="add_info"><?php echo ($cv != NULL ? $cv['AddInfo'] : set_value('add_info')); ?></textarea></td>
	</tr>
	<tr style="text-align: center"><td colspan="2"><input type="submit" value="Save"/></td></tr>
</table>
</form>

<div style="padding-bottom: 50px">
  <?php echo anchor('applicant/managecvs', 'Cancel'); ?>
</div>
