<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>

<body>
    <h2>Upload File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required><br><br>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>

</html>