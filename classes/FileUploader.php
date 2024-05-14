<?php
class FileUploader
{
    private $uploadDir = "uploads/";

    public function uploadFile($file)
    {
        $targetDir = $this->uploadDir;
        $targetFile = $targetDir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($targetFile)) {
            return "Sorry, file already exists.";
        }

        // Check file size
        if ($file["size"] > 500000) {
            return "Sorry, your file is too large.";
        }

        // Allow only certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                return "The file " . htmlspecialchars(basename($file["name"])) . " has been uploaded.";
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>