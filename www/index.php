<html>
<head>
<title>File Upload Form</title>
</head>
<body>
This form allows you to upload a file to the server.<br>

<form action="process_image.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
