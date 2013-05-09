<h1>Search CVs</h1>

<div style="padding-bottom: 50px">
	<?php echo validation_errors(); ?>
	<?php echo form_open('employer/verify_search'); ?>
	  <input type="text" size="60" name="search" placeholder="Education level, Skill, Language, Experience..."
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

<div style="padding-bottom: 50px">
<?php if (isset($search_result) && $search_result != NULL) { ?>
<h2>Search result</h2>
<table border="0" cellpadding="10" style="text-align: center">
  <tr>
    <th>CV's ID</th>
    <th>Name</th>
    <th>Sex</th>
    <th>Birthday</th>
    <th>Education Level</th>
    <th>Skills</th>
    <th>Languages</th>
    <th>Experience</th>
    <th>Additional Information</th>
    <th>Region</th>
  </tr>

  <?php foreach ($search_result as $row) if ($row['CV_Status'] > DISABLED) { ?>
  <tr>
    <td><?php echo $row['CID']; ?></td>
    <td><?php echo $row['User_Name']; ?></td>
    <td><?php echo ($row['Sex'] == MALE ? 'Male' : 'Female'); ?></td>
    <td><?php echo $row['Birthday']; ?></td>
    <td><?php echo $row['EduLev']; ?></td>
    <td><?php echo $row['Skill']; ?></td>
    <td><?php echo $row['Language']; ?></td>
    <td><?php echo $row['Exp']; ?></td>
    <td><?php echo $row['AddInfo']; ?></td>
    <td><?php echo $row['Region_Name']; ?></td>
    <td><?php echo anchor('employer/cv/view/'.$row['CID'], 'View'); ?></td>
    <td><?php echo anchor('employer/cv/invite/'.$row['CID'], 'Invite'); ?></td>
  </tr>
  <?php } /* Close 'foreach if' */ ?>

</table>
<?php } /* Close 'if ($search_result)' */ ?>
</div>