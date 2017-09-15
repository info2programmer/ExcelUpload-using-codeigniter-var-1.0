<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>DATADIGITIZATION - ADMIN PANEL</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Merriweather|Oswald" rel="stylesheet">


    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/npm.js"></script>


    <!---For Navbar -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        ::selection {
            background: transparent;
        }
        body {
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
        }
    </style>
<noscript> This page needs JavaScript activated to work. <style>div { display:none; }</style>
 </noscript>

    <!---For Navbar -->
</head>

<body oncopy="return false" oncut="return false" onpaste="return false" oncontextmenu="return false;">
<div>
<section id="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                Credit Card SF Data Entry
            </div>

            <div class="col-md-3">
                <i class="fa fa-user"></i> Welcome <?php echo $this->session->userdata('username'); ?> |
                <a href="<?php echo base_url(); ?>user/logout" style="color:#FFFFFF;"><i class="fa fa-sign-out"></i> Log
                    Out</a>
            </div>
        </div>
    </div>
</section> <!---Topbar -->


<section id="dashboardbody">

    <div class="container">
    <br/>
    <?php if($this->session->flashdata('success_log')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Success!</strong> <?php echo $this->session->flashdata('success_log'); ?>.
    </div>
    <?php endif; ?>
        <div class="row" style="margin-top:-5px;">
            <div class="col-md-10 column" style="padding-top:20px;">
                <div class="wellash">
                    <p style="color:#00CC00;">Data Entry Form</p>
                    <div class="col-md-4">
                    <?php $attribut=array(
                        'class' => 'form-horizontal',
                        'autocomplete' => 'off'
                    ); ?>
                    <?php echo form_open('user/savedata',$attribut); ?>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtLoginId">Login Id</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="txtLoginId" required name="txtLoginId"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtgivenname">Given Name</label>
                                <div class="col-sm-8">
                                    <input type="text" required  class="form-control input-sm" id="txtgivenname" name="txtgivenname"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtsurname">Surname</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control  input-sm" id="txtsurname" name="txtsurname"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtgender">Gender</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="txtgender" name="txtgender" required 
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtaddress">St Address</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtaddress" name="txtaddress"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtcity">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="txtcity" name="txtcity" required 
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtstate">State</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="txtstate" name="txtstate" required 
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtcountry">Country</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="txtcountry" name="txtcountry" required 
                                           style="border-radius:0px;">
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtzip">Zipcode</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control input-sm" id="txtzip" required name="txtzip"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtage">Age</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control input-sm" id="txtage" required  name="txtage"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtdob">Birth Day</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtdob" name="txtdob"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtphn">Phone No</label>
                                <div class="col-sm-8">
                                    <input type="number" required class="form-control  input-sm" id="txtphn" name="txtphn"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtemail">Email ID</label>
                                <div class="col-sm-8">
                                    <input type="email" required class="form-control input-sm" id="txtemail" name="txtemail"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtusername">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="txtusername" name="txtusername"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtpassword">Password</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtpassword" name="txtpassword"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtuseragent">Agent</label>
                                <div class="col-sm-8">
                                    <input type="text" required  class="form-control input-sm" id="txtuseragent" name="txtuseragent"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtdomain">Domain</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtdomain" name="txtdomain"
                                           style="border-radius:0px;">
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtnatid">Nat ID</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="txtnatid" name="txtnatid"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtcctype">CC Type</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtcctype" name="txtcctype"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtccnumber">CC No</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtccnumber" name="txtccnumber"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtcvv2">CVV2</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control  input-sm" id="txtcvv2" name="txtcvv2"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtccexpire">CC Expire</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtccexpire" name="txtccexpire"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtoccupation">Occupation</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtoccupation" name="txtoccupation"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtcompany">Company</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtcompany" name="txtcompany"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtwumtcn">WU MTCN</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtwumtcn" name="txtwumtcn"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtmgmtcn">MG MTCN</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control input-sm" id="txtmgmtcn" name="txtmgmtcn"
                                           style="border-radius:0px;">
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:8px;">
                                <label class="control-label col-sm-4 small" for="txtups">UPS</label>
                                <div class="col-sm-8">
                                    <input type="text" required  class="form-control input-sm" id="txtups" name="txtups"
                                           style="border-radius:0px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           

            <div class="col-md-2" style="padding-top:20px;">
                <div class="wellash" style="color:#000; text-align:center;">
                 <p style="color:#ffffff;">Fill-up On <?php echo date('d-m-Y'); ?>: <?php echo $todayfillup; ?></p>
                 <p style="color:#ffffff;">Overall Fillup : <?php echo $overallfillup; ?></p>
                 <p style="color:#ffffff;">Group Point 
                 <?php foreach ($datacontent as $data): ?>
                     <?php $datas=$this->Common_model->getpointsbyassignid($data->assigment_id,$data->gropu_id); ?>
                     <?php foreach($datas as  $data): ?>
                        <?php echo $data->point ?>
                    <?php endforeach; ?>
                 <?php endforeach ?>
                 </p>
                    <p>
                    
                        <button type="submit" class="btn" style="border-radius:0px;">Save Form</button>
                   
                    </p>
                    <p>
                        <button type="reset" class="btn" style="border-radius:0px;">Reset Entry</button>
                    </p>

                </div>
            </div>
        </div>
    </div>
</section> <!---Dashboardbody -->


<section id="dashboardbody">
    <div class="container">
        <div class="row" style="margin-top:-25px;">
            <div class="col-md-10">
                <div class="well" id="allBlocked">
                    <?php foreach($datacontent as $data): ?>
                        <span> <?php echo  $data->login_id ?></span> &nbsp; &nbsp;
                        <span><?php echo  $data->given_name ?></span> &nbsp; &nbsp;
                         <span><?php echo  $data->surname ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->gender ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->street_address ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->city ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->state ?></span> &nbsp; &nbsp;
                        <span><?php echo  $data->country ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->zip_code ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->age ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->birthday ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->telephone_number ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->email ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->username ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->password ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->user_agent ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->domain ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->national_id ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->cc_type ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->ccv2 ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->ccexpires ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->cc_number ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->occupation ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->company ?></span> &nbsp; &nbsp;
                        <span> <?php echo  $data->western_union_mtcn ?></span> &nbsp; &nbsp;
                         <span> <?php echo  $data->money_gram_mtcn ?></span> &nbsp; &nbsp;
                        <span><?php echo  $data->ups ?></span> &nbsp; &nbsp;
                        <?php $recordid=$data->data_id  ?>
                        <?php $assigment_id=$data->assigment_id ?>
                        <?php $gropu_id=$data->gropu_id ?>
                    <?php endforeach; ?>

                </div>
            </div>

            <?php if (!empty($recordid)): ?>
                <?php echo form_hidden('txtDataId', $recordid); ?>
            <?php endif ?>
            <?php if (!empty($assigment_id)): ?>
                <?php echo form_hidden('txtAssigmentId', $assigment_id); ?>
            <?php endif ?>
            <?php if (!empty($gropu_id)): ?>
                <?php echo form_hidden('txtGroupId', $gropu_id); ?>
            <?php endif ?>
            
            <div class="col-md-2">
            </div>
        </div>
    </div>
</section> <!---Dashboardbody -->
<?php echo form_close(); ?>
<section id="footbar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                Copyright Protected by datadigitization, <?php echo date('Y'); ?>-<?php echo(date('Y') + 1); ?>
            </div>

        </div>
    </div>
</section> <!---Footer -->
</div>
</body>
</html>