<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "include/head.php";?>
</head>

<body>
<?php include "include/header.php";?>

<section id="dashboardbody">
<div class="container">
	<div class="row"  style="margin-top:-5px;">
           <div class="col-md-10 column" style="padding-top:20px;">
           		<div class="wellash">
                	<p style="color:#00CC00;">Data Entry Form</p>
                    <div class="col-md-4">
                    		<form class="form-horizontal" action="#">
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="login">Login Id</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" id="login"  name="login" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="givenname">Given Name</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="givenname" name="givenname" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="surname">Surname</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control  input-sm" id="surname" name="surname" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="gender">Gender</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="gender" name="gender" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="address">St Address</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="address" name="address" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="city">City</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="city" name="city" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="state">State</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="state" name="state" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="country">Country</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="country" name="country" style="border-radius:0px;">
                              </div>
                            </div>
                            
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="zip">Zipcode</label>
                              <div class="col-sm-8">          
                                <input type="number" class="form-control input-sm" id="zip" name="zip" style="border-radius:0px;">
                              </div>
                            </div>                    
			</div>
                    
                    <div class="col-md-4">
                    	<div class="form-horizontal">
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="age">Age</label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control input-sm" id="age"  name="age" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="dob">Birth Day</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="dob" name="dob" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="phn">Phone No</label>
                              <div class="col-sm-8">          
                                <input type="number" class="form-control  input-sm" id="phn" name="phn" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="email">Email ID</label>
                              <div class="col-sm-8">          
                                <input type="email" class="form-control input-sm" id="email" name="email" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="username">Username</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="username" name="username" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="pwd">Password</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="password" name="password" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="useragent">Agent</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="useragent" name="useragent" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="domain">Domain</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="domain" name="domain" style="border-radius:0px;">
                              </div>
                            </div>
                            
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="natid">Nat ID</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="natid" name="natid" style="border-radius:0px;">
                              </div>
                            </div>                    
				</div>
            </div>
                    
                    <div class="col-md-4">
                    	<div class="form-horizontal">	
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="cctype">CC Type</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" id="cctype"  name="cctype" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="ccnumber">CC No</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="ccnumber" name="ccnumber" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="cvv2">CVV2</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control  input-sm" id="cvv2" name="cvv2" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="ccexpire">CC Expire</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="ccexpire" name="ccexpire" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="occupation">Occupation</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="occupation" name="occupation" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="company">Company</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="company" name="company" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="wumtcn">WU MTCN</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="wumtcn" name="wumtcn" style="border-radius:0px;">
                              </div>
                            </div>
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="mgmtcn">MG MTCN</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="mgmtcn" name="mgmtcn" style="border-radius:0px;">
                              </div>
                            </div>
                            
                            <div class="form-group" style="margin-bottom:8px;">
                              <label class="control-label col-sm-4 small" for="ups">UPS</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control input-sm" id="ups" name="ups" style="border-radius:0px;">
                              </div>
                            </div>                    
				</div>
            </div>
           		</div>
          </div>
       
        
        <div class="col-md-2" style="padding-top:20px;">
          <div class="wellash" style="color:#000; text-align:center;">
          	<p style="color:#00CC00;">Action</p>
          	<p><button class="btn" style="border-radius:0px;">Save Form</button></p>
            <p><button class="btn" style="border-radius:0px;">Reset Entry</button></p>
            </form>
          </div>          
        </div>
	</div>
</div>
</section> <!-------------------Dashboardbody ----------------------------------------------------------------->


<section id="dashboardbody">
<div class="container">
	<div class="row" style="margin-top:-25px;">
    	<div class="col-md-10">
            <div class="well">
            dfasssff ff sf
            </div>
		</div>
        
        <div class="col-md-2">
		</div>
	</div>
</div>
</section> <!-------------------Dashboardbody ----------------------------------------------------------------->

<?php include "include/footer.php";?>

</body>
</html>





