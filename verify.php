<?php 
require 'header.php';
require 'apis/functions.php';
require 'apis/dbconfig.php';
// get the IP address of Client 
 

$ip = $_SERVER['REMOTE_ADDR'];
/***PERFORM VERIFICATION AND MESSAGING***/

if (isset($_POST['verify'])) {
  
  $user_sent_vcode = strtoupper(mysqli_real_escape_string($conn, $_POST['verify_code']));
  tnetConfirmCode($ip,$user_sent_vcode);
}

?>

<!-- card basic -->
<div class="container-fluid ">
 <div class="row tent-main-container ">
    <div class="col s12 m6 tent-main-container">
      <div class="card white darken-1 tnet-main-container">
        <div class="card-content white-black text-bold">
          <span class="card-title red-text"><i class="fa fa-exclamation-triangle red-text"></i> Danger</span>

          <br>
          <p>
          	Hi,we have noticed unusual access to this account !.<br> We need to confirm if you really own this account.
            <br>
            Please check your mobile number <b><a class="red-text">
              <?php
                echo "*******".substr(tnetVerifyAccount($ip),6,7);
              ?>
              
            </a></b>. <br>Enter the code to confirm .
      		</p>
          <br><br>
          <form action="" method="POST">
            <div class="input-field">
                <input id="icon_verify_code" type="text" class="validate" name="verify_code" required="">
                <label for="icon_verify_code">Enter Code</label>
              </div>
            <input type="submit" name="verify" value="Send to Verify" class=" btn btn-success pull-center">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>   
<!-- footer elements -->
<script src="plugins/tnet.js"></script>
<?php 
require 'footer.php';
?>

<style type="text/css">
  #icon_verify_code{
    text-transform: uppercase;
    font-weight: bold;
    font-size: 24px;
    text-align: center;
  }
</style>