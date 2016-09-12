<div class="tab-content padding-none">

<div class="tab-pane active widget-body-regular" id="overview">

    <div class="row">
        <div class="col-md-3 center">

            <!-- Profile Photo -->
            <span style="height: 350px; width: 350px;"><?php echo $this->Html->image('pictures/'.$profile['PersonalProfile']['picture'], array('height'=>'350px', 'width'=>'350px'));?></span>
            <div class="separator bottom"></div>
        </div>
        <div class="col-md-9">
            <!-- About -->
            <h4><?php echo $profile['PersonalProfile']['first_name']; ?> <?php echo $profile['PersonalProfile']['last_name']; ?> <?php echo $profile['PersonalProfile']['other_name']; ?></h4>
            <div class="menubar links primary">
                <ul>
                    <li>Branch:</li>
                    <li><a href=""><?php echo $b_name[$profile['PersonalProfile']['branch_id']]; ?></a></li>
                    <li>Phone:</li>
                    <li><a href=""><?php echo $profile['PersonalProfile']['phone']; ?></a></li>
                    <li>Membership Number:</li>
                    <li><a href=""><?php echo $profile['PersonalProfile']['reg_no']; ?></a></li>
                    <li>Membership Status:</li>
                    <li><a href=""><?php echo $s_name[$profile['PersonalProfile']['membership_status_id']]; ?></a></li>
                    <li>Sex:</li>
                    <li><a href=""><?php echo $profile['PersonalProfile']['sex']; ?></a></li>
                </ul>
            </div>
            <p><?php echo $profile['PersonalProfile']['address']; ?>, <?php echo $lg_name[$profile['PersonalProfile']['lga_id']]; ?>, <?php echo $st_name[$profile['PersonalProfile']['state_id']]; ?>, <?php echo $ct_name[$profile['PersonalProfile']['country_id']]; ?>.</p>
            <!-- // About END -->


            <div class="row">
                <div class="col-md-6">
                    <div class="widget widget-4">

                        <!-- Widget Heading -->
                        <div class="widget-head">
                            <h4 class="heading">Personal Information</h4>
                        </div>
                        <!-- // Widget Heading END -->

                        <div class="widget-body list">
                            <ul>

                                <!-- List item -->
                                <li>
                                    <span>Date of Birth</span>
                                    <span class="count"><?php echo $profile['PersonalProfile']['dob']; ?></span>
                                </li>
                                <!-- // List item END -->

                                <!-- List item -->
                                <li>
                                    <span>Marital Status</span>
                                    <span class="count"><?php echo $profile['PersonalProfile']['mar_status']; ?></span>
                                </li>
                                <!-- // List item END -->
                                <!-- List item -->
                                <li>
                                    <span>State of Origin</span>
                                    <span class="count"><?php echo $profile['PersonalProfile']['state_of_origin']; ?></span>
                                </li>
                                <!-- // List item END -->

                            </ul>
                        </div>
                    </div>

                    <div class="widget widget-4">

                        <!-- Widget Heading -->
                        <div class="widget-head">
                            <h4 class="heading">Professional Information</h4>
                        </div>
                        <!-- // Widget Heading END -->

                        <div class="widget-body list">
                            <ul>
                                <!-- List item -->
                                <li>
                                    <span>Occupation</span>
                                    <span class="count"><?php echo $p_name[$profile['PersonalProfile']['prof_id']]; ?></span>
                                </li>
                                <!-- // List item END -->

                                <!-- List item -->
                                <li>
                                    <span>Highest Educational Qualification</span>
                                    <span class="count"><?php echo $q_name[$profile['PersonalProfile']['qual_id']]; ?></span>
                                </li>
                                <!-- // List item END -->
                                <!-- List item -->
                                <li>
                                    <span>Employer</span>
                                    <span class="count"><?php echo $profile['PersonalProfile']['employer']; ?></span>
                                </li>
                                <!-- // List item END -->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Tab content -->
<div class="tab-pane widget-body-regular" id="edit-account">

