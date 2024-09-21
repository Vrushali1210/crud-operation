<?php  
   session_start(); 
 
   include("php/config.php"); 
   if(!isset($_SESSION['valid'])){ 
    header("Location: index.php"); 
   } 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style\style.css"> 
    <link rel="stylesheet" href="style\home.css"> 
 
    <title>Student Data</title> 
</head> 
<body> 
   
        <div class="right-links"> 
 
            <?php  
             
            $id = $_SESSION['id']; 
            $query = mysqli_query($con,"SELECT*FROM Users WHERE Id = $id"); 
 
            while($result = mysqli_fetch_assoc($query)){ 
                $res_Uname = $result['Username']; 
                $res_Email = $result['Email']; 
                $res_id = $result['Id']; 
            } 
            ?> 
 
            
 
        </div> 
    </div> 
            <div id="home-main"> 
                <div class="home-up"> 
                    <div class="up-left up"> 
                         <p>Welcome  <span><?php echo "$res_Uname"; ?>...!</span>.</p> 
                    </div> 
                    
                </div> 
                <div class="home-down"> 
                
                  <form action="#" method="POST"> 
                  <h2 class="heding">Student Data List......</h2>  
                  <?php 
                   $sql = "SELECT roll_no,  name,city,class,mobile_no,college_name FROM 
Student_data"; 
                   $result = $con->query($sql); 
                
               if ($result->num_rows > 0) { 
                 ?> 
                 <table> 
                   <tr> 
                       <th>Roll No.</th> 
                       <th>Name</th> 
                       <th>Mobile Number</th> 
                       <th>Class</th> 
                       <th>College Name</th> 
                       <th>City</th> 
                       <th>Result</th> 
                   </tr> 
 
                 <?php 
                 while($row = $result->fetch_assoc()) { 
                   echo "  <tr> 
                       <td>".$row["roll_no"]."</td> 
                       <td>".$row["name"]."</td> 
                       <td>".$row["mobile_no"]."</td> 
                       <td>".$row["class"]."</td> 
                       <td>".$row["college_name"]."</td> 
                       <td>".$row["city"]."</td>          
                       <td><a href='result.php?id=$row[roll_no]&name=$row[name]'>Result</a></td> 
               </tr>"; 
                 } 
               } else { 
                 echo "0 results"; 
               } 
               ?> 
                
               </table> 
                           <input type="submit" name="home" value="Home" class="button"> 
                           <a href="php/logout.php"> <button class="btn">Log Out</button> </a> 
                     </form> 
                </div> 
            </div> 
           
</body> 
</html> 
<?php 
if(isset($_POST['home'])){ 
  header("Location:home.php"); 
}
?>