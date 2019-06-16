<?php
  ob_start();
  session_start();
?>

<!DOCTYPE>
<html>
<?php 
  require 'config/Database.php';
  require 'functions.php';
?>
<head>
  <title>FMI Quiz</title>
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/packaged/jquery.noty.packaged.min.js"></script>
  <script src="js/alert.js"></script>
</head>

<body>
  <center>
    <div class="title">
      <span>fmi.quiz</span>
      <?php
      if (isLogged()){
      ?>
       <form name="logout", id="logout" method="post" onsubmit="send(event)" class="logout-form">
          <button type="submit" id="submit" name="logout" class="logout" data-loading-text="Loading...">Logout</button>   
      </form>
    <?php } ?>
    </div>
    <?php
      if (isLogged()){ 
        if ($_COOKIE['userRole'] == "admin" && !isset($_GET['start'])) {
          ?>
          <div id="wrap">
            <div class="container">
                <div>
                    <form action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Import File</legend>
                            <!-- File Button -->
                            <div>
                                <label for="filebutton">Select File</label>
                                <div class="choose-file">
                                    <input type="file" name="file" id="file" class="choose-file-btn">
                                </div>
                            </div>
                            <!-- Button -->
                            <div>
                                <labelfor="singlebutton">Import data</label>
                                <div class="import">
                                    <button type="submit" id="submit" name="Import" data-loading-text="Loading..." class="import-btn">Import</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php } if (!isset($_GET['start'])) { ?>

         <div id="wrap">
            <div class="container">
                <form action="functions.php" method="post" name="export_excel" enctype="multipart/form-data" class="export">
                    <fieldset>
                        <legend>Export Results</legend>
                        <button type="submit" id="submit" name="Export" class="export-btn" data-loading-text="Loading...">Export Results</button>
                    </fieldset>
                </form>
            </div>
        </div>

        <?php }

        if (isset($_POST['click']) || isset($_GET['start'])) {

          if (!isset($_COOKIE['testName'])) {

          ?>
          <div class="tests">
            <h2>Select a test</h2>
            <form action="functions.php" method="post" name="take_test" enctype="multipart/form-data" class="form">

              <?php showTests(); ?>
              <input type="submit" value="Submit" class="btn-submit-test">
            </form>
          </div>
            <?php
          } 

          updateClicks();

        } else {
          $_SESSION['clicks'] = 0;
        }
    ?>
    <div class="bump"><br>
      <form>
        <?php 
          if($_SESSION['clicks']==0){ 
            ?> 
            <button class="button" name="start" float="left">
              <span>START QUIZ</span>
            </button> <?php 
          } 
        ?>
      </form>
    </div>
    <form action="" method="post" name="tests" enctype="multipart/form-data" class="form">      
      
      <?php 
        if (isset($_COOKIE['testName'])) {
          getQuestions();
          $currIndex = $_COOKIE['questionIndex'];
          $questions =  unserialize($_COOKIE['questions'], ["allowed_classes" => false]);

          if(!isset($_COOKIE['scoreArray'])){
             setcookie("scoreArray", serialize(array_fill(1, count($questions), 0)), time() + 3600);
          }

          if(!isset($_COOKIE['answers'])){
            setcookie("answers", serialize(array_fill(0, count($questions), "")), time() + 3600);
          }

          $beforeIndex = $_COOKIE['questionIndex'];

          if(isset($_POST['previous'])) {
            $id = $questions[$beforeIndex -2];
            $fetchqry = "SELECT * FROM `quiz` where id='$id'"; 
            $result=mysqli_query($con,$fetchqry);
            $num=mysqli_num_rows($result);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $_SESSION['answer'] = $row['ans'];
            setcookie("questionIndex", $currIndex - 1, time() + 3600);
            $beforeIndex -= 1;
          } else if ($currIndex < $_SESSION['rows'] && ($currIndex == 0 || isset($_SESSION['userAnswer'])) && !isset($_POST['previous'])) {
            $id = $questions[$currIndex];
            $fetchqry = "SELECT * FROM `quiz` where id='$id'"; 
            $result=mysqli_query($con,$fetchqry);
            $num=mysqli_num_rows($result);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $_SESSION['answer'] = $row['ans'];
            $beforeIndex += 1;
            setcookie("questionIndex", $currIndex + 1, time() + 3600);
          } else if ($currIndex < $_SESSION['rows']) {
            $id = $questions[$currIndex] -1 ;
            $fetchqry = "SELECT * FROM `quiz` where id='$id'"; 
            $result=mysqli_query($con,$fetchqry);
            $num=mysqli_num_rows($result);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          }

          if(!isset($_COOKIE['answers'])) {
            $currAnswer = "";
          } else {
             $currAnswer = unserialize($_COOKIE['answers'])[$beforeIndex -1 ];
          }
          echo $currAnswer;
      ?>
    
      <h3 id="question"><br><?php echo @$row['que'];?></h3> 

    <?php 
      if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < $_SESSION['rows'] + 1){ 
    ?>
      <div class="inputGroup">
        <input type="radio" class="input-test" name="userans" value="<?php echo $row['option 1'];?>" id="option1" <?php if(!empty($currAnswer) && $currAnswer == $row['option 1']) { echo "checked"; } ?> ><label class="lbl-test" for="option1"><?php echo $row['option 1']; ?></label>
      </div>
      <div class="inputGroup">
        <input type="radio" class="input-test" name="userans" value="<?php echo $row['option 2'];?>" id="option2" <?php if(!empty($currAnswer) && $currAnswer == $row['option 2']) { echo "checked"; } ?> ><label class="lbl-test" for="option2"><?php echo $row['option 2']; ?></label>
      </div>
      <div class="inputGroup">
        <input type="radio" class="input-test" name="userans" value="<?php echo $row['option 3'];?>" id="option3" <?php if(!empty($currAnswer) && $currAnswer == $row['option 3']) { echo "checked"; } ?> ><label class="lbl-test" for="option3"><?php echo $row['option 3']; ?></label>
      </div>
      <div class="inputGroup">
        <input type="radio" class="input-test" name="userans" value="<?php echo $row['option 4'];?>" id="option4" <?php if(!empty($currAnswer) && $currAnswer == $row['option 4']) { echo "checked"; } ?> ><label class="lbl-test" for="option4"><?php echo $row['option 4']; ?></label>
      </div>
      </div>
      <button class="btn-next" name="previous">Previous</button>
      <button class="btn-next" name="next">Next</button>
    </form>
    <?php 
      }
    }
    ?>


    <?php if(isset($_SESSION['rows']) && $_SESSION['clicks']>$_SESSION['rows']){ ?> 
     <h2>Result</h2>
     <h2>Correct Answers: </h2> 
     <?php
      $score=0;

      foreach (unserialize($_COOKIE['scoreArray']) as &$value) {
          if ($value == 1) {
            $score++;
          }
      }

      if($_POST['userans'] == $_SESSION['answer']) {
        $score++;
      }

      recordScore($score);
     ?>
     <h2>
      <?php echo $score; ?>
     </h2><br>
    <form class="sign-up-htm" name="back", id="back" method="post" onsubmit="send(event)">
       <input type="submit" class="button" value="Back" name="back">
    </form>

  </center>

  <?php }} else { ?>

  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
      <div class="login-form">

        <form class="sign-in-htm" name="login", id="login" method="post" onsubmit="send(event)">
          <div class="group">
            <label for="user" class="label">Username</label>
            <input id="username" name="username" type="text" class="input">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="password" name="password" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> Keep me Signed in</label>
          </div>
          <div class="group">
            <input type="submit" class="button" value="Sign In" name="signIn">
          </div>
          <div class="hr"></div>
        </form>

        <form class="sign-up-htm" name="register", id="register" method="post" onsubmit="send(event)">
          <div class="group">
            <label for="user" class="label">Username</label>
            <input id="username" name="username" type="text" class="input">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="password" name="password" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <label for="pass" class="label">Confirm Password</label>
            <input id="pass" name="confirm-password" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <input type="submit" class="button" value="Sign Up"  name="signUp">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <label for="tab-1">Already Member?</a>
          </div>
        </form>

      </div>
    </div>
  </div>

  <?php } ?>
</body>
</html>