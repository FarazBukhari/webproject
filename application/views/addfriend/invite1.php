<link href="<?php echo base_url('/assets/css/invite.css')?>" rel="stylesheet">

<body>
	<?php
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		$fulltarget = $_SESSION['target'];
	
		$fname1=$_GET['fname'];

	?>
	
	<div class="iwrite">
		<div class = "chapati">
		<ul id="nav-secondary">
			<div class = "chapatai1">
				<li id="nav-invite-contacts" class="chapati1">
					<a href="https://www.linkedin.com/fetch/importAndInviteEntry?trk=tab_cn"><span>Add Connections</span></a>
				</li>
			</div>
			<div class = "chapatai2">
				<li id="nav-colleagues" class="chapati2"><a href="/people/reconnect?posId=0"><span>Colleagues</span></a></li>
			</div>
			<div class = "chapatai3">
				<li id="nav-classmates" class="chapati3"><a href="/people/reconnect?eduId=0"><span>Alumni</span></a></li>
			</div>
			<div class = "chapatai4">
				<li id="nav-pymk" class="chapati4"><a href="/people/pymk?trk=frontier-tabs_connections-new_pymk"><span>People You May Know</span></a></li>
			</div>
			<div class = "chapatai5">
				<li id="nav-pymk" class="chapati5"><a href="/people/pymk?trk=frontier-tabs_connections-new_pymk"><span>View Sent Invitations</span></a></li>
			</div>
		</ul>
	</div><div class="iwrite-in">

		<h1>Invite <strong><?php echo $fname1; ?></strong> to connect on LinkedIn</h1>
		<div class="ipaper"><div class="ipaper-in">
			<div class="wrap">
				<span class="error" id="reason-iweReconnect-error"></span>
				<strong class="dark">How do you know <?php echo $fname1; ?>?</strong>
				<ul id="main-options">
					<li>
						<div class="d1">
							<div class="f123">
							<input type="radio" name="reason" value="IC" id="selector-IC-reason-iweReconnect" class="radio-btn-colleagues" >
						</div><label id="l1" for="selector-IC-reason-iweReconnect">Colleague</label>
							<div id="colleagues" class="form-wrapper" style="display: none;">
								<span class="error" id="existingPosition-other-IC-reason-iweReconnect-error"></span>
								<span id="colleagues-list">

									<select name="existingPositionIC" id="existingPosition-other-IC-reason-iweReconnect" style="width:340px">
										<option value="" selected="">Choose a company...</option><option value="433438909">Deputy Head Interior Decor at SOFTEC</option><option value="OTHER">Other...</option></select>

									</span>
									<div class="add-form" id="colleagues-add" style="display: none;">
										<p class="top">Enter a new position (it will be added to your profile)</p>
										<div class="formset">
											<div class="labl"><label for="companyName-company-newPositionIC-other-IC-reason-iweReconnect">Company:</label></div>
											<div class="elem">
												<span class="error" id="companyName-company-newPositionIC-other-IC-reason-iweReconnect-error"></span>

												<span><input type="text" name="companyName.0" value="" id="companyName-company-newPositionIC-other-IC-reason-iweReconnect" style="width:270px" size="32" maxlength="100" class="yui-ac-input" autocomplete="off"></span>

											</div>
										</div>
										<div class="formset">
											<div class="labl"><label for="title-newPositionIC-other-IC-reason-iweReconnect">Your Title:</label></div>
											<div class="elem">
												<span class="error" id="title-newPositionIC-other-IC-reason-iweReconnect-error"></span>
												<input type="text" name="titleIC.0" value="" id="title-newPositionIC-other-IC-reason-iweReconnect" style="width:270px">
											</div>
										</div>
										<div class="formset">
											<div class="labl">Years:</div>
											<div class="elem">
												<span class="error" id="year-startYear-newPositionIC-other-IC-reason-iweReconnect-error"></span>
												<span class="error" id="year-monthYear-endYear-newPositionIC-other-IC-reason-iweReconnect-error"></span>
												<input type="text" name="startYearIC.0" value="" id="year-startYear-newPositionIC-other-IC-reason-iweReconnect" size="4" maxlength="4" data-ime-mode-disabled="">
												to 
												<input type="text" name="endYearIC.0" value="" id="year-monthYear-endYear-newPositionIC-other-IC-reason-iweReconnect" size="4" maxlength="4" data-ime-mode-disabled="">
											</div>
										</div>
									</div>
								</div></div>
							</li>

							<li>
								<div class="d2">
									<span class="error" id="selector-IE-reason-iweReconnect-error"></span>
									<div class="f123">
									<input type="radio" name="reason" value="IE" id="selector-IE-reason-iweReconnect" class="radio-btn classmates">
									
									
									</div>
									<label id="l1" for="selector-IE-reason-iweReconnect">Classmate</label>
									<div id="classmates" class="form-wrapper" style="display: none;">

										<span class="error" id="existingEducation-other-IE-reason-iweReconnect-error"></span>
										<span id="classmates-list">

											<select name="existingEducation" id="existingEducation-other-IE-reason-iweReconnect" style="width:340px">
												<option value="" selected="">Choose school...</option><option value="174839285">National University of Computer and Emerging Sciences</option><option value="OTHER">Other...</option></select>


											</span>

											<div class="add-form" id="classmates-add" style="display: none;">
												<label for="schoolText-newEducation-other-IE-reason-iweReconnect">School:</label>
												<span class="error" id="schoolText-newEducation-other-IE-reason-iweReconnect-error"></span>

												<span><input type="text" name="schoolText" value="" id="schoolText-newEducation-other-IE-reason-iweReconnect" size="32" maxlength="150" class="yui-ac-input" autocomplete="off"><span class="selected-school"><strong class="school-name"></strong><span class="change-school-cntl"></span></span></span>


												<input type="hidden" name="schoolID" value="" id="schoolID-newEducation-other-IE-reason-iweReconnect" class="school-id-field">


											</div>


										</div></div>
									</li>
									<li>
										<div class="d3">
											<div class="f123">
											<input type="radio" name="reason" value="IB" id="selector-IB-reason-iweReconnect" class="radio-btn partners"></div>
											<label  id="l1" for="selector-IB-reason-iweReconnect">We’ve done business together</label>
											<div id="partners" class="form-wrapper" style="display: none;">
												<span class="error" id="existingPosition-other-IB-reason-iweReconnect-error"></span>
												<span id="partners-list">

													<select name="existingPositionIB" id="existingPosition-other-IB-reason-iweReconnect" style="width:340px">
														<option value="" selected="">Choose a company...</option><option value="433438909">Deputy Head Interior Decor at SOFTEC</option><option value="OTHER">Other...</option></select>


													</span>
													<div class="add-form" id="partners-add" style="display: none;">
														<p class="top">Enter a new position (it will be added to your profile)</p>
														<div class="formset">
															<div class="labl"><label for="companyName-company-newPositionIB-other-IB-reason-iweReconnect">Company:</label></div>
															<div class="elem">
																<span class="error" id="companyName-company-newPositionIB-other-IB-reason-iweReconnect-error"></span>

																<span><input type="text" name="companyName.1" value="" id="companyName-company-newPositionIB-other-IB-reason-iweReconnect" style="width:270px" size="32" maxlength="100" class="yui-ac-input" autocomplete="off"></span>

															</div>
														</div>
														<div class="formset">
															<div class="labl"><label for="title-newPositionIB-other-IB-reason-iweReconnect">Your Title:</label></div>
															<div class="elem">
																<span class="error" id="title-newPositionIB-other-IB-reason-iweReconnect-error"></span>
																<input type="text" name="titleIB.0" value="" id="title-newPositionIB-other-IB-reason-iweReconnect" style="width:270px">
															</div>
														</div>
														<div class="formset">
															<div class="labl">Years:</div>
															<div class="elem">
																<span class="error" id="year-startYear-newPositionIB-other-IB-reason-iweReconnect-error"></span>
																<span class="error" id="year-monthYear-endYear-newPositionIB-other-IB-reason-iweReconnect-error"></span>
																<input type="text" name="startYearIB.0" value="" id="year-startYear-newPositionIB-other-IB-reason-iweReconnect" size="4" maxlength="4" data-ime-mode-disabled="">
																to 
																<input type="text" name="endYearIB.0" value="" id="year-monthYear-endYear-newPositionIB-other-IB-reason-iweReconnect" size="4" maxlength="4" data-ime-mode-disabled="">
															</div>
														</div>
													</div>
												</div></div>
											</li>

											<li>
												<div class="d4" >
													<span class="error" id="IF-reason-iweReconnect-error"></span>
													<div class="f123">
													<input type="radio" name="reason" value="IF" id="IF-reason-iweReconnect" class="radio-btn"></div>
													<label id="l1" for="IF-reason-iweReconnect">Friend</label>
												</div></li>
												<li>
													<div class="d5">
														<span class="error" id="selector-iweOther-reason-iweReconnect-error"></span>
														<div class="f123">
														<input type="radio" name="reason" value="iweOther" id="selector-iweOther-reason-iweReconnect" class="radio-btn other"></div>
														<label id="l1" for="selector-iweOther-reason-iweReconnect">Other</label>
														<div id="other" class="form-wrapper" style="display: none;">
															<strong><?php echo $fname1; ?></strong>’s email address:<br>
															<span class="error" id="other-iweOther-reason-iweReconnect-error"></span>
															<input type="email" name="otherEmail" value="" id="other-iweOther-reason-iweReconnect" style="width:250px" data-ime-mode-disabled="">
														</div></div>
													</li>

													<li>
														<div class="d6"><span class="error" id="dontKnow-reason-iweReconnect-error"></span>
															<div class="f123">
															<span id="dontknow-wrapper"><input type="radio" name="reason" value="dontKnow" id="dontKnow-reason-iweReconnect" class="radio-btn"></span>
															</div>
															<label id="l1" for="dontKnow-reason-iweReconnect">I don’t know <?php echo $fname1; ?></label>
														</div></li>

													</ul>
													<strong class="dark"><label for="greeting-iweReconnect">Include a personal note:</label></strong> <span class="light">(optional)</span><br>
													<span class="error" id="greeting-iweReconnect-error"></span>

													<textarea name="greeting" id="greeting-iweReconnect" class="message" data-base-height="85">I'd like to add you to my professional network on LinkedIn.

														- <?php echo $fname; ?> <?php echo $lname; ?></textarea>

														<div style="display: none;" id="dataholder">
															<span id="firstName0"><?php echo $fname1; ?></span>
															<span id="templateBody0">I'd like to add you to my professional network on LinkedIn.

																- <?php echo $fname; ?> <?php echo $lname; ?></span>
															</div>

														</div>
													</div></div>
													<p class="shabana"><span class="error">Important:</span> Only invite people you know well and who know you. <a class="" href="/static?key=pop%2Fpop_more_iwe_invitations" onclick="LI.popup( '/static?key=pop%2Fpop_more_iwe_invitations', {} ); return false;" title="New window will open">Find out why.</a>
													</p><p class="shabana">
													<?php echo "	<a href="; echo base_url('index.php/login/login/addfriend');echo "?id1=";echo $_GET['id1']; echo "&id2="; echo $_GET['id2'];echo "&fname="; echo $fname1; echo ">";