<div class="widget widget-tabs widget-tabs-vertical row row-merge margin-none">

    <!-- Widget heading -->
    <div class="widget-head col-md-3">
        <ul>
            <li class="active"><a class="glyphicons pencil" href="#account-details" data-toggle="tab"><i></i>Account details</a></li>
            <li><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Account settings</a></li>
            <li><a class="glyphicons eye_open" href="#privacy-settings" data-toggle="tab"><i></i>Privacy settings</a></li>
        </ul>
    </div>
    <!-- // Widget heading END -->

    <div class="widget-body col-md-9">

        <div class="tab-content">
            <div class="tab-pane active" id="account-details">

                <!-- Row -->
                <div class="row">

                    <!-- Column -->
                    <div class="col-md-6">

                        <label>First name</label>
                        <input type="text" value="John" class="col-md-10 form-control" />
                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
                        <div class="separator bottom"></div>

                        <label>Last name</label>
                        <input type="text" value="Doe" class="col-md-10 form-control" />
                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Last name is mandatory"><i></i></span>
                        <div class="separator bottom"></div>

                        <label>Date of birth</label>
                        <div class="input-group">
                            <input type="text" id="datepicker" class="col-md-12 form-control" value="13/06/1988" />
                            <span class="input-group-addon"><span class="glyphicons calendar"></span></span>
                        </div>

                    </div>
                    <!-- // Column END -->

                    <!-- Column -->
                    <div class="col-md-6">

                        <label>Gender</label>
                        <select class="col-md-12 form-control">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <div class="separator bottom"></div>

                        <label>Age</label>
                        <input type="text" value="25" class="input-mini form-control" />

                    </div>
                    <!-- // Column END -->

                </div>
                <!-- // Row END -->

                <div class="separator"></div>


                <label>About me</label>
                <textarea id="mustHaveId" class="wysihtml5 col-md-12" rows="5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</textarea>
                <div class="separator bottom"></div>


                <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok">Save changes</button>
                <button type="button" class="btn btn-icon btn-default glyphicons circle_remove">Cancel</button>

            </div>
            <div class="tab-pane" id="account-settings">

                <!-- Row -->
                <div class="row">

                    <!-- Column -->
                    <div class="col-md-3">
                        <strong>Change password</strong>
                        <p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <!-- // Column END -->

                    <!-- Column -->
                    <div class="col-md-9">
                        <label for="inputUsername">Username</label>
                        <input type="text" id="inputUsername" class="col-md-10 form-control" value="john.doe2012" disabled="disabled" />
                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Username can't be changed"></span>
                        <div class="separator"></div>

                        <label for="inputPasswordOld">Old password</label>
                        <input type="password" id="inputPasswordOld" class="col-md-10 form-control" value="" placeholder="Leave empty for no change" />
                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Leave empty if you don't wish to change the password"></span>
                        <div class="separator"></div>

                        <label for="inputPasswordNew">New password</label>
                        <input type="password" id="inputPasswordNew" class="col-md-12 form-control" value="" placeholder="Leave empty for no change" />
                        <div class="separator"></div>

                        <label for="inputPasswordNew2">Repeat new password</label>
                        <input type="password" id="inputPasswordNew2" class="col-md-12 form-control" value="" placeholder="Leave empty for no change" />
                        <div class="separator"></div>
                    </div>
                    <!-- // Column END -->

                </div>
                <!-- // Row END -->

                <div class="separator line bottom"></div>

                <!-- Row -->
                <div class="row">

                    <!-- Column -->
                    <div class="col-md-3">
                        <strong>Contact details</strong>
                        <p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <!-- // Column END -->

                    <!-- Column -->
                    <div class="col-md-9">

                        <label for="inputPhone">Phone</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicons phone"></span></span>
                            <input type="text" id="inputPhone" class="form-control" placeholder="01234567897" />
                        </div>
                        <div class="separator"></div>

                        <label for="inputEmail">E-mail</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicons envelope"></span></span>
                            <input type="text" id="inputEmail" class="form-control" placeholder="contact@mosaicpro.biz" />
                        </div>
                        <div class="separator"></div>

                        <label for="inputWebsite">Website</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicons link"></span></span>
                            <input type="text" id="inputWebsite" class="form-control" placeholder="http://www.mosaicpro.biz" />
                        </div>
                        <div class="separator"></div>

                        <label for="inputFacebook">Facebook</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="social facebook"></span></span>
                            <input type="text" id="inputFacebook" class="form-control" placeholder="/mosaicpro" />
                        </div>
                        <div class="separator"></div>

                        <label for="inputTwitter">Twitter</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="social twitter"></span></span>
                            <input type="text" id="inputTwitter" class="form-control" placeholder="/mosaicpro" />
                        </div>
                        <div class="separator"></div>

                        <label for="inputSkype">Skype ID</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="social skype"></span></span>
                            <input type="text" id="inputSkype" class="form-control" placeholder="mySkypeID" />
                        </div>
                        <div class="separator"></div>

                        <label for="inputYahoo">Yahoo ID</label>
                        <div class="input-group">
												<span class="input-group-addon"><span class="social yahoo"><i></i></span>
												<input type="text" id="inputYahoo" class="form-control" placeholder="myYahooID" />
                        </div>
                        <div class="separator"></div>

                    </div>
                    <!-- // Column END -->

                </div>
                <!-- // Row END -->

                <div class="right">
                    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
                </div>
            </div>
            <div class="tab-pane" id="privacy-settings">
                <div class="uniformjs">
                    <label class="checkbox"><input type="checkbox" checked="checked" /> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</label>
                    <label class="checkbox"><input type="checkbox" /> Vivamus et risus vel metus feugiat semper at sed odio.</label>
                    <label class="checkbox"><input type="checkbox" /> Aenean bibendum faucibus tellus, et facilisis justo imperdiet vel.</label>
                    <div class="alert alert-warning">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <p>Integer quis tempor mi. Donec venenatis dui in neque fringilla at iaculis libero ullamcorper. In velit sem, sodales id hendrerit ac, fringilla et est. Pellentesque at justo urna, eu pharetra tortor. Aenean aliquam, tellus vel suscipit luctus, risus enim ornare tellus, ac ultrices nisi enim sed magna.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
