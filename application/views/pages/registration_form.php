<script type="text/javascript">
    xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }

    function makerequest(given_text, objid) {
//        alert(given_text);
        serverpage = "<?php echo base_url(); ?>Registration/ajax_email_check/" + given_text;
        xmlhttp.open('GET', serverpage);
        xmlhttp.onreadystatechange = function () {
//            alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var my_element = document.getElementById('res');
                if (xmlhttp.responseText == 'Email Address Already Exits.') {
                    
                    my_element.style.color = 'red';
                    document.getElementById('sbtn').disabled = true;
                }else if(xmlhttp.responseText == 'Email Address Required.'){
                    my_element.style.color = 'red';
                    document.getElementById('sbtn').disabled = true;
                }else{
                    document.getElementById('sbtn').disabled = false;
                    my_element.style.color = 'green';
                }
                document.getElementById('res').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>



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
                    <form role="form" action="<?php echo base_url(); ?>Registration/sign_up" method="post" onsubmit="return validateStandard(this);">
                        <hr />
                        <h5>Enter Details to Sign Up</h5>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" name="first_name" required regexp="JSVAL_RX_ALPHA" class="form-control" placeholder="First Name " />
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" name="last_name" required regexp="JSVAL_RX_ALPHA" class="form-control" placeholder="Last Name " />
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-mail-forward"  ></i></span>
                            <input type="text" name="user_email_address" required regexp="JSVAL_RX_EMAIL" class="form-control" placeholder="Your Email Address " onblur="makerequest(this.value, 'res');" />
                            <span id="res" style="font-weight: bolder"></span>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="user_password" required id="password" class="form-control"  placeholder="Your Password" />
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="confirm_password" id="confirm_password" equals="user_password" required err="Your Password and Re-enter Password does not match." class="form-control"  placeholder="Re-enter Password" />
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="radio" name="user_sex" required value="Female" /> Female
                                <input type="radio" name="user_sex" required value="Male" /> Male
                            </label>
                        </div>

                        <input type="submit" id="sbtn" class="btn btn-primary" value="Create Account">
                        <hr />

                    </form>
                </div>

            </div>


        </div>
    </div>

</body>