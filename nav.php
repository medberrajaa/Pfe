


<body>


<nav class=" cc-navbar navbar navbar-expand-lg position-fixed  navbar-dark w-100 ">
      <div class="container-fluid">
        <a class="navbar-brand text_uppercase fw-bolder mx-4 py-3" href="#">psycho.ma</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item pe-4">
              <a class=" btn  " aria-current="page" href="index.php">HOME</a>
            </li>
            <li class="nav-item pe-4">
              <a class=" btn  " href="#">FAQ</a>
            </li>
            
            <li class="nav-item pe-4">
              <a class="  btn " href="forum_page.php">FORUM</a>
            </li>
            <li class="nav-item pe-4">
              <a class="  btn " href="forum_page.php">CONTACTEZ_NOUS</a>
            </li>
            <?php
              session_start();
              if(isset($_SESSION['user_id'])){
                ?>
                    
                <li class="nav-item pe-4">
                  <a class="btn btn-order rounded-0" href="logout.php ">deconnexion</a>
                </li>

                <?php
              }else{

            ?>
            <li class="nav-item pe-4">
              <a class="btn btn-order rounded-0" href="login.php ">connexion</a>
            </li>
            <?php
              }
            ?>
          </ul>
          
        </div>
      </div>
    </nav> <n
            </body>