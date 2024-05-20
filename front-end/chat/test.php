<?php
$title = 'Test';
require_once '../includes/head.php';
require_once '../script.php';
require_once 'chat_script.php';

session_start();
$_SESSION['id_partie'] = 1;

?>

<div>
    <script>
        displayChat()
        scrollDown();
    </script>
</div>


<div class="row border border-black bg-body-secondary w-25">
    <h2 class="m-3">Chat</h2>
    <div class="bg-body-tertiary d-flex flex-column overflow-auto" id="chatResult" style="height:80vh"> <!-- Box du chat --></div>
    <div class="d-flex flex-row m-2">
        <textarea id="chatInput" class="form-control me-2" placeholder="Message" style="resize:none"></textarea>
        <button class="btn btn-primary" onclick="sendChat()">Envoyer</button>
    </div>
    <script>
        setInterval(displayChat, 1000);
    </script>
</div>