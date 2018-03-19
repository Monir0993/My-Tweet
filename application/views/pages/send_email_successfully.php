<?php
    $message = $this->session->userdata('message');
    $this->session->unset_userdata('message');
?>

<body style="background-color: #E2E2E2;">

    <section>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <li><a href="<?php echo base_url(); ?>" class="btn navbar-brand" style="background-color: #b22222; color: white; font-weight: bold; font-family: monospace; border-radius: 5px 35px 0px 35px">My Tweet</a></li>
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
            <h3 style="font-family: monospace; font-weight: bolder"><?php echo $message; ?></h3>
        </div>
    </div>

</body>