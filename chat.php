<?php
    session_start();
    include("database_con.php");

    if(empty($_SESSION['user_id'])){
        header("location:login.php");
        exit();
    }
    $userType = $_GET['user_type'];
    $id = $_GET['id'];
    
    if($userType === "docteur" && $_SESSION['user_type']==='utilisateur'|| $userType === "docteur" && $_SESSION['user_type']==="docteur"){
        $request ="SELECT * FROM paiement WHERE userid=? and user_type=?";
        $stmt = mysqli_prepare($db, $request);
        mysqli_stmt_bind_param($stmt, "ss",$_SESSION['user_id'],$_SESSION['user_type']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            die("Query failed: " . mysqli_error($db));
        }
        $payments = $result->fetch_assoc();
        if($result->num_rows == 0){
          header("location:payment.php?id=$id");
          exit();
        }
    }

    // validate or sanitize $userType and $id before using them in the query
    
    $query = "SELECT * FROM {$userType} WHERE {$userType}.id = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
?>
<html>
    <head>

        <!-- on doit avoir le jquery pour travailler avec ajax -->
        <link rel="stylesheet" href="style-chat.css">
    </head>
<body>
    <!-- form d'envoie de message -->
    <div class="chat-global">

<div class="nav-top">
    <div class="location">
        <a href="index.php">
        <img src="img/left-chevron.svg">
        </a>
    </div>

    <div class="utilisateur">
        <p><?php echo $user['nom']." ".$user['prenom'];?></p>
        <p><?=$user['statue']?></p>
    </div>

    <div class="logos-call">
        <img alt="">
        <img alt="">
    </div>
</div>

<div class="conversation" id="conversation">
    
</div>


<form class="chat-form" id="chat-form" enctype='multipart/form-data'>

    <div class="container-inputs-stuffs">

        <div class="files-logo-cont">
            <label for="file"><img src="img/paperclip.svg"></label>
            <input type="file" name="file" id="file">
        </div>

        <div class="group-inp">
            <textarea id="message" placeholder="ecrire message" minlength="1" maxlength="1500"></textarea>
            
        </div>

        <button type="submit" class="submit-msg-btn">
            <img src="img/send.svg">
        </button>
    </div>

</form>
</div>

<script src="jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            function loadMessages() {
                $.ajax({
                url: "load_messages_user.php",
                type: "POST",
                data: {to_id:<?php echo $_GET['id'];?>,
                    to_type: "<?php echo $_GET['user_type'];?>",},
                dataType: "json",
                success: function(data) {
                    if(data.message != undefined || data.message != null){
                    }
                    var chatWindow = document.getElementById("conversation");
                    chatWindow.innerHTML = "";
                    for (var i = 0; i < data.length; i++) {
                        var message = data[i];
                        var chatMessage = document.createElement("div");
                        chatMessage.classList = "messages";
                        if(message.sender === <?php echo $_SESSION['user_id']; ?>) {
                            chatMessage.classList = "talk right";
                        }
                        else {
                            chatMessage.classList = "talk left";
                        }

                        if(message.file_name !== null){
                            chatMessage.innerHTML = "<p>"+ message.message + message.download_link+ "</p>";
                        }else{
                            chatMessage.innerHTML = "<p>"+ message.message+ "</p>";
                        }
                        chatWindow.appendChild(chatMessage);
                    }
                },complete: function() {
                        setTimeout(loadMessages, 1000);
                    },timeout: 30000 // set a timeout of 30 seconds
                });
            }
            // start the long poll
            loadMessages();
            // fonction d'envoie de message
            $("#chat-form").submit(function(event) {
                event.preventDefault();
                var message = $("#message").val();
                if(message != undefined || message == null){
                    var form_data = new FormData();
                    form_data.append("message",message);
                    form_data.append("to_id",<?php echo $_GET['id'];?>);
                    form_data.append("to_type","<?php echo $_GET['user_type'];?>");
                    var file;
                    if($("#file")[0].files[0] != undefined){
                        file = $("#file")[0].files[0]
                    }else{
                        file = null;
                    }
                    form_data.append("file",file)
                    for (var pair of form_data.entries()) {
                        console.log(pair[0]+ ', ' + pair[1]); 
                    }
                    $.ajax({
                        url: "send_message.php",
                        method: "POST",
                        data: form_data,
                        processData:false,
                        contentType:false,
                        success: function(response) {
                            $("#file").val("");
                            $("#message").val("");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>