<!DOCTYPE html>
<html lang="en">

<head>
  <title>Search </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/Form.css">
</head>

<body>

  <div class="limiter">
    <div class="container-login  " style="background-image: url('images/bg-01.jpg');">
      <div class=" p-t-30 p-b-50">
        <span class="SystemHeadings p-b-41">
          Password Management System
        </span>
        <div class="displayBox  p-b-33 p-t-5">
          <div class="container">
            <form >
              <div class="row">
                <div class="col-25">
                  <label for="fname">Find</label>
                </div>
                <div class="col-75">
                  <input type="text" id="search" name="search" placeholder="Enter what you want to search">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="search">Search In</label>
                </div>
                <div class="col-75">
                <input type="checkbox" id="title" name="title" value="title">
                <label for="title"> Title</label>
                <input type="checkbox" id="username" name="username" value="username">
                <label for="usernam"> Username</label><br>
                <input type="checkbox" id="url" name="url" value="url">
                <label for="url"> URL </label>
                <input type="checkbox" id="pass" name="pass" value="pass">
                <label for="pass"> Password</label>
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="opt">Option</label>
                </div>
                <div class="col-25">
                <input type="checkbox" id="case" name="case" value="case">
                <label for="case"> Case sensitive</label>
               
                </div>
              </div>
     
          </div>
        
        <table id="result">

        </table>
       
        </div>
        </form>
        <div class="container-login100-form-btn m-t-32">
          <button onClick="find()" class="login100-form-btn" >
            Search
          </button>

        </div>
      </div>
    </div>
  </div>
  <?php include 'php/password_list.php';

                    $infoArray = array();
                    while($row = mysqli_fetch_assoc($result))
                    {

                    array_push($infoArray,$row); 

                    }
   ?>                 

  <div id="dropDownSelect1"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    var arr1 = <?php echo json_encode($infoArray);  ?> ;
  </script>  
  <script>
  
    
    function find(){
        
        var search=document.getElementById("search").value;
        var html1=html2=html3=html4="";
        var head = "<tr ><th>ID</th><th>Title</th><th>Username</th><th>Password</th><th>URL</th> </tr>";
        if((document.getElementById("case").checked))
        {
        if(document.getElementById("title").checked)
        {
           var arr= arr1.filter(a => a.title == search);
           if(arr.length)
            {
            html1 = ' <tr >'+
                '<td scope="row" >'+arr[0].id+'</td>'+
                '<td >'+arr[0].title+'</td>'+
                '<td >'+arr[0].username+'</td>'+
                '<td >'+arr[0].password+'</td>'+
                '<td >'+arr[0].URL+'</td>'+
            '</tr>';
            }
        }
        if(document.getElementById("username").checked)
        {
           var arr= arr1.filter(a => a.username == search);
           if(arr.length)
            {
            html2 = ' <tr >'+
                '<td scope="row" >'+arr[0].id+'</td>'+
                '<td >'+arr[0].title+'</td>'+
                '<td >'+arr[0].username+'</td>'+
                '<td >'+arr[0].password+'</td>'+
                '<td >'+arr[0].URL+'</td>'+
            '</tr>';
            }
        }
        if(document.getElementById("url").checked)
        {
           var arr= arr1.filter(a => a.URL == search);
           if(arr.length)
            {
            html3 = ' <tr >'+
                '<td scope="row" >'+arr[0].id+'</td>'+
                '<td >'+arr[0].title+'</td>'+
                '<td >'+arr[0].username+'</td>'+
                '<td >'+arr[0].password+'</td>'+
                '<td >'+arr[0].URL+'</td>'+
            '</tr>';
            }
        }
        if(document.getElementById("pass").checked)
        {
           var arr= arr1.filter(a => a.password == search);
           if(arr.length)
            {
            html4 = ' <tr >'+
                '<td scope="row" >'+arr[0].id+'</td>'+
                '<td >'+arr[0].title+'</td>'+
                '<td >'+arr[0].username+'</td>'+
                '<td >'+arr[0].password+'</td>'+
                '<td >'+arr[0].URL+'</td>'+
            '</tr>';
            }
        }
        var dis =  html1 + html2 + html3 + html4;
        if (dis != "")
        {
        dis = head + dis;
        document.getElementById("result").innerHTML = dis;
        }
        else
        {
            document.getElementById("result").innerHTML = "NO RESULT FOUND !!!"
        }
        }
        else
        {
        search = search.toLowerCase();  
        if(document.getElementById("title").checked)
        {
           console.log("Title true");
           var arr= arr1.filter(a => a.title.toLowerCase() == search);
           if(arr.length)
            {
            html1 = ' <tr >'+
                '<td scope="row" >'+arr[0].id+'</td>'+
                '<td >'+arr[0].title+'</td>'+
                '<td >'+arr[0].username+'</td>'+
                '<td >'+arr[0].password+'</td>'+
                '<td >'+arr[0].URL+'</td>'+
            '</tr>';
            }
        }
        if(document.getElementById("username").checked)
        {
            console.log("username"); 
           var arr= arr1.filter(a => a.username.toLowerCase() == search);
           if(arr.length)
            {
            html2 = ' <tr >'+
                '<td scope="row" >'+arr[0].id+'</td>'+
                '<td >'+arr[0].title+'</td>'+
                '<td >'+arr[0].username+'</td>'+
                '<td >'+arr[0].password+'</td>'+
                '<td >'+arr[0].URL+'</td>'+
            '</tr>';
            }
        }
        if(document.getElementById("url").checked)
        {
            console.log("url"); 
           var arr= arr1.filter(a => a.URL.toLowerCase() == search);
           if(arr.length)
            {
            html3 = ' <tr >'+
                '<td scope="row" >'+arr[0].id+'</td>'+
                '<td >'+arr[0].title+'</td>'+
                '<td >'+arr[0].username+'</td>'+
                '<td >'+arr[0].password+'</td>'+
                '<td >'+arr[0].URL+'</td>'+
            '</tr>';
            }
        }
        if(document.getElementById("pass").checked)
        {
            console.log("pass"); 
           var arr= arr1.filter(a => a.password.toLowerCase() == search);
           if(arr.length)
            {
            html4 = ' <tr >'+
                '<td scope="row" >'+arr[0].id+'</td>'+
                '<td >'+arr[0].title+'</td>'+
                '<td >'+arr[0].username+'</td>'+
                '<td >'+arr[0].password+'</td>'+
                '<td >'+arr[0].URL+'</td>'+
            '</tr>';
            }
        }  
        var dis =  html1 + html2 + html3 + html4;
        if (dis != "")
        {
        dis = head + dis;
        document.getElementById("result").innerHTML = dis;
        }
        else
        {
            document.getElementById("result").innerHTML = "NO RESULT FOUND !!!"
        }
        }
        
     
    }
  </script>

</body>

</html>