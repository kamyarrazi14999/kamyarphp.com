<html>
  <form action="" method="post">
    <input type="text" name="kan"   >
    <input type="submit" name="submit" value="submit">
  </form>
</html>

<style>
  input{
    width: 300px;
    height: 30px;
    border-radius: 5px;
    border: 1px solid black;
    text-align: center;
    font-size: 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    color: blueviolet;
    background-color: #80ff00;
  }

  input[type="submit"]{
    width: 100px;
    height: 30px;
    border-radius: 5px;
    border: 1px solid black;
    text-align: center;
    font-size: 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    color: blueviolet;
  }
</style>

<?php
/**
 * Create a new text file based on user input.
 *
 * @param string $kan The name of the file to create.
 *
 * @return string A success message if the file is created, or an error message if the file already exists.
 */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
  $kan = $_POST['kan'];
  $filename = $kan . '.txt';

  /**
   * Check if the file already exists.
   *
   * @param string $filename The name of the file to check.
   *
   * @return bool True if the file exists, false otherwise.
   */
  if (file_exists($filename)) {
    echo "فایل از قبل موجود است";
  } else {
    /**
     * Create a new file.
     *
     * @param string $filename The name of the file to create.
     *
     * @return resource The file pointer, or false on error.
     */
    $file = fopen($filename, 'w');
    if ($file) {
      echo "فایل جدید.$filename.ایجاد شد";
      fclose($file);
    } else {
      echo "فایل ایجاد نشد";
    }
  }
}
?>

