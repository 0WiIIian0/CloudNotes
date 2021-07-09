<?php 

include_once('../back-end/user/cookie.php');

//$_SESSION['user'] = 'James Smith';

if (!isset($_SESSION['user'])) {
    header('location: signup.php');
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
                            <button>Settings</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="noteList">
                <div class="noteItem">
                    <div class="noteInfo">
                        <div class="noteTitle">Note Title</div>
                        <div class="noteContentPreview">Note Sample Note Sample Note Sample Note Sample Note Sample...</div>    
                    </div>
                    <div class="noteOptions">
                        <img src="./assets/icon/edit.svg">
                        <img src="./assets/icon/trash.svg">
                    </div>
                </div>
            </div>
        </div>
        <div id="noteContent">
            Nenhuma nota selecionada
        </div>
    </div>
    <script src="./assets/js/elementManager.js"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>