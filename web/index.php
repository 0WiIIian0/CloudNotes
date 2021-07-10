<?php 

session_start();

if (!isset($_SESSION['user'])) {
    header('location: user.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link type="text/css" rel="stylesheet" href="./assets/css/styles.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/elementManager.css">
    <title>CloudNote</title>
</head>
<body>
    <div id="root">
        <div id="leftBox">
            <div id="leftBoxTop">
                <div id="userBox">
                    <label for="profilePictureImg">
                        <div id="profilePictureIcon">
                            <img id="profilePicture" src="./assets/icon/user.svg">
                            <div id="editProfilePicture">Edit</div>
                        </div>
                    </label>
                    <input type="file" id="profilePictureImg" name="profilePictureImg" accept="image/png, image/jpeg">
                    <div id="userInfo">
                        <div id="userName"><?php echo $_SESSION['user']; ?></div>
                        <div id="userOptions">
                            <button id="logoffButton">Logoff</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="noteList">
                
            </div>
        </div>
        <div id="noteContent">
            <div id="noteContentHeader">
                <div id="mobileMenu">
                    <div class="mobileMenuIconLine"></div>
                    <div class="mobileMenuIconLine"></div>
                    <div class="mobileMenuIconLine"></div>
                </div>
                <div id="currentNoteTitle"></div>
            </div>
            <div id="currentNoteText"></div>
        </div>
    </div>
    <div id="addNoteButton">
        <div class="addNoteButtonLine"></div>
        <div class="addNoteButtonLine"></div>
    </div>
    <div id="addNoteModalBackground">
        <form id="addNoteModal">
            <h2>New Note</h2>
            <input id="newNoteTitle" class="noteTitleInput" type="text" placeholder="Title">
            <textarea id="newNoteText" class="noteTextInput" placeholder="Note Content"></textarea>
            <div class="formButtonBox">
                <button id="cancelModalButton">Close</button>
                <button id="sendNoteButton">Send</button>
            </div>
        </form>
    </div>
    <script src="./assets/js/ajax.js"></script>
    <script src="./assets/js/noteElement.js"></script>
    <script src="./assets/js/elementManager.js"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>