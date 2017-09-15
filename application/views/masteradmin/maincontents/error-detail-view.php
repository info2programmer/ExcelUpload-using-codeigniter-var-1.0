
<table width="1199" class="table table-bordered" border="1px solid black">
  <thead>
    <tr>
      <th width="54">Nature</th>
      <th width="54">Login ID</th>
      <th width="303">Given Name</th>
      <th width="303">Surname</th>
      <th width="303">Gender</th>
      <th width="181">Street Address</th>
      <th width="303">City</th>
      <th width="303">State</th>
      <th width="303">Country</th>
      <th width="303">Zip Code</th>      
      <th width="54">Age</th>
      <th width="303">Birthday</th>
      <th width="303">Telephone Number</th>
      <th width="303">Email Address</th>
      <th width="181">Username</th>
      <th width="303">Password</th>
      <th width="303">Browser User Agent</th>
      <th width="303">Domain</th>
      <th width="303">National ID</th>      
      <th width="54">CC Type</th>
      <th width="303">CC Number</th>
      <th width="303">CVV2</th>
      <th width="303">CC Expires</th>
      <th width="181">Occupation</th>
      <th width="303">Company</th>
      <th width="303">Western Union MTCN</th>
      <th width="303">Money Gram MTCN</th>
      <th width="303">UPS</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($row2) {
  ?>
    <tr>
      <td style="color:#006666;">Assignment</td>	
      <td><?php echo $row2->login_id; ?></td>
      <td><?php echo $row2->given_name;?></td>
      <td><?php echo $row2->surname;?></td>
      <td><?php echo $row2->gender;?></td>
      <td><?php echo $row2->street_address;?></td>
      <td><?php echo $row2->city;?></td>
      <td><?php echo $row2->state;?></td>
      <td><?php echo $row2->country;?></td>
      <td><?php echo $row2->zip_code;?></td>      
      <td><?php echo $row2->age; ?></td>
      <td><?php echo $row2->birthday;?></td>
      <td><?php echo $row2->telephone_number;?></td>
      <td><?php echo $row2->email;?></td>
      <td><?php echo $row2->username;?></td>
      <td><?php echo $row2->password;?></td>
      <td><?php echo $row2->user_agent;?></td>
      <td><?php echo $row2->domain;?></td>
      <td><?php echo $row2->national_id;?></td>      
      <td><?php echo $row2->cc_type; ?></td>
      <td><?php echo $row2->ccv2;?></td>
      <td><?php echo $row2->ccexpires;?></td>
      <td><?php echo $row2->cc_number;?></td>
      <td><?php echo $row2->occupation;?></td>
      <td><?php echo $row2->company;?></td>
      <td><?php echo $row2->western_union_mtcn;?></td>
      <td><?php echo $row2->money_gram_mtcn;?></td>
      <td><?php echo $row2->ups;?></td>      
    </tr>
  <?php } ?> 
  	<?php
  if($row1) {
  ?>
    <tr>
      <td style="color:#006666;">Agent Fill up</td>
      <td><?php echo $row1->login_id; ?></td>
      <td><?php echo $row1->given_name;?></td>
      <td><?php echo $row1->surname;?></td>
      <td><?php echo $row1->gender;?></td>
      <td><?php echo $row1->street_address;?></td>
      <td><?php echo $row1->city;?></td>
      <td><?php echo $row1->state;?></td>
      <td><?php echo $row1->country;?></td>
      <td><?php echo $row1->zip_code;?></td>      
      <td><?php echo $row1->age; ?></td>
      <td><?php echo $row1->birthday;?></td>
      <td><?php echo $row1->telephone_number;?></td>
      <td><?php echo $row1->email;?></td>
      <td><?php echo $row1->username;?></td>
      <td><?php echo $row1->password;?></td>
      <td><?php echo $row1->user_agent;?></td>
      <td><?php echo $row1->domain;?></td>
      <td><?php echo $row1->national_id;?></td>      
      <td><?php echo $row1->cc_type; ?></td>
      <td><?php echo $row1->ccv2;?></td>
      <td><?php echo $row1->ccexpires;?></td>
      <td><?php echo $row1->cc_number;?></td>
      <td><?php echo $row1->occupation;?></td>
      <td><?php echo $row1->company;?></td>
      <td><?php echo $row1->western_union_mtcn;?></td>
      <td><?php echo $row1->money_gram_mtcn;?></td>
      <td><?php echo $row1->ups;?></td>      
    </tr>
  <?php } ?>  
  	<tr>
      <td style="color:#006666; ">Status</td>
      <td><?php echo ($row1->login_id==$row2->login_id)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->given_name==$row2->given_name)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->surname==$row2->surname)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->gender==$row2->gender)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->street_address==$row2->street_address)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->city==$row2->city)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->state==$row2->state)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->country==$row2->country)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->zip_code==$row2->zip_code)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>      
      <td><?php echo ($row1->age==$row2->age)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->birthday==$row2->birthday)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->telephone_number==$row2->telephone_number)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->email==$row2->email)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->username==$row2->username)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->password==$row2->password)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->user_agent==$row2->user_agent)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->domain==$row2->domain)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->national_id==$row2->national_id)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>      
      <td><?php echo ($row1->cc_type==$row2->cc_type)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->ccv2==$row2->ccv2)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->ccexpires==$row2->ccexpires)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->cc_number==$row2->cc_number)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->occupation==$row2->occupation)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->company==$row2->company)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->western_union_mtcn==$row2->western_union_mtcn)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->money_gram_mtcn==$row2->money_gram_mtcn)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>
      <td><?php echo ($row1->ups==$row2->ups)?'<span style="background:#00CC00;">Right</span>':'<span style="background:red;">Wrong</span>'; ?></td>      
    </tr> 
  </tbody>
</table>

