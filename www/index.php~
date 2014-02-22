<html>

    <head>
           <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>


    <body>



        <input type="file" name="photos" id="photos" /> <br>
        <input type="text" name="user_firstname" id="user_firstname"/> <br>
        <input type="text" name="user_lastname" id="user_lastname" /> <br>
        <input type="text" name="user_email" id="user_email" /> <br>
        <input type="text" name="user_phone" id="user_phone" /> <br>
        <input type="text" name="violation_type" id="violation_type" /> <br>
        <input type="text" name="latitude" id="latitude" /> <br>
        <input type="text" name="longitude" id="longitude" /> <br>
        <input type="text" name="description" id="description" /> <br>
        <input type="text" name="location" id="location" /> <br>
        <input type="submit" value="Enforce" id="submit_data" />


    </body>

    <script>
    $("#submit_data").click(function(){

    data_to_send = {
    "photos":$("#photos").val(),
    "user_firstname":$("#user_firstname").val(),
    "user_lastname":$("#user_lastname").val(),
    "user_email":$("#user_email").val(),
    "user_phone":$("#user_phone").val(),
    "violation_type":$("#violation_type").val(),
    "latitude":$("#latitude").val(),
    "longitude":$("#longitude").val(),
    "description":$("#description").val(),
    "location":$("#location").val(),
    };

    options = {
    type:       "POST",
    url:        "http://www.Davides.me/insert.php",
    data:       data_to_send,
    dataType:   "json",
        };


    $.ajax(options);
                
    
    });
    </script>


</html> 


