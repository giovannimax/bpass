<div class="form-group">
                      <label>Co-makers ID:</label>
                      <div class="row">
                        <?php
                          include 'connect.php';
                          $ID = $_SESSION['ID'];
                          $selectacccnt = mysqli_query($con, "SELECT * FROM accounts WHERE RegID != '$ID'")or die(mysqli_error());
                          $rescnt = mysqli_num_rows($selectacccnt);

                          $var1 = $rescnt / 2;
                          $var2 = ceil($var1);
                          $var3 = $var2 * 10;
                          $selectacc1 = mysqli_query($con, "SELECT * FROM accounts WHERE RegID != '$ID' LIMIT 0,".$var2."")or die(mysqli_errno());
                          $selectacc2 = mysqli_query($con, "SELECT * FROM accounts WHERE RegID != '$ID' LIMIT ".$var2.",".$var3."")or die(mysqli_error());

                          echo "<div class='col-md-6'>";
                          echo "<select class='form-control' name='Comakers1'>";
                          while($getacc1 = mysqli_fetch_array($selectacc1)){
                            echo "<option value='".$getacc1['RegID']."'>" . $getacc1['Fname'] . " " . $getacc1['Lname'] . "</option>";
                          }
                          echo "</select>";
                          echo "</div>";

                          echo "<div class='col-md-6'>";
                          echo "<select class='form-control' name='Comakers2'>";
                          while($getacc2 = mysqli_fetch_array($selectacc2)){
                            echo "<option value='".$getacc2['RegID']."'>" . $getacc2['Fname'] . " " . $getacc2['Lname'] . "</option>";
                          }
                          echo "</select>";
                          echo "</div>";
                        ?>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Amount Applied</label>
                            <div class="input-group">
                               <b style="margin-right: 10px;">&#8369; 0 </b> <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20000" data-slider-step="10" data-slider-value="0"/> <b style="margin-left: 20px;">&#8369; 20,000 </b>
                            </div>
                            <div style="margin-top: 5px;" class="input-group">
                              <span class="input-group-addon">₱</span>
                              <input style="text-align: right;" type="number" id="amount" class="form-control" name="amount" onkeyup="getslideval(this);" required>
                              <span class="input-group-addon">.00</span>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group">
                            <label>Mode of Payment</label>
                            <select class="form-control" name="modepayment" id="modepay" onchange="calculate(this);">
                              <option value="def">-- Select Mode of Payment --</option>
                              <option value="p2">Weekly</option>
                              <option value="p4">Monthly</option>
                            </select>
                             <div id="expaycont" style="display: none;">
                               <font style="margin-top: 5px;"> Amount</font>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="amntapp"></span></font><br>
                               <font id="intid" style="margin-top: 5px;">Interest (3%)</font>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="intapp"></span></font><br>
                              <font style="margin-top: 5px;">Total</font>
                              <input type="hidden" name="total" value="" id="txttot">
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="amnttot"></span></font><br>
                            <label style="margin-top: 5px;" >Expected Payment</label>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="expay"></span></font>
                            </div>
                          </div>
                        </div>
                      </div>


                   <hr>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Valid/Gov't ID</label><br>
                            <label>Upload File</label>
                            <input type="file" name="businesspermit" required>
                            <p class="help-block">Only png and jpg allowed</p>
                          </div>
                        </div>
                      </div>
                    </div>


<script>
  function calculate(ddmethod){
    var paymeth = $(ddmethod).val();
    if(paymeth!="def"){
    if(paymeth=="p2"){
      var amnt = parseInt($("#amount").val());
     
      var intapp = parseFloat(amnt*<?php
        $getint = mysqli_query($con, "SELECT * FROM interest WHERE intID = '1'")or die(mysqli_error());
        while($getintt = mysqli_fetch_array($getint)){
                $famnt = $getintt['percent']/100;
                 echo number_format((float)$famnt, 2, '.', '');
                }
      ?>);
      var amnttot = (amnt + intapp).toFixed(2);
      var payex = (amnttot/12).toFixed(2);
      $("#intid").text("Interest (<?php
        $getint = mysqli_query($con, "SELECT * FROM interest WHERE intID = '1'")or die(mysqli_error());
        while($getintt = mysqli_fetch_array($getint)){
                //$famnt = $getintt['percent']/100;
                 echo $getintt['percent'].'%';
                }
      ?>)");
      $("#amnttot").text(amnttot);
      $("#txttot").val(amnttot)
      $("#amntapp").text(amnt);
      $("#intapp").text(intapp);
      $("#expay").text(payex);
    } else {
      var amnt = parseInt($("#amount").val());
      var intapp = parseFloat(amnt*<?php
        $getint = mysqli_query($con, "SELECT * FROM interest WHERE intID = '2'")or die(mysqli_error());
        while($getintt = mysqli_fetch_array($getint)){
                $famnt = $getintt['percent']/100;
                 echo number_format((float)$famnt, 2, '.', '');
                }
      ?>);
      var amnttot = (amnt + intapp).toFixed(2);
      var payex = (amnttot/3).toFixed(2);
      $("#intid").text("Interest (<?php
        $getint = mysqli_query($con, "SELECT * FROM interest WHERE intID = '2'")or die(mysqli_error());
        while($getintt = mysqli_fetch_array($getint)){
                //$famnt = $getintt['percent']/100;
                 echo $getintt['percent'].'%';
                }
      ?>)");
      $("#amnttot").text(amnttot);
      $("#txttot").val(amnttot)
      $("#amntapp").text(amnt);
      $("#intapp").text(intapp);
      $("#expay").text(payex);
    } 

    $("#expaycont").css({"display":"block"});
  } else{
     $("#expaycont").css({"display":"none"});
  }

}
    
     var slider = new Slider('#ex1', {
  formatter: function(value) {
    $("#amount").val(value);
    return value;
  }
});

  $("#destroyEx5Slider").click(function() {

  // With JQuery
  $("#ex1").slider('destroy');

  // Without JQuery
  slider.destroy();

});

  function getslideval(amnt){
    var newprogress = $(amnt).val();
    if(newprogress>=100000){
      slider.setValue(0);
      $(amnt).addClass('invalid');
    } else{
      $(amnt).removeClass('invalid');
      slider.setValue(newprogress);
    }
    var paymod = document.getElementById("modepay");
    calculate(paymod);
  }