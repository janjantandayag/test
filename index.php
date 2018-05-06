<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test Files</title>
  <?php include('includes/header_assets.php'); ?>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6" >
       <form action="/action_page.php" >
        <h3>Please enter address ...</h3>
        <div class="form-group">
          <input type="text" placeholder="Please enter address ..." class="form-control" id="address">
          <button class="btn btn-sm btn-success" style="margin-top:20px;" id="fetchButton">Fetch</button>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <div id="response">
        <h1>Response</h1>
        <hr>
        <div id="response-container"></div>      
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#fetchButton').on('click',function(){
      $('form').submit(false);

      $address = $('#address').val();
      
      if($address === ''){
        return;
      } else {
        $.ajax({
          type: "GET",
          // url: "https://data-api.smartzip-services.com/property/avm.json",
          url: "https://data-api.smartzip-services.com/addresses/suggest.json",
          data: {
            api_key : 'edba$7dDdf6ffe88ff9!120oCd',
            address: $address,
            // street_address : '288 San Carlos Way',
            // city: 'Novato',
            // state: 'CA'
          },
          success: function(msg){            
            $('#response-container').text(msg);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            var err = JSON.parse(jqXHR.responseText);
            for(property in err){
              $('#response-container').text(err[property]);
            }
          }
        });
      }
    });
  })
</script>
<?php include('includes/footer.php'); ?>
