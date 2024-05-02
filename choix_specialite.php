<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>choix docteur</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/css/choix_specialite.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link href="./styles/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="./styles/css/style.css" rel="stylesheet">
    </head>
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
                      <a class="  btn " href="forum_page.php">FORUM</a>
                    </li>
                  <li class="nav-item pe-4">
                      <a class="  btn " href="contactez_nous.php">CONTACTEZ-NOUS</a>
                  </li>
                    <li class="nav-item pe-4">
                      <a class=" btn  " href="faq.php">FAQ</a>
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
          </nav> 
        <section class="choix_docteur d-flex justify-cotente-center align-items-center pt-5  ">
            <div class="container my-5 py-5">
              <div class="row">
                <div class="col-md-6"></div>
        
        <div class = "main-container">
            <h2>specialités</h2>
            <p>consultation a porter de main.</p>
            <div class = "filter-container">
                <div class = "category-head">
                    <ul>
                      
                        <div class = "category-title" id = "psychologue">
                            <li>psychologue</li>
                            <span><i class = "fas fa-theater-masks"></i></span>
                        </div>
                        <div class = "category-title" id = "Psychotérapeute">
                            <li>Psychotérapeute</li>
                            <span><i class = "fas fa-landmark"></i></span>
                        </div>
                        <div class = "category-title" id = "sommeil">
                            <li>sommeil</li>
                            <span><i class = "fas fa-chart-area"></i></span>
                        </div>
                        <div class = "category-title" id = "nutrition">
                            <li>nutrition</li>
                            <span><i class = "fas fa-coins"></i></span>
                        </div>
                        
                    </ul>
                </div>

                <div class = "posts-collect">
                    <div class = "posts-main-container">
                          <!-- single post -->
                          <div class = "all psychologue">
                            <div class = "post-img">
                                <img src = "styles/images/confiance.jpeg" alt = "post">
                                <span class = "category-name">psychologue</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                   
                                </div>
                                <h2>confiance en soi</h2>
                                <p>nous vous aidront a retrouver votre confiance en soi </p>
                            </div>
                            <a href="choix_docteur.php?specialite=confiance"><button type = "button" class = "read-btn">PARCOURIR</button></a>
                        </div>
                        <!-- end of single post -->
                        
                
                        <!-- single post -->
                        <div class = "all psychologue">
                            <div class = "post-img">
                                <img src = "styles/images/deuil.jpg" alt = "post">
                                <span class = "category-name">psychologue</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                   
                                </div>
                                <h2>deuil</h2>
                                <p>nous vous aidront a surmonter la perte d'un proche</p>
                            </div>
                            <a href="choix_docteur.php?specialite=Deuil"><button type = "button" class = "read-btn">PARCOURIR</button></a>
                        </div>
                        <!-- end of single post -->
                        <!-- single post -->
                        <div class = "all psychologue">
                            <div class = "post-img">
                                <img src = "styles/images/addiction.webp" alt = "post">
                                <span class = "category-name">psychologue</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                   
                                </div>
                                <h2>addiction</h2>
                                <p> nous vous aidront a vous passer d'une mauvaise addiction </p>
                            </div>
                            <a href="choix_docteur.php?specialite=addiction"><button type = "button" class = "read-btn">PARCOURIR</button></a>
                        </div>
                        <!-- end of single post -->
                        <!-- single post -->
                        <div class = "all psychologue">
                            <div class = "post-img">
                                <img src = "styles/images/anxiété.jpeg" alt = "post">
                                <span class = "category-name">psychologue</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                   
                                </div>
                                <h2>anxiété</h2>
                                <p></p>
                            </div>
                            <a href="choix_docteur.php?specialite=anxiété"><button type = "button" class = "read-btn">PARCOURIR</button></a>
                        </div>
                        <!-- end of single post -->
                        <!-- single post -->
                        <div class = "all psychologue">
                            <div class = "post-img">
                                <img src = "styles/images/stresse.webp" alt = "post">
                                <span class = "category-name">psychologue</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                   
                                </div>
                                <h2>stress</h2>
                                <p></p>
                            </div>
                            <a href="choix_docteur.php?specialite=stress"><button type = "button" class = "read-btn">PARCOURIR</button></a>
                        </div>
                        <!-- end of single post -->
                        <!-- single post -->
                        <div class = "all psychologue">
                            <div class = "post-img">
                                <img src = "styles/images/th.jpg" alt = "post">
                                <span class = "category-name">psychologue</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                   
                                </div>
                                <h2>depression</h2>
                                <p></p>
                            </div>
                            <a href="choix_docteur.php?specialite=Depression"><button type = "button" class = "read-btn">PARCOURIR</button></a>
                        </div>
                        <!-- end of single post -->
                        <!-- single post -->
                        <div class = "all psychologue">
                            <div class = "post-img">
                                <img src = "styles/images/burnout.webp" alt = "post">
                                <span class = "category-name">psychologue</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                   
                                </div>
                                <h2>burnout</h2>
                                <p></p>
                            </div>
                            <a href="choix_docteur.php?specialite=burnout"><button type = "button" class = "read-btn">PARCOURIR</button></a>
                        </div>
                        <!-- end of single post -->
                        <!-- single post -->
                        <div class = "all psychologue">
                            <div class = "post-img">
                                <img src = "styles/images/couple" alt = "post">
                                <span class = "category-name">psychologue</span>
                            </div>

                            <div class = "post-content">
                                <div class = "post-content-top">
                                   
                                </div>
                                <h2>probléme de couple</h2>
                                <p></p>
                            </div>
                            <a href="choix_docteur.php?specialite=probléme_couple"><button type = "button" class = "read-btn">PARCOURIR</button></a>
                        </div>
                        <!-- end of single post -->
              <!-- FIN PSYCHO -->
              <div class = "all Psychotérapeute">
                <div class = "post-img">
                    <img src = "styles/images/cognitive" alt = "post">
                    <span class = "category-name">Psychotérapeute</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>Thérapie cognitivo-comportementale</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=cognitive"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- single poste -->
            <div class = "all Psychotérapeute">
                <div class = "post-img">
                    <img src = "styles/images/psychoterapie.webp" alt = "post">
                    <span class = "category-name">Psychotérapeute</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>Psychothérapie</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=psychothérapie"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
            <!-- single poste -->
            <div class = "all Psychotérapeute">
                <div class = "post-img">
                    <img src = "styles/images/psychanalyse.webp" alt = "post">
                    <span class = "category-name">Psychotérapeute</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>Psychanalyse</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=psychanalyse"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
            <!-- single poste -->
            <div class = "all Psychotérapeute">
                <div class = "post-img">
                    <img src = "styles/images/couple " alt = "post">
                    <span class = "category-name">Psychotérapeute</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>Thérapie de couple</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=thérapie_de_couple"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
            <!-- single poste -->
            <div class = "all Psychotérapeute">
                <div class = "post-img">
                    <img src = "styles/images/travaillepsycho.jpg " alt = "post">
                    <span class = "category-name">Psychotérapeute</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>Psychologie du travail</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=psychologie_du_travail"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
            <!-- single poste -->
            <div class = "all Psychotérapeute">
                <div class = "post-img">
                    <img src = "styles/images/clinique.jpg" alt = "post">
                    <span class = "category-name">Psychotérapeute</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>Psychologie clinique</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=clinique"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
             <!-- single poste -->
             <div class = "all sommeil">
                <div class = "post-img">
                    <img src = "styles/images/améliorer-son-sommeil.jpg" alt = "post">
                    <span class = "category-name">sommeil</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>améliorer son sommeil</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=sommeil"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
             <!-- single poste -->
             <div class = "all sommeil">
                <div class = "post-img">
                    <img src = "styles/images/insomnia976.jpg" alt = "post">
                    <span class = "category-name">sommeil</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>probléme lié au sommeil</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=sommeil"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
            <!-- single poste -->
            <div class = "all nutrition">
                <div class = "post-img">
                    <img src = "styles/images/ths-prise-de-poids.jpeg" alt = "post">
                    <span class = "category-name">nutrition</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>perte de poids</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=nutrition"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
             <!-- single poste -->
             <div class = "all nutrition">
                <div class = "post-img">
                    <img src = "styles/images/pertepoiids.webp" alt = "post">
                    <span class = "category-name">nutrition</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>prise de poids</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=nutrition"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
            <!-- single poste -->
            <div class = "all nutrition">
                <div class = "post-img">
                    <img src = "styles/images/trouble-alimentaire.jpg" alt = "post">
                    <span class = "category-name">nutrition</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>trouble de l'alimentation</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=nutrition"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
             <!-- single poste -->
             <div class = "all nutrition">
                <div class = "post-img">
                    <img src = "styles/images/Annorexie.webp" alt = "post">
                    <span class = "category-name">nutrition</span>
                </div>

                <div class = "post-content">
                    <div class = "post-content-top">
                       
                    </div>
                    <h2>anorixie</h2>
                    <p></p>
                </div>
                <a href="choix_docteur.php?specialite=nutrition"><button type = "button" class = "read-btn">PARCOURIR</button></a>
            </div>
            <!-- end post -->
                    </div>
                </div>
            </div>
        </div>
    </section>
        

        <!-- JS file -->
        <script src = "styles/js/choix_specialite.js"></script>
    </body>
</html>