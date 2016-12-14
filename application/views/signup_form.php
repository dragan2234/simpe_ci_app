<h1> create an Accaount</h1>


<fieldset>
<legend>Personal information</legend>
<?php
	
	echo form_open('login/create_member');
	echo form_input('first_name', set_value('first_name', 'First Name'));
	echo form_input('last_name', set_value('last_name', 'Last Name'));
	echo form_input('email_address', set_value('email_address', 'Email Address'));
  ?>
</fieldset>
<h1></h1>
<ul>Features:
	<li>You need to type in correct e-mail address</li>

</ul>
<fieldset>
	<legend>
		Login Info
	</legend>

<?php
	echo form_input('username', set_value('username', 'Username'));
	echo form_input('password', set_value('password', 'Password'));
	echo form_input('password2', set_value('password2', 'Password Confirm'));

	echo form_submit('submit', 'Create Account');
  ?>


  <?php echo validation_errors('<p class="error">'); ?>
</fieldset>
<ul>Features:
	<li>Your password needs to be same as password confirmation</li>
	<li>Your username must be unique.</li>

</ul>