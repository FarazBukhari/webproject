
	<body class="background">
		<div id="header" class="guest">
			<div class="wrapper">
				<div id="nav-primary">
					<div class="wrapper">
						<div class="logo" id="logo-linkedin">
							<img src="logo_linkedin_b.png" width="92" height="22" alt="LinkedIn">
						</div>
						<ul class="menu">
							<li id="nav-primary-auth">
								Already on LinkedIn? <a href="signin.html">Sign in</a>
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
				<div id="main" class="no-profile fb-reg">
					<div id="register-global-error">
						<div id="alert" role="alert">
							<p>
								<strong>
									There were one or more errors in your submission. Please correct the marked fields below.
								</strong>
							</p>
						</div>
					</div>
					<div class="introduction">
						<h1>
							To join LinkedIn, sign up below...it's free!
						</h1>
					</div>
					<div id="content">
						<div class="register-container">
							<form action="" method="POST" name="coldRegistrationForm" class="standard-form sided " id="joinform">
								<ul id="yui-gen1">
									<li class="name">
										<label for="firstName-coldRegistrationForm">First Name:</label>
										<div class="fieldgroup">
											<span class="error" id="firstName-error"><br></span>
											<input type="text" name="firstName" value="" id="firstName-coldRegistrationForm" maxlength="20">
										</div>
									</li>
									<li class="name ">
										<label for="lastName-coldRegistrationForm">Last Name:</label>
										<div class="fieldgroup">
											<span class="error" id="lastName-error"><br></span>
											<input type="text" name="lastName" value="" id="lastName-coldRegistrationForm" maxlength="40">
										</div>
									</li>
									<li>
										<label for="email-coldRegistrationForm">Email:</label>
										<div class="fieldgroup">
											<span class="error" id="email-error"><br></span>
											<span class="edit">Edit</span>
											<input type="text" name="email" value="" id="email-coldRegistrationForm" maxlength="128" data-ime-mode-disabled="">
										</div>
									</li>
									<li class="password-field">
										<label for="password-coldRegistrationForm">New Password:</label>
										<div class="fieldgroup">
											<span class="error" id="password-error"><br></span>
											<input type="password" name="password" value="" id="password-coldRegistrationForm">
										</div>

										<p class="note">6 or more characters</p>
									</li>
								</ul>

								<p class="actions">
									<button class="btn-tertiary" type="submit" id="btn-submit">
										<div>Join LinkedIn</div>
									</button>*
									<div class="progress-indicator" style="line-height: 23px;"></div>
									<abbr title="By clicking Join LinkedIn, you are indicating that you have read, understood, and agree to LinkedIn's User Agreement and Privacy Policy" class="hidden"><em></em></abbr>
								</p>


								<p id="register-custom-nav" class="key">
									Already on LinkedIn? <a href="signin.html">Sign in</a>
								</p>
							</form>
							
							</div>

						</div>

						<div id="extra">
							<div class="sign-in-with">
								<p class="handwritten">Save time by using your Facebook account to sign up for LinkedIn.</p>
								<p class="actions">
									<a class="fb_button" href="" id="yui-gen3"><span class="fb_button_text">Sign up with Facebook</span></a>
									<abbr title="By clicking Join LinkedIn, you are indicating that you have read, understood, and agree to LinkedIn's User Agreement and Privacy Policy"</abbr>
								</p>
							</div>
						</div>
					</div>
					<p id="agreement">
						* By joining LinkedIn, you agree to LinkedIn's <a target="_blank" href="agrement.html">User Agreement</a>, <a target="_blank" href="">Privacy Policy</a> and <a target="_blank" href="">Cookie Policy</a>
					</p>
				</div>
			</div>
