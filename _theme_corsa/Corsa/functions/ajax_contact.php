<?php

if ( ! function_exists('us_sendContact'))
{
	function us_sendContact()
	{
		global $smof_data;
		$errors = 0;

		if (in_array(@$smof_data['contact_form_name_field'], array('Shown, required')) AND empty($_POST['name']))
		{
			$errors++;
		}

		if (in_array(@$smof_data['contact_form_email_field'], array('Shown, required')) AND empty($_POST['email']))
		{
			$errors++;
		}

		if (in_array(@$smof_data['contact_form_phone_field'], array('Shown, required')) AND empty($_POST['phone']))
		{
			$errors++;
		}


		if (empty($_POST['message']))
		{
			$errors++;
		}

		if ($errors > 0)
		{
			$response = array ('success' => 0);
			echo json_encode($response);
			die();
		}

		$emailTo = (@$smof_data['contact_form_email'] != '')?$smof_data['contact_form_email']:get_option('admin_email');

		$body = '';

		if (in_array(@$smof_data['contact_form_name_field'], array('Shown, required', 'Shown, not required')))
		{
			$body .= __('Name', 'us').": ".$_POST['name']."\n";
		}

		if (in_array(@$smof_data['contact_form_email_field'], array('Shown, required', 'Shown, not required')))
		{
			$body .= __('Email', 'us').": ".$_POST['email']."\n";
		}

		if (in_array(@$smof_data['contact_form_phone_field'], array('Shown, required', 'Shown, not required')))
		{
			$body .= __('Phone', 'us').": ".$_POST['phone']."\n";
		}

		$body .= "\n".__('Message', 'us').":\n".$_POST['message'];
		$headers = '';

		wp_mail($emailTo, __('Contact request from', 'us')." http://".$_SERVER['HTTP_HOST'].'/', $body, $headers);

		$response = array ('success' => 1);
		echo json_encode($response);

		die();

	}

	add_action( 'wp_ajax_nopriv_sendContact', 'us_sendContact' );
	add_action( 'wp_ajax_sendContact', 'us_sendContact' );
}