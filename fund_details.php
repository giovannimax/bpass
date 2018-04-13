<?php require 'update_funds.php'; ?>
<form method="post" action="<?//php $_SERVER['PHP_SELF']?>">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Loan Information</h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Share Capital</label>
            <div class="input-group">
              <span class="input-group-addon">₱</span>
              <input type="number" class="form-control" value="<?php// echo $Capital; ?>" name="sharecpt">
              <span class="input-group-addon">.00</span>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Savings</label>
            <div class="input-group">
              <span class="input-group-addon">₱</span>
              <input type="number" class="form-control" value="<?php// echo $Savings ?>" name="savings">
              <span class="input-group-addon">.00</span>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Damayan</label>
            <div class="input-group">
              <span class="input-group-addon">₱</span>
              <input type="number" class="form-control" value="<?php// echo $Damayan; ?>" name="damayan">
              <span class="input-group-addon">.00</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Marketing Share</label>
            <div class="input-group">
              <span class="input-group-addon">₱</span>
              <input type="number" class="form-control" value="<?php// echo $Marketing; ?>" name="mktshare">
              <span class="input-group-addon">.00</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Health Care</label>
            <div class="input-group">
              <span class="input-group-addon">₱</span>
              <input type="number" class="form-control" value="<?php// echo $HealthCare; ?>" name="health">
              <span class="input-group-addon">.00</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <input type="submit" class="btn btn-info" name="UpdateFundsbtn" value="Update">
        </div>
      </div>

    </div>
  </div>
</form> 
