<!DOCTYPE html>
<html>
    <head>
        <title>Codeigniter Upload</title>
    </head>
    <body>
 
        <h3>Upload File Dengan Codeigniter</h3>
 
        <?php
        echo form_open_multipart('sales_force/do_upload');
        ?>
 
        <input type="file" name="gambar">
        <br>
        <input type="file" name="gambar2">
        <br>
        <input type="file" name="gambar3">
        <br>
        <button type="submit">Upload Gambar</button>
        <?php echo form_close(); ?>
 
    </body>
</html>