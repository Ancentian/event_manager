<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login.</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="<?php echo base_url(); ?>res/main.css" rel="stylesheet">
</head>
<body>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Login

            </div>
            <div class="row">

                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: 20px;">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">LOGIN</h5>
                            <?php if ($this->session->flashdata('success-msg')) { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success-msg'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('error-msg')) { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
                            <?php } ?>
                            <form method="post" action="<?php echo base_url(); ?>auth/login_post">
                                <div class="position-relative row form-group"><label for="exampleEmail"
                                                                                     class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10"><input name="email"
                                                                  placeholder="user@example.com" type="text"
                                                                  class="form-control" required></div>
                                </div>
                                <div class="position-relative row form-group"><label for="examplePassword"
                                                                                     class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10"><input name="password" name="password"
                                                                  placeholder="Enter Password" type="password"
                                                                  class="form-control" required></div>
                                </div>

                                <div class="position-relative row form-check">
                                    <div class="col-sm-10 offset-sm-2">
                                        <input type="submit" class="btn btn-success" value="LOGIN">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>

</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>res/assets/scripts/main.js"></script>
</body>
</html>
