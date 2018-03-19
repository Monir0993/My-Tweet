
<body style="background-color: #E2E2E2;">

    <section>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <li><a href="#" class="btn navbar-brand" style="background-color: #b22222; color: white; font-weight: bold; font-family: monospace; border-radius: 5px 35px 0px 35px">My Tweet</a></li>
                    </div>

                </div>

                <div class="clr"></div>
            </div>
        </nav>
    </section>


    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="" />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div class="panel-body">
                    <form role="form" action="<?php echo base_url(); ?>Email/update_password" method="post" onsubmit="return validateStandard(this);">
                        <hr />
                        <h5>Enter New Password</h5>
                        <br />
                        
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="user_password" required id="password" class="form-control"  placeholder="Your Password" />
                            <input type="hidden" name="user_email_address" value="<?php echo $email_address; ?>" />
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="confirm_password" id="confirm_password" equals="user_password" required err="Your Password and Re-enter Password does not match." class="form-control"  placeholder="Re-enter Password" />
                        </div>
                        
                        <input type="submit" id="sbtn" class="btn btn-primary" value="Update Password">
                        <hr />

                    </form>
                </div>

            </div>


        </div>
    </div>

</body>