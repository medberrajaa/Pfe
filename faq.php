<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAQ</title>
    <link rel="stylesheet" href="style.css" />
    <link href="./styles/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./styles/css/style.css" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>

        @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: "Roboto", sans-serif;
    }
    
    .wrapper {
      max-width: 20 %;
      margin: auto;
    }
    
    .wrapper > p,
    .wrapper > h1 {
      margin: 1.5rem 0;
      text-align: center;
    }
    
    .wrapper > h1 {
      letter-spacing: 3px;
     
    }
    
    .accordion {
      background-color: lightblue;
      color: rgba(0, 0, 0, 0.8);
      cursor: pointer;
      font-size: 1.2rem;
      width: 30%;
      padding: 2rem 2.5rem;
      border: none;
      outline: none;
      transition: 0.4s;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: bold;
    }
    
    .accordion i {
      font-size: 1.6rem;
    }
    
    .active,
    .accordion:hover {
      background-color: #f1f7f5;
    }
    .pannel {
      padding: 0 2rem 2.5rem 2rem;
      background-color: white;
      overflow: hidden;
      background-color: #f1f7f5;
      display: none;
    }
    .pannel p {
      color: rgba(0, 0, 0, 0.7);
      font-size: 1.2rem;
      line-height: 1.4;
    }
    
    .faq {
      border: 1px solid rgba(0, 0, 0, 0.2);
      margin: 10px 0;
    }
    .faq.active {
      border: none;
    }
    </style>

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
              <a class=" btn  " href="#">FAQ</a>
            </li>
            
            <li class="nav-item pe-4">
              <a class="  btn " href="forum_page.php">FORUM</a>
            </li>
            <li class="nav-item pe-4">
              <a class="  btn " href="contactez_nous.php.php">CONTACTEZ-NOUS</a>
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

    
    <section class="wrapper d-flex justify-cotente-center align-items-center pt-5  ">
      <div class="container my-5 py-5">
        <div class="row">
          <div class="col-md-6"></div>
     
      <h1>Comment ça marche ?</h1>

      <div class="faq">
        <button class="accordion">
        Création d'un compte
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
          Vous  souhaitez nous rejoindre ? Il vous suffit de nous contactez par email.

. Nous vérifierons simplement votre identité et votre droit d'exercer le métier de psychologue. Vous aurez ensuite la possibilité de choisir l'offre qui correspond le mieux à votre activité, suite à cela un membre de notre équipe vous contactera pour un entretien préalable à la finalisation de votre inscription, et pour vous souhaiter la bienvenue parmi nous.
          </p>
        </div>
      </div>

      <div class="faq">
        <button class="accordion">
        Gestion de compte : rendez-vous, planning
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
          <b>Je suis psychologue</b><br>
          <br>
          <b>Modification de mes informations :</b><br>
          Il vous est à tout moment possible de modifier vos coordonnées (adresse e-mail, mot de passe)<br>
          Pour cela, veuillez vous connecter, puis vous rendre sur Mon compte.<br>
         <b> Je souhaite avoir accès à mon planning</b><br>
         Pour avoir accès à votre planning, connectez-vous, puis rendez-vous sur Modifier mon cabinet.<br>
         <b>Je souhaite contacter un patient</b><br>
         Pour contacter un de vos patients, connectez-vous, puis veuillez vous rendre sur votre Messagerie.<br>
         La liste des patients qui vous ont déjà contacté/consulté apparaîtra, il vous suffira alors de cliquer sur un des patients affichés pour que votre messagerie partagée s'affiche.<br>
         <br>
         <b>Je suis patient </b>
         <br>
         <b>Modification de mes informations :</b><br>
          Il vous est à tout moment possible de modifier vos coordonnées (adresse e-mail, mot de passe)<br>
          Pour cela, veuillez vous connecter, puis vous rendre sur Mon compte.<br>
          <b>Je souhaite contacter un(e) spécialiste</b>
          Pour contacter un(e) spécialiste, connectez vous, puis :<br>
          Si vous n'avez pas encore de spécialiste :<br>
          Veuillez renseigner vos besoins afin que nous vous aidions à trouver le spécialiste qui correspond à vos critères demandés. Cliquez sur le profil du psychologue que vous souhaitez contacter, puis cliquez sur "Envoyer un message". Une messagerie partagée s'affichera. Cliquez sur le profil du psychologue que vous souhaitez contacter, puis cliquez sur "Envoyer un message". Une messagerie partagée s'affichera.

         
    
          </p>
        </div>
      </div>
      
      <div class="faq">
        <button class="accordion">
        Paiements
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
          <b>Comment payer une consultation ?</b><br>
          <br>
Lorsque vous prenez un rendez-vous auprès d'un(e) psychologue, il vous sera demandé de pré-payer la séance. Le paiement ne sera ensuite confirmé et encaissé qu'une fois que la séance aura bien été déclarée comme « effectuée » par le psychologue.
        </div>
      </div>
      <div class="faq">
        <button class="accordion">
        Notification  : Email
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
           <b>Quels mails vais-je recevoir ?</b><br>
           Afin de faciliter votre utilisation de notre plateforme et de vous assurer de ne manquer aucune information importante, vous recevrez, dans tous les cas, un mail dans les situations suivantes :<br>

               - Un psychologue vous envoie un message<br>
               - Un psychologue accepte un rendez-vous<br>
               - Un psychologue refuse un rendez-vous<br>
               - Un psychologue annule un rendez-vous<br>
               - Un psychologue déplace un rendez-vous<br>
              Il est possible que vous receviez d'autres mails , afin de vous inviter à nous donner vos avis et suggestions. Ces mails seront ponctuels et occasionnels uniquement, et ne vous proposeront jamais de souscrire à une quelconque offre commerciale.<br>
              <b>Je n'ai pas reçu d'email</b><br>
              l est possible que nos mails atterrissent malencontreusement dans vos spams (courriers indésirables) ou dans la rubrique « promotion », nous vous invitons alors à les rendre « légitimes » afin de ne rater aucune information importante pour vous.<br>

