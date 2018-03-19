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

                    <form role="form" action="<?php echo base_url(); ?>Registration/user_email_check" method="post" onsubmit="return validateStandard(this)">
                        <hr />
                        <h5>Enter Details for Password Recovery</h5>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" name="user_email_address" required regexp="JSVAL_RX_EMAIL" class="form-control" placeholder="Your Email Address " />
                        </div>
                        
                        <h5 style="font-weight: bolder; color: red">
                            <?php
                            $exception = $this->session->userdata('exception');
                            if ($exception) {
                                echo $exception;
                                $this->session->unset_userdata('exception');
                            }
                            ?>
                        </h5>
                        <input type="submit" id="sbtn" class="btn btn-primary" value="Submit">
                        <hr />
                        Have no Account ? <a href="<?php echo base_url(); ?>Welcome/registration_form" >click here </a> to <a href="<?php echo base_url(); ?>Welcome/registration_form">Sign Up</a>  
                    </form>
                </div>

            </div>


        </div>
    </div>

</body>