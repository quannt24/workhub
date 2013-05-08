<h1>Profile</h1>

<?php
if (isset($updated) && $updated == TRUE) echo "<p>Profile is updated</p>";
echo validation_errors();
?>

<table style="text-align: left; vertical-align: top; padding-bottom: 50px" cellpadding="10" border="0">
<?php echo form_open('applicant/verify_profile'); ?>

	<tr>
		<td><label for="type">Account type</label></td>
		<td><input type="text" size="20" name="type" readonly
    value="Applicant"/>
    	</td>
	</tr>
	<tr>
		<td><label for="username">Username</label></td>
		<td>
			<input type="text" size="20" name="username" readonly
    		value="<?php echo $user['Username'];?>"/>		
		</td>
	</tr>
	<tr>
		<td><label for="password">Password</label></td>
		<td><input type="password" size="20" id="password" name="password"/></td>
	</tr>
	<tr>
		<td><label for="confirm">Confirm password</label></td>
		<td><input type="password" size="20" id="confirm" name="confirm"/></td>
	</tr>
	<tr>
		<td><label for="email">Email</label></td>
		<td>
			<input type="text" size="20" id="email" name="email"
    		value="<?php echo $user['Email']; ?>"/>
    	</td>
	</tr>
	<tr>
		<td><label for="name">Name</label></td>
		<td>
			<input type="text" size="20" id="name" name="name"
    		value="<?php echo $user['Name']; ?>"/>		
		</td>
	</tr>
	<tr>
		<td><label for="sex">Sex</label></td>
		<td>
			<input type="radio" name="sex" value="male" <?php if ($user['Sex'] == MALE) echo 'checked="checked"';?> />Male
			<input type="radio" name="sex" value="female" <?php if ($user['Sex'] == FEMALE) echo 'checked="checked"';?>/>Female			
		</td>
	</tr>
	<tr>
		<td><label for="birthday">Birthday</label></td>
		<td>
			<input type="date" id="birthday" name="birthday"
    		value="<?php echo $user['Birthday']; ?>"/>		
		</td>
	</tr>
	<tr>
		<td><label for="region">Region</label></td>
		<td>
			<select name="region">
		    <?php
		    foreach ($regions as $row) {
		      echo '<option value="'.$row['RID'].'" '.($row['RID'] == $user['RID'] ? 'selected' : '').'>'.$row['Name'].'</option>';
		    }
		    ?>
  			</select>			
		</td>
	</tr>
	<tr>
		<td><label for="address">Address</label></td>
		<td>
			<input type="text" size="40" id="address" name="address"
    		value="<?php echo $user['Address']; ?>"/>			
		</td>
	</tr>
	<tr>
		<td><label for="description">Description</label></td>
		<td><textarea rows="5" cols="60" id="description" name="description"><?php echo $user['Description']; ?></textarea></td>
	</tr>

	<tr><td colspan="2" style="text-align: center"><input type="submit" value="Update"/></td> </tr>
</form>
</table>