<!-- // Tab content END -->

<!-- Tab content -->
<div class="tab-pane widget-body-regular" id="projects">

    <div class="well">
        <button type="button" class="btn btn-primary btn-icon glyphicons circle_plus pull-right"><i></i>Add project</button>
        <p class="lead margin-none">1024 sales this week</p>
        <div class="clearfix"></div>
    </div>

    <table class="table table-striped table-bordered table-vertical-center table-projects">
        <thead>
        <tr>
            <th colspan="2">Project</th>
            <th width="100" class="center"></th>
            <th width="100" class="center"></th>
            <th width="100" class="center"></th>
            <th width="80" class="center"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td width="80" class="center"><span class="thumb"><img src="http://2.s3.envato.com/files/50444644/80-avatar.jpg" alt="" /></span></td>
            <td class="important">Smashing - Premium Admin Template</td>
            <td class="center stats"><span>Sales today</span><span class="count">153</span></td>
            <td class="center stats"><span>Sales total</span><span class="count">1,365</span></td>
            <td class="center stats"><span>Earnings</span><span class="count">&dollar;25,356.00</span></td>
            <td class="center"><button type="button" class="btn btn-default">Manage</button></td>
        </tr>
        <tr>
            <td width="80" class="center"><span class="thumb"><img src="http://0.s3.envato.com/files/52347478/admin-avatar-12.jpg" alt="" /></span></td>
            <td class="important">AdminPlus - Premium Bootstrap Admin Template</td>
            <td class="center stats"><span>Sales today</span><span class="count">153</span></td>
            <td class="center stats"><span>Sales total</span><span class="count">1,365</span></td>
            <td class="center stats"><span>Earnings</span><span class="count">&dollar;25,356.00</span></td>
            <td class="center"><button type="button" class="btn btn-default">Manage</button></td>
        </tr>
        <tr>
            <td width="80" class="center"><span class="thumb"><img src="http://2.s3.envato.com/files/50868169/avatar80.jpg" alt="" /></span></td>
            <td class="important">AIR - Responsive Bootstrap Admin Template</td>
            <td class="center stats"><span>Sales today</span><span class="count">153</span></td>
            <td class="center stats"><span>Sales total</span><span class="count">1,365</span></td>
            <td class="center stats"><span>Earnings</span><span class="count">&dollar;25,356.00</span></td>
            <td class="center"><button type="button" class="btn btn-default">Manage</button></td>
        </tr>
        <tr>
            <td width="80" class="center"><span class="thumb"><img src="http://3.s3.envato.com/files/47008628/boot-admin-80_v13.jpg" alt="" /></span></td>
            <td class="important">BootAdmin - All-In-One Admin Responsive Template</td>
            <td class="center stats"><span>Sales today</span><span class="count">153</span></td>
            <td class="center stats"><span>Sales total</span><span class="count">1,365</span></td>
            <td class="center stats"><span>Earnings</span><span class="count">&dollar;25,356.00</span></td>
            <td class="center"><button type="button" class="btn btn-default">Manage</button></td>
        </tr>
        </tbody>
    </table>

</div>
<!-- // Tab content END -->
</div>
