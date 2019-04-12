<?php
session_start();

// making the list and adding it into an empty array.
if(isset($_POST['todoEntry'])){
    header('location:http://ToDoListApp/ToDoList04.php');
    if(!(isset($_SESSION['listItems']))){
        $_SESSION['listItems'] = array();
        $_SESSION['listItems'][]=$_POST['todoEntry'];
        var_dump($_SESSION['listItems']);
    }else{$_SESSION['listItems'][] = $_POST['todoEntry'];
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Ubuntu" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>

<body style="background-image:url(images/toDo9.jpg);">

<!--styling start-->

<div id="center">
<h1 style="margin-top: 5%;">To Do List</h1>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<div id="nav">
<nav>
  <form class="form-inline">
    <input name="todoEntry" type="text"  aria-label="Search" required='required' autofocus >
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: white;">ADD ITEM</button>
  </form>
</nav>
</div>
<!--styling end-->

<?php

// If list is set display items
echo "<ul style='list-style: none;'>";
       foreach ($_SESSION['listItems'] as $items){
       echo "<li id='task'>" .$items. "</li>";}
        "</ul>"
?>
<script>
$(document).ready(function(){
    var lineState = 0;
      $('li').each(function(i){
          $(this).click(function(){
                        sessionKey = i;
//Strike and unstrike items on list.
        if(lineState == 0){
              $(this).css("text-decoration", "line-through");
              lineState = 1;
              sessionStorage.setItem(sessionKey,lineState);
          } else {
              $(this).css("text-decoration", "none");
              lineState= 0;
              sessionStorage.setItem(sessionKey,lineState);
                 }
        });
      });

//Store task which are striked through and hold memory
      $('li').each(function(i){
        if( sessionStorage.getItem(i)==1){
          $(this).css("text-decoration", "line-through");
          $(this).css("cursor", "pointer");
          
        }
      });
});
</script>
</div>
    
</body>
<?php
session_end();
?>
</html>