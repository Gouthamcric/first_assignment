<!DOCTYPE html>
<?php 
   function load_country()
      {
        $opt='';
        $con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));
        $querry="select * from country";
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
        $count= mysqli_num_rows($res);
        $i=0;
        while($i!=$count)
          {
            $out= mysqli_fetch_array($res)or die(mysqli_errno($con));
            $opt .='<option value="'.$out["name"].'">'.$out["name"].'</option>';
            $i++;
          }
        return $opt;
      }
     
   ?>
<html>
    <head>
        <title></title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
         <link type='text/css' href='newcss.css' rel='stylesheet'>
    </head>
    <body class="background-img">
             
               
            <nav class="navbar navbar-inverse">
             
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#stu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" class="navbar-brand" style="font-size: 25px">Dhanguard</a><br>
                        <p class="navbar-brand" style="font-size:15px">Want to Open  <span style="color:crimson">Business</span> Account ?</p>
                    </div>
                    <div class="collapse navbar-collapse" id="stu">
                    <ul class="nav navbar-nav navbar-right">
                           <li class="nav-item"><a class="nav-link px-2" href="#">Facebook <i class="fab fa-facebook"></i></a></li>
            <li class="nav-item"><a class="nav-link px-2" href="#">Twitter <i class="fab fa-twitter"></i></a></li>
            <li class="nav-item"><a class="nav-link px-2" href="#">Youtube <i class="fab fa-youtube"></i></a></li>
            <li class="nav-item"><a class="nav-link px-2" href="#">Instagram <i class="fab fa-instagram"></i></a></li>
            <li class="nav-item"><a class="nav-link px-2" href="#">Whatsapp <i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                        </div>
                    
               
         
                
            </nav>
        <div class="container">
            
        <div align="center" class="embed-responsive embed-responsive-16by9">
    <video autoplay loop class="embed-responsive-item">
        <source src="vid.mp4" type="video/mp4">
    </video>
</div>
            <br>
            <div class="row ">
             <div class="col-xs-5 col-xs-offset-3">
                 
                 <form  id="form" >
    <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label" ><i class="fas fa-user"></i> Name</label> 
        <div class="col-sm-9">
            
            <input type="name" class="form-control" id="name" name="name" placeholder="Full Name" required="true" pattern="[A-Za-z\s]{3,}$"  title="name should contain alphabets only and it should be minimum of 3 letters.">
        </div>
    </div>
    <div class="form-group row">
        <label for="nationality" class="col-sm-3 col-form-label"><i class="fas fa-globe"></i> Nationality</label>
        <div class="col-sm-9">
            <select class="form-control" id="nationality" name="nationality">
                 <option disabled selected>Nationality</option>
                 <?php echo load_country(); ?>
            </select>
        </div>
    </div>
      <div class="form-group row">
          <label for="phone" class="col-sm-3 col-form-label"><i class="fas fa-phone"></i> Phone</label> 
          <div class="col-sm-3">
          <input type="text" class="form-control" id="ph" name="ph" disabled value=""/>
        </div>
        <div class="col-sm-6" >
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" required="true">
        </div>
    </div>
                       <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label" ><i class="fas fa-envelope"></i> Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" placeholder="email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="the username, the @ symbol, and the user's domain name">
        </div>
    </div>
                       <div class="form-group row">
        <label for="company" class="col-sm-3 col-form-label"><i class="fas fa-industry"></i> Company</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="company" name="company" placeholder="company" reuired="true" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default btn-block">Register</button>
        </div>
    </div>
</form>
                    </div>
                </div>
            </div>
      
    <script>
        document.getElementById("form").addEventListener("submit", submit);
        function submit(e) {
            $(document).ready(function(){

     var arr=[];
 
       arr[0]=document.getElementById("name").value;
       arr[1]=document.getElementById("nationality").value;
       arr[2]=document.getElementById("ph").value+document.getElementById("phone").value;
       arr[3]=document.getElementById("email").value;
       arr[4]=document.getElementById("company").value;
    
                    
    $.ajax({
                     url:"index3.php",
                     method:"POST",
                     data:{arr:arr},
              
                     success:function(data)
                      {
                     alert(data);
                      }
                     });
  
  });
        }
        
        
        $( document ).ready(function() {
               
    
        $('#nationality').change(function(){

        var type=$(this).val();
                     $.ajax({
                     url:"index2.php",
                     method:"POST",
                     data:{type:type},
                     dataType:"text",
                     success:function(data)
                      { 
                     $('#ph').val(data); 
                      }
                     });
           
                    });
                });
    </script>
    </body>