<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserting Multiple Rows</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 align="center" style="color:red;">Inserting Multiple Rows in PHP</h1>
        <br><br><br>
        <form action="#" class="form-horizontal" method="post">
            <div class="row">
                <div class="col-sm-1">
                    <label for="age">Sl No:</label>
                    <input type="text" class="form-control sl" name="slno[]" id="slno" value="1" readonly>
                </div>
                <div class="col-sm-3">
                    <label for="student name">Student Name:</label>
                    <input type="text" class="form-control" name="student[]" id="stu_name" placeholder="Enter Your Name">
                </div>
                <div class="col-sm-3">
                    <label for="phone">Phone No:</label>
                    <input type="text" class="form-control" name="phone[]" id="phone" placeholder="Enter Your Phone Number">
                </div>
                <div class="col-sm-1">
                    <label for="age">Age:</label>
                    <input type="text" class="form-control" name="age[]" id="age" placeholder="Enter Your Age">
                </div>
                <div class="col-sm-3">
                    <label for="dateofbirth">Date of Birth</label>
                    <input type="date" class="form-control" name="dob[]" id="dob" placeholder="">
                </div>
            </div>
            <br>
            <div id="next"></div>
            <br>
            <button type="button" name="addrow" id="addrow" class='btn btn-success pull-right'>Add New Row</button>
            <br><br>
            <button type="submit" name="submit" class="btn btn-info pull-left">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#addrow').click(function(){
                var length = $('.sl').length;
                var i = length + 1;
                var newrow = $('#next').append('<div class="row"><div class="col-sm-1"><label for="age">Sl No:</label><input type="text" class="form-control sl" name="slno[]" id="slno" value="'+i+'" readonly></div><div class="col-sm-3"><label for="student name">Student Name:</label><input type="text" class="form-control" name="student[]" id="stu_name'+i+'" placeholder="Enter Your Name"></div><div class="col-sm-3"><label for="phone">Phone No:</label><input type="text" class="form-control" name="phone[]" id="phone'+i+'" placeholder="Enter Your Phone Number"></div><div class="col-sm-1"><label for="age">Age:</label><input type="text" class="form-control" name="age[]" id="age'+i+'" placeholder="Enter Your Age"></div><div class="col-sm-3"><label for="dateofbirth">Date of Birth</label><input type="date" class="form-control" name="dob[]" id="dob'+i+'" placeholder=""></div><div class="col-sm-1"><button type="button" name="remove" class="btnRemove btn btn-danger pull-right" value="'+i+'">Remove</button></div></div><br><br>');
            });

            $(document).on('click', '.btnRemove', function(){
                var btn_value = $(this).val();
                $('#next div.row:eq('+(btn_value-1)+')').remove();
            });
        });
    </script>
</body>
</html>
