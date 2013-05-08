
	<div style="height: 125px;"> </div>
	<div class="logo" align="center">
		<img border="0" src="<?php echo base_url(); ?>/assets/images/login-logo.jpg">
	</div>
	<br />

	<div class="login" align="center">
		<?php echo validation_errors(); ?>
		<?php echo form_open('verify_login'); ?>
		<p>
		  <label for="username">Username</label>
		  <input type="text" size="20" id="username" name="username"
		    value="<?php echo set_value('username'); ?>"/>
		</p>
		<p>
		  <label for="password">Password</label>
		  <input type="password" size="20" id="password" name="password"/>
		</p>
		<p><input type="submit" value="Login"/></p>
		</form>
		<p>
			Or
			<?php echo anchor('signup', 'sign up', array('title' => 'Sign up for an account')); ?>
			and join us as Employers or Job Seekers.
		</p>
	</div>

