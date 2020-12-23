
      <!-- multicolor -------------------------------------------------------------------------------->

    <!--<div class="js-pride-month-gradient" style="width: 100%; height: 0.6rem; background: rgba(0, 0, 0, 0) linear-gradient(90deg, rgb(100, 91, 83) 0%, rgb(235, 82, 82) 18.23%, rgb(247, 143, 47) 34.37%, rgb(244, 193, 81) 48.96%, rgb(82, 187, 118) 66.15%, rgb(38, 165, 215) 82.29%, rgb(224, 105, 183) 100%) repeat scroll 0% 0%;">
    </div>-->
    <!-- navigation bar-------------------------------------------------------------------------------->

    <div class="navigation">
      <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #34ace0; width: 100%;" >
        <a class="navbar-brand"  href="index.php">
            <img src="img/logo.png" width="135px" height="43px"  alt="LearnEd" style="padding-left: 25px;padding-bottom: 7px;">
        </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" >

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;padding-right: 25px;padding-left:25px;">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                echo view_cat();
                ?>
              </div>
              </li>

              <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
                  <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search" aria-label="Search" style="width: 490px;" value="<?php if(isset($_GET["s"])){echo $_GET["s"]; }?>">
                  <button class="btn btn-outline-light my-2 my-sm-0" type="submit" style="padding-left: 30px; padding-right: 30px;">Search</button >
              </form>

              <li class="nav-item">
                <a  class="nav-link" href="mycourses.php" style="color: white;padding-left: 20px; padding-right: 20px;">My Courses</a>
              </li>

                          </ul>
            <ul class="navbar-nav mr-auto" >

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle user-profile" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;margin-right: 55px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <div><?php echo $_SESSION["fname"]." ".$_SESSION["lname"]?></div></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Log out</a>
              </div>
              </li>              
            </ul>
          </div>
       </nav>
    </div>
