<?php
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "animal_info");
//error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}
body{
  background-color: skyblue;
}
h2{
  
  margin-left: 18em;
}

input[type=text], select, textarea {
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  margin-left: 22em;
  padding: 15px 200px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  float: center ;
  font-size: 16px;
}

input[type=submit]:hover {
  background-color: #45a048;

}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2>Animal Information Form</h2>

<div class="container">
  <form action="" method="POST" name="form" enctype="multipart/form/data">
  <div class="row">
    <div class="col-25">
      <label for="name">Animal Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="n1" name="name" placeholder="Enter Animal name.." required>
    </div>
  </div>




  <div class="row">
    <div class="col-25">
      <label for="category">Category</label>
    </div>
    <div class="col-75">
      <select id="c1" name="category">
        <option value="Herbivores">Herbivores</option>
        <option value="Omnivores">Omnivores</option>
        <option value="Carnivores">Carnivores</option>
      </select>
    </div>
  </div>






  <div class="row">
    <div class="col-25">
      <label for="image">Image</label>
    </div>
    <div class="col-75">
      <input type="file" name="file"  value="" required >
    </div>
  </div>




  <div class="row">
    <div class="col-25">
      <label for="desc">Description</label>
    </div>
    <div class="col-75">
      <textarea id="d1" name="desc" placeholder="Description."  required style="height:200px"></textarea>
    </div>
  </div>



  <div class="row">
    <div class="col-25">
      <label for="life">Life_Expectancy</label>
    </div>
    <div class="col-75">
      <select id="l1" name="life">
        <option value="0-1 year">0-1 year</option>
        <option value="1-5 years">1-5 years</option>
        <option value="5-10 years">5-10 years</option>
         <option value="10+ years">10+ years</option>
      </select>
    </div>
  </div>


<div class="row">
    <div class="col-25">
      <label for="text">Captcha</label>
    </div>
    <div class="col-75">
      <input id="text" type="text" name="text" required  >

    </div>
  </div>


  <div class="row">
    <input type="submit" value="submit" name="submit">
  </div>
  
</div>
</form>

<?php
if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $category=$_POST['category'];
  $desc=$_POST['desc'];
  $life=$_POST['life']; 
  $filename= $_FILES['file']["name"];
  $tempname= $_FILES['file']["temp_name"];
  $folder= "animalpictures/".$filename;
  move_uploaded_file($tempname, $folder);
  
  if($name!= "" && $category!= ""  &&   $desc!= "" &&    $life!= "" &&    $filename!= ""  )
  {

  $query="INSERT INTO animal VALUES ('$name','$category','$desc','$life' '$folder')";
   $data=mysqli_query($con,$query);

           if($data)
    {
     echo "data is inserted into database";
    }
  }
   else
   {
     echo "All fields are required";
   }
 }

   
  ?>
</body>
</html>
