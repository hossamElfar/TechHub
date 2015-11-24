
<?php 
if(!isset($_SESSION))
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Library System</title>

  <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/freelancer.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


</head>

<body id="page-top" class="index">
<?php if(isset($_SESSION['name'])) { ?>
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#page-top">Library System</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden">
            <a href="#page-top"></a>
          </li>
          <li class="page-scroll">
            <a href="#ViewAllBooks">View All Books</a>
          </li>
          <li class="page-scroll">
            <a href="#addBook">Add a book</a>
          </li>
          <li class="page-scroll">
            <a href="#BorrowBook">Borrow a Book</a>
          </li>
          <li class="page-scroll">
            <a href="#ViewBorrowed">View All Borrowed Books</a>
          </li>
          <li class="page-scroll">
            <a href="#logout">Log out</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>

  <!-- Header -->
  <header>
    <div class ="container">
      <div class = "col-leg-12">
        <div class ="intro-text">
         <span class = "name">Welcome <?php echo $_SESSION['name']; ?>  </span>
         <img src="accounts_icon.jpg">
         <hr class="star-light">

       </div>
     </div>
   </div>

 </header>

 <header>
  <div class="container" id = "ViewAllBooks">
    <div class="row">
      <div class="col-lg-12">

        <div class="intro-text">
          <span class="name">All Available Books In the Library</span>
          <hr class="star-light">
          <?php 
          $db = new mysqli('localhost','root','','library');
          $result =  $db->query("SELECT ISBN,name,AuthorName,NumberOfCopies FROM book WHERE NumberOfCopies <>'0' ");
          echo "<table class='table table-striped table-hover '>
          <thead>
          <tr class='info'>
          <th>ISBN</th>
          <th>Book Name</th>
          <th> Autor Name</th>
          <th> Number Of Copies</th>
          </tr>
          </thead>
          <tbody>";
          while($row = mysqli_fetch_array($result))
          {
            echo "<tr class='info'>";
            echo "<td>" . $row['ISBN'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['AuthorName'] . "</td>";
            echo "<td>". $row['NumberOfCopies']."</td>";
            echo "</tr>";
          }
          echo "</tbody>
          </table>";
          ?>
          <form method ="get">

            <div class="form-group">
              <label class="col-md-4 control-label" for="submit"></label>
              <div class="col-md-4">
                <button id="submit5" name="refresh" class="btn btn-primary">Refresh List</button>
              </div>
            </div>
          </form>
          <?php 
          if(isset($_POST['refresh'])){
            $db = new mysqli('localhost','root','','library');
            $result =  $db->query("SELECT ISBN,name,AuthorName,NumberOfCopies FROM book");
            echo "<table class='table table-striped table-hover '>
            <thead>
            <tr class='danger'>
            <th>ISBN</th>
            <th>Book Name</th>
            <th> Autor Name</th>
            <th> Number Of Copies</th>
            </tr>
            </thead>
            <tbody>";
            while($row = mysqli_fetch_array($result))
            {
              echo "<tr class='info'>";
              echo "<td>" . $row['ISBN'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['AuthorName'] . "</td>";
              echo "<td>". $row['NumberOfCopies']."</td>";
              echo "</tr>";
            }
            echo "</tbody>
            </table>";
          }


          ?>

        </div>
      </div>
    </div>
  </div>
</header>

<!-- Portfolio Grid Section -->
<header>
  <section id="addBook">
    <div class="container">
      <div class = "col-leg-12">
        <div class ="intro-text">
         <span class = "name">Add a Book To the Library</span>
         <hr class="star-light">
       </div>
     </div>
     <form class="form-horizontal" method="post">
      <fieldset>


        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="ISBN">ISBN of the Book</label>  
          <div class="col-md-4">
            <input id="ISBN" name="ISBN" type="text" placeholder="ISBN" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="BoookName">Book</label>  
          <div class="col-md-4">
            <input id="BoookName" name="BookName" type="text" placeholder="BookName" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="author">Author Name</label>  
          <div class="col-md-4">
            <input id="author" name="author" type="text" placeholder="Author Name" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="submit"></label>
          <div class="col-md-4">
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Add Book" />
          </div>
        </div>

      </fieldset>
    </form>

  </div>
</section>
</header>

<section class="success" id="ViewBorrowed">
  <header>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <div class="intro-text">
            <span class="name">All Borrowed Books</span>
            <hr class="star-light">
            <?php 
            $db = new mysqli('localhost','root','','library');
            $result = $db->query("SELECT ISBN,name,AuthorName FROM book WHERE NumberBorrwed <>'0'");
            echo "<table class='table table-striped table-hover '>
            <tr class='info'>
            <th>ISBN   </th>
            <th>Book Name   </th>
            <th>Author Name   </th>
            </tr>";
            while($row = mysqli_fetch_array($result))
            {
              echo "<tr class = 'info'>";
              echo "<td>" . $row['ISBN'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['AuthorName'] . "</td>";
              //echo "<td>". $row['NumberOfCopies']."</td>";
              echo "</tr>";
            }
            echo "</table>";
            ?>
            <form method="get">
              <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                  <button id="submit4" name="refreshB" class="btn btn-primary">Refresh List</button>
                </div>
              </div>
            </form>
            <?php 
            if(isset($_POST['refreshB'])){
              $db = new mysqli('localhost','root','','library');
              $result = $db->query("SELECT ISBN,name,AuthorName FROM book WHERE NumberBorowed <>0");
              echo "<table class='table table-striped table-hover '>
              <tr class='info'>
              <th>ISBN   </th>
              <th>Book Name   </th>
              <th>Author Name   </th>
              
              </tr>";
              while($row = mysqli_fetch_array($result))
              {
                echo "<tr class = 'info'>";
                echo "<td>" . $row['ISBN'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['AuthorName'] . "</td>";
                //echo "<td>". $row['NumberOfCopies']."</td>";
                echo "</tr>";
              }
              echo "</table>";
            }

            ?>
          </div>
        </div>
      </div>
    </div>  
  </header>                      
</section>
<header>
  <section id="BorrowBook">
    <div class="container">
      <div class ="intro-text">
        <span class = "name">Borrow A Book</span>
        <hr class="star-light">
      </div>
      <form class="form-horizontal" method="post">
        <fieldset>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="ISBN">ISBN of the Book</label>  
            <div class="col-md-4">
              <input id="ISBN" name="ISBN" type="text" placeholder="ISBN" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="BoookName">Book</label>  
            <div class="col-md-4">
              <input id="BookName" name="BookName" type="text" placeholder="BookName" class="form-control input-md" required="">

            </div>
          </div>



          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
              <input type="submit" id="submit2" name="submit2" class="btn btn-primary" value="Borrow Book">
            </div>
          </div>

        </fieldset>
      </form>

    </div>
  </section>
</header>
<header>
  <section id="logout">
    <div class="container">
      <div class = "col-leg-12">
        <form method="get">

          <input type = "submit" name = "logout" class="btn btn-primary" value="logout">
        </form>
      </div>
    </div>
  </section>
</header>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
  <a class="btn btn-primary" href="#page-top">
    <i class="fa fa-chevron-up"></i>
  </a>
</div>



<!-- Custom Theme JavaScript -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/freelancer.js"></script>
<?php }else{
  echo("<script>location.href = '"."login.php';</script>");
}

?>
</body>


</html>
<?php 


function Exists($ISBN,$name)
{
  $db = new mysqli('localhost','root','','library');
  $result=$db->query("SELECT * FROM book WHERE ISBN='{$ISBN}' and name = '{$name}'");
  if($result->num_rows){
    return true ;
  }else{
    return false;
  }
}
function add($ISBN,$name){
  $db = new mysqli('localhost','root','','library');
  $result=$db->query("SELECT NumberOfCopies FROM book WHERE ISBN='{$ISBN}' and name = '{$name}'");
  $row = mysqli_fetch_array($result);
  $va = intval($row['NumberOfCopies'])+1;
  return "".$va;
}
function addbo($ISBN,$name){

  $db = new mysqli('localhost','root','','library');
  $result=$db->query("SELECT NumberBorrwed FROM book WHERE ISBN='{$ISBN}' and name = '{$name}'");
  $row = mysqli_fetch_array($result);
  $va = intval($row['NumberBorrwed'])+1;
  return "".$va;

}
function minCo($ISBN,$name){
  $db = new mysqli('localhost','root','','library');
  $result=$db->query("SELECT NumberOfCopies FROM book WHERE ISBN='{$ISBN}' and name = '{$name}'");
  $row = mysqli_fetch_array($result);
  $va = intval($row['NumberOfCopies'])-1;
  return "".$va;
}
function numOfCo($ISBN,$name){
  $db = new mysqli('localhost','root','','library');
  $result=$db->query("SELECT NumberOfCopies FROM book WHERE ISBN='{$ISBN}' and name = '{$name}'");
  $row = mysqli_fetch_array($result);
  $va = intval($row['NumberOfCopies']);
  return "".$va ;
}

if(isset($_POST['submit'])){
  echo "Test";
  $bookName=$_POST['BookName'];
  $ISBN = $_POST['ISBN'];
  $AuthorName=$_POST['author'];
  $db = new mysqli('localhost','root','','library');
  if(Exists($ISBN,$bookName)==false){
    $insertBook = $db->query("INSERT INTO book (ISBN,name,AuthorName,NumberOfCopies) VALUES ('{$ISBN}','{$bookName}','{$AuthorName}',1)");

  //header("Location: #ViewAllBooks");
    echo "ADDED ";
  }else{

    $cop = add($ISBN,$bookName);
    $update= $db->query("UPDATE book SET NumberOfCopies='{$cop}' WHERE ISBN='{$ISBN}' and name = '{$bookName}'");
  }
}
if(isset($_POST['submit2'])){
  $bookName=$_POST['BookName'];
  $ISBN = $_POST['ISBN'];

  $db = new mysqli('localhost','root','','library');
  if(numOfCo($ISBN,$bookName)=="0"){
    echo "there is no available copies of that book ";
  }else{
   $cop = minCo($ISBN,$bookName);
   $update= $db->query("UPDATE book SET NumberOfCopies='{$cop}' WHERE ISBN='{$ISBN}' and name = '{$bookName}'");
   $bo =addbo($ISBN,$bookName);
   $update= $db->query("UPDATE book SET NumberBorrwed='{$bo}' WHERE ISBN='{$ISBN}' and name = '{$bookName}'");
 }
}
if(isset($_GET['logout'])){
  session_destroy();
  echo("<script>location.href = '"."login.php';</script>");
}

?>
