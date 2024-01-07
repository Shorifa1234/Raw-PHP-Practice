<?php
include('connect.php');
$output = array();

if (isset($_POST['city_name'])) {
    $city_name = $_POST['city_name'];
    $stmt = $con->prepare('SELECT * FROM pincodes WHERE city_id = :city_name');
    $stmt->bindParam(':city_name', $city_name);
    $stmt->execute();
    $pin_details = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$pin_details) {
        $output['pincode_error'] = '<font color="#ff0000" style="font-size: 20px;">Data not available</font>';
    } else {
        $output['pincode'] = $pin_details['pin_code'];
    }

    echo json_encode($output);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get value from Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    .container{
        width:50%;
        height:30%;
        padding:20px;
    }
</style>
</head>
<body>
    <div class="container">
        <h1 align="center" style="color:red;">FETCH VALUE FROM DATABASE USING AJAX</h1>
        <br><br><br>
        <form action="#" class="form-horizontal" method="post">
          <div id="newuser"></div>
          <div>
            <label for="state" class="control-label col-sm-2">city*:</label>
            <?php
               $stmr1= $con->prepare("select * from city order by id ASC");
               $stmr1->execute();
               $city_details = $stmr1->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="col-sm-10">
               <select name="city" id="city" class="form-control" required="">
                <option value="0">--Please Select--</option>
                <?php
                foreach ($city_details as $city) {
                    echo '<option value="'.$city['id'].'">'.$city['city_name'].'</option>';
                }
                ?>
               </select>
            </div>
          </div>
          <br>
          <div id="error_div"></div>
          <div class="form-group">
            <label for="city" class="control-label col-sm-2"> Pincode*:</label>
            <div class="col-sm-10">
                <input type="text" name="pincode" id="pin" class="form-control">
            </div>
          </div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script> 
    $(document).ready(function(){
    $('#city').change(function(){
        var city = $('#city').val();
        $.ajax({
            url: 'valueajax.php',
            type: 'post',
            data: {
                'city_name': city
            },
            dataType: 'json',
        })
        .done(function(data){
            if(data.pincode_error){
                $('#pin').val('');
                $('#error_div').html(data.pincode_error);
            } else {
                $('#pin').val(data.pincode); // Set the pincode value
                $('#error_div').html(''); // Clear any previous error
            }
        })
        .fail(function(xhr, textStatus, errorThrown){
            alert(errorThrown);
        });
    });
});
</script>
</body>
</html>

