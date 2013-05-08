<h1>Search Jobs</h1>

<div style="padding-bottom: 50px">
	<?php echo validation_errors(); ?>
	<?php echo form_open('applicant/verify_search'); ?>
	  <input type="text" size="60" name="search" placeholder="Job name"
	    value="<?php echo set_value('search'); ?>"/>
	  <input type="submit" value="Search"/>
	  <br/>
	
	  <select name="region">
	    <option value="0">Any region</option>
	    <?php
	    foreach ($regions as $row) {
	      echo '<option value="'.$row['RID'].'" '.($row['RID'] == set_value('region') ? 'selected' : '').'>'.$row['Name'].'</option>';
	    }
	    ?>
	  </select>
	
	  <select name="category">
	    <option value="0">Any category</option>
	    <?php
	    foreach ($categories as $row) {
	      echo '<option value="'.$row['CAID'].'" '.($row['CAID'] == set_value('category') ? 'selected' : '').'>'.$row['Name'].'</option>';
	    }
	    ?>
	  </select>
	
	  <select name="level">
	    <option value="0">Any level</option>
	    <?php
	    foreach ($levels as $row) {
	      echo '<option value="'.$row['JLID'].'" '.($row['JLID'] == set_value('level') ? 'selected' : '').'>'.$row['Name'].'</option>';
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
	    <th>ID</th>
	    <th>Job name</th>
	    <th>Employer</th>
	    <th>Active</th>
	    <th>Job level</th>
	    <th>Category</th>
	    <th>Min salary</th>
	    <th>Max salary</th>
	    <th>Region</th>
	  </tr>
	
	  <?php foreach ($search_result as $row) if ($row['Status'] > DISABLED) { ?>
	  <tr>
	    <td><?php echo $row['JID']; ?></td>
	    <td><?php echo anchor('applicant/job/view/'.$row['JID'], $row['Job_Name']); ?></td>
	    <td><?php echo $row['Emp_Name']; ?></td>
	    <td><?php echo ($row['Status'] == ACTIVE ? 'Yes' : '-'); ?></td>
	    <td><?php echo $row['JobLevel_Name']; ?></td>
	    <td><?php echo $row['Category_Name']; ?></td>
	    <td><?php echo $row['MinSalary']; ?></td>
	    <td><?php echo $row['MaxSalary']; ?></td>
	    <td><?php echo $row['Region_Name']; ?></td>
	  </tr>
	  <?php } /* Close 'foreach if' */ ?>
	
	</table>
	<?php } /* Close 'if ($search_result)' */ ?>
</div>