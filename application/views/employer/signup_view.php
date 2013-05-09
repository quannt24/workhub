<h1>Hello Employer!</h1>
<h2>Please enter your information</h2>
<?php echo validation_errors(); ?>

<table style="text-align: left; padding-bottom: 50px" cellpadding="10" border="0">
<?php echo form_open('employer/verify_signup'); ?>
<tr>
  <td><label for="username">Username</label></td>
  <td><input type="text" size="20" id="username" name="username"
    value="<?php echo set_value('username'); ?>"/></td>
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
  <td><input type="text" size="20" id="email" name="email"
    value="<?php echo set_value('email'); ?>"/></td>
</tr>
<tr>
  <td><label for="name">Name</label></td>
  <td><input type="text" size="20" id="name" name="name"
    value="<?php echo set_value('name'); ?>"/></td>
</tr>
<tr>
  <td><label for="region">Region</label></td>
  <td><select name="region" value="24">
    <?php
    foreach ($regions as $row) {
      echo '<option value="'.$row['RID'].'">'.$row['Name'].'</option>';
    }
    ?>
  </select></td>
</tr>
<tr>
  <td><label for="address">Address</label></td>
  <td><input type="text" size="40" id="address" name="address"
    value="<?php echo set_value('address'); ?>"/></td>
</tr>
<tr>
  <td><label for="size">Size</label></td>
  <td><input type="text" size="20" id="size" name="size"
    value="<?php echo set_value('size'); ?>"/></td>
</tr>
<tr>
  <td><label for="description">Description</label></td>
  <td><textarea rows="5" cols="60" id="description" name="description"><?php echo set_value('description'); ?></textarea></td>
</tr>
<tr><td style="text-align: center" colspan="2"><input type="submit" value="Sign up"/></td></tr>
</form>