Si malgré cela, vous n'avez toujours pas reçu un mail, veuillez nous contacter depuis notre formulaire de contact.
        </div>
      </div>


      <div class="faq">
        <button class="accordion">
          prendre un rendez_vous
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
         
          <b>Comment prendre rendez-vous ?</b><br>
          <br>
Vous pouvez prendre rendez-vous avec nos spécialiste après avoir renseigné vos besoins, qui nous permettrons de vous présenter les psychologues qui correspondent à vos critères (spécialité, créneaux de disponibilité, sexe, etc.).<br>

-Cliquez sur le profil du spécialiste que vous souhaitez consulter, puis cliquez sur "Prendre rendez-vous". Notez que vous pouvez contacter gratuitement un(e) psychologue en cliquant sur "Envoyer un message".
Si vous avez déjà votre psychologue :<br>
-Une fois connecté, vous trouverez votre spécialiste affiché sur votre tableau de bord, il vous sera alors possible de prendre rendez-vous avec lui, de rédiger un avis ou d'ouvrir votre messagerie partagée.<br>
          <b>Si vous avez déjà votre psychologue :</b><br>
-Une fois connecté, vous trouverez votre psychologue affiché sur votre tableau de bord, il vous sera alors possible de prendre rendez-vous avec lui, de rédiger un avis ou d'ouvrir votre messagerie partagée.
<b>Utiliser le filtre de recherche</b><br>
Une fois connecté(e), vous aurez la possibilité de renseigner vos besoins afin de filtrer les psychologues affichés en fonction de leur spécialités (dépression, anxiété, stress, couple, etc), en fonction de leur créneaux de disponibilités, en fonction des types de consultations qu'ils utilisent (vidéo, tchat, téléphone), ou encore en fonction de leur sexe.<br>

Une fois votre psychologue choisi, vous pourrez cliquer sur son profil pour avoir plus d'informations sur son profil et son travail, et pourrez alors le(a) contacter gratuitement et prendre rendez-vous.
          </p>
        </div>
      </div>

      <div class="faq">
        <button class="accordion">
        Sécurité et confidentialité
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
         <b> Confidentialité de vos données</b><br>
         <br>
Toutes vos données personnelles sont chiffrées et cryptées, et ne sont connues que par le patient et son psychologue.<br>

Les échanges entre un patient et son spécialiste sont confidentiels et ne sont connus que par le patient et son spécialiste. Le spécialiste est tenu au secret professionnel.<br>

Pour le système de paiement, on a recours à un service de paiements sécurisé tiers permettant le paiement des consultations en toute sécurité.<br>
<b>Conseils de sécurité</b>
Voici quelques conseils sécurité afin de protéger vos données et votre compte :<br>

-Choisissez un mot de passe complexe (majuscule, chiffres, caractères spéciaux, 8 caractères minimum)<br>
_Ne laissez pas votre cession Psy n You connectée et ouverte en votre absence<br>
_Tâchez de vous connecter sur Psy n You uniquement avec vos outils personnels.<br>
_Tâchez d'éviter de vous connecter sur Psy n You avec une wifi public (aéroports, restaurants)<br>
          </p>
        </div>
      </div>
      <div class="faq">
        <button class="accordion">
        Comment les spécialiste sont-ils recrutés ?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
         <b> Nos critères de recrutement</b><br>
            ON n'accepte l'inscription d'un spécialiste qu'après vérification de son diplôme lui donnant droit d'exercer le doméne dans le quel il est spécialiser, et vérification de son enregistrement au répertoire national.<br>

             S'ensuivent un entretien personnel avec chacun d'eux/elles afin de nous assurer de leur sérieux, ainsi que de leurs parcours professionnels et universitaires.<br>
          </p>
        </div>
      </div>
      <div class="faq">
        <button class="accordion">
        À propos  : contact, infos
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
         <b> Nous contacter</b><br>
Envoyez-nous un message sur la page contact.<br>

<b>Qui sommes-nous ?</b><br>
Psycho.Ma est une plateforme qui a pour objectif de démocratiser la psychologie et d'autre spécialité.<br>

Sur notre site, vous aurez donc la possibilité de prendre contact et rendez-vous en ligne et en quelques clics avec un(e) psychologue ou autres, le tout en parfait anonymat, confidentialité et sécurité.<br>

Il vous sera alors possible de consulter à partir de 39 € la séance, et ce par vidéo, tchat ou téléphone.<br>

Psycho.ma propose aussi aux psychologues et autres un outil informatique entièrement autonome et complet leur permettant de digitaliser leur pratique et ainsi étendre leur activité libérale.<br>

Notre ambition est de toujours nous améliorer pour répondre le mieux possible aux besoins des patients et des psychologues, et ainsi permettre une psychologie de qualité, accessible à tous et pour tous.
          </p>
        </div>
      </div>
      <div class="faq">
        <button class="accordion">
        Problèmes divers
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
          <b>Problème technique</b><br>
              Envoyez-nous un message sur la page contact.<br>

          <b>Autres problèmes</b><br>
            Envoyez-nous un message sur la page contact.

          </p>
            </div>
            </div>

            </section>

    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          this.parentElement.classList.toggle("active");

          var pannel = this.nextElementSibling;

          if (pannel.style.display === "block") {
            pannel.style.display = "none";
          } else {
            pannel.style.display = "block";
          }
        });
      }
    </script>
  </body>
</html>
