
<html>
	<head>
		<title>Join LinkedIn | LinkedIn</title>
		<link href="<?php echo base_url('/assets/css/01.css')?>" rel="stylesheet">
	</head>

	<body class="background" id = "body01">
		<div id="header" class="guest">
			<div class="wrapper">
				<div id="nav-primary">
					<div class="wrapper">
						<div class="logo" id="logo-linkedin">
							<img src="<?php echo base_url('/assets/img/logo_linkedin.png');?>" width="92" height="22" alt="LinkedIn">
						</div>
						<ul class="menu">
							<li id="nav-primary-auth">
								Already on LinkedIn? <a class = "01a" href="<?php echo base_url('index.php/login/login/signin');?>">Sign in</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="body">
			<div class="wrapper">
				<div id="global-error">
				</div>
				<div id="main" class="join-linkedin cold no-profile fb-reg">
					<div id="register-global-error">
					</div>
					<div class="introduction">
						<h1>
							To join LinkedIn, sign up below...it's free!
						</h1>
						<div class = "arrow">
							<img src = "<?php echo base_url('/assets/img/bg_arrow_foursided_blue.png');?>" alt = "arroww" height= "16" width= "32">
						</div>
					</div>
					<div id="content">
						<div class="register-container">
							<form action="<?php echo base_url('index.php/login/login/signup');?>" method="POST" name="coldRegistrationForm" novalidate="novalidate" class="standard-form sided " data-jsenabled="check" id="yui-gen2">

							<div class = "labeltext">
								<label for="firstName">First Name: </label>
								<div class="fieldgroup">
									<span class="error" id="firstName-coldRegistrationForm-error"></span>
									<input type="text" name="firstName" value="" id="firstName-coldRegistrationForm" maxlength="20" class = "">
								</div>
							</div>

							<div class = "labeltext">
								<label for="lastName-coldRegistrationForm">Last Name: </label>
								<div class="fieldgroup">
									<span class="error" id="lastName-coldRegistrationForm-error"></span>
									<input type="text" name="lastName" value="" id="lastName-coldRegistrationForm" maxlength="40">
								</div>
							</div>

							<div class = "labeltext">
								<label for="password-coldRegistrationForm">Email: </label>
								<div class="fieldgroup">
									<span class="error" id="email-coldRegistrationForm-error"></span>
									<span class="edit">Edit</span>
									<input type="email" name="email" value="" id="email-coldRegistrationForm" maxlength="128" data-ime-mode-disabled="">
									
								</div>
							</div>

							<div class = "labeltext">
								<label for="password-coldRegistrationForm">New Password: </label>
								<div class="fieldgroup">
									<span class="error" id="password-coldRegistrationForm-error"></span>
									<input type="password" name="password" value="" id="password-coldRegistrationForm">
								</div>
							</div>

							<p class="note">6 or more characters</p>
								<p class="actions">
									<button class="btn-tertiary" type="submit" id="btn-submit"><div>Join LinkedIn</div></button>
									<abbr title="By clicking Join LinkedIn, you are indicating that you have read, understood, and agree to LinkedIn's User Agreement and Privacy Policy" class="hidden"><em>*</em></abbr>
									<div class="progress-indicator" style="line-height: 23px;"></div>
									
								</p>


								<p id="register-custom-nav" class="key">
									Already on LinkedIn? <a class = "01a"  href="<?php echo base_url('index.php/login/login/signin');?>">Sign in</a>
								</p>

								<input type="hidden" name="webmailImport" value="true" id="webmailImport-coldRegistrationForm"><input type="hidden" name="trcode" value="hb_join" id="trcode-coldRegistrationForm"><input type="hidden" name="genie-reg" value="" id="genie-reg-coldRegistrationForm"><input type="hidden" name="mod" value="" id="mod-coldRegistrationForm"><input type="hidden" name="key" value="" id="key-coldRegistrationForm"><input type="hidden" name="authToken" value="" id="authToken-coldRegistrationForm"><input type="hidden" name="authType" value="" id="authType-coldRegistrationForm"><input type="hidden" name="csrfToken" value="ajax:0122122823687448600" id="csrfToken-coldRegistrationForm"><input type="hidden" name="sourceAlias" value="0_0pKtnXJ9l1BopHQS-IqS2t" id="sourceAlias-coldRegistrationForm">
								<div class="screen"></div></form>
							</div>

						</div>

						<div id="extra">
							<div class="sign-in-with">
								<p class="handwritten">Save time by using your Facebook account to sign up for LinkedIn.</p>
								<p class="actions">
									<a class="fb_button" href="#" id="yui-gen3"><span class="fb_button_text">Sign up with Facebook</span></a> *
									<abbr title="By clicking Join LinkedIn, you are indicating that you have read, understood, and agree to LinkedIn's User Agreement and Privacy Policy"</abbr>
								</p>
							</div>
						</div>
						<p id="agreement">
							* By joining LinkedIn, you agree to LinkedIn's <a class = "01a" target="_blank" href="<?php echo base_url('index.php/login/login/agreement');?>">User Agreement</a>, <a class = "01a" target="_blank" href="<?php echo base_url('index.php/login/login/index');?>">Privacy Policy</a> and <a class = "01a" target="_blank" href="<?php echo base_url('index.php/login/login/index');?>">Cookie Policy</a>
						</p>
					</div>

				</div>
			</div>
		</body>
</html>