// echo "	<a href="; echo base_url('index.php/login/login/addfriend');echo "?id1=";echo $_SESSION['hello']; echo "&id2="; echo $_SESSION['superusername'];echo "&fname="; echo $fname1; echo ">";
													echo "<button class='btn-primary' type='submit' id='btn-submit'><div>Send Invitation</div></button>";
													echo "</a>"; echo "or"; echo "	<a href="; echo base_url('index.php/login/login/profile');echo "?username=";echo $_GET['id2']; echo "&fname="; echo $fname;echo "&myid="; echo $_SESSION['result']; echo ">"; echo "Cancel</a>" ?>
													<!-- <input type="submit" name="iweReconnectSubmit" value="Send Invitation" class="btn-primary"> or <a href="/profile/view?id=191679546&amp;authType=name&amp;authToken=cOJg&amp;trk=nmp_pymk_name&amp;goback=">Cancel</a> -->
												</p>
											</div></div>


											<div class="footer">
												<div class="f1">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="hc">Help Center</a>
												</div>
												<div class="f2">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">About</a>
												</div>
												<div class="f3">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Press</a>
												</div>
												<div class="f4">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Blog</a>
												</div>
												<div class="f5">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Careers</a>
												</div>
												<div class="f6">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Advertising</a>
												</div>
												<div class="f7">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Talent Solutions</a>
												</div>
												<div class="f8">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Tools</a>
												</div>
												<div class="f9">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Mobile</a>
												</div>
												<div class="f10">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Developers</a>
												</div>
												<div class="f11">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Publishers</a>
												</div>
												<div class="f12">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Language</a>
												</div>
												<div class="f13">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">SlideShare</a>
												</div>
												<div class="f14">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">LinkedIn Updates</a>
												</div>
												<div class="f15">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">LinkedIn Influencers</a>
												</div>
												<div class="f16">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">LinkedIn Jobs</a>
												</div>
												<div class="f17">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Jobs Directory</a>
												</div>
												<div class="f18">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Company Directory</a>
												</div>
												<div class="f19">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Groups Directory</a>
												</div>
												<div class="f20">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Title Directory</a>
												</div>
												<div class="f21">
													<img src= "/Codeigniter-bootstrap--master/assets/img/foot.png">&#169; 2013
												</div>
												<div class="f22">
													<a href="<?php echo base_url('index.php/login/login/agreement');?>" class="fl1">User Agreement</a>
												</div>
												<div class="f23">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Privacy Policy</a>
												</div>
												<div class="f24">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Community Guidelines</a>
												</div>
												<div class="f25">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Cookie Policy</a>
												</div>
												<div class="f26">
													<a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Copyright Policy</a>
												</div>
											</div>
										</body>