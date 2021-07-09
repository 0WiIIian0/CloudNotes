(() => {

    let noteInfo = document.getElementsByClassName('noteInfo')[0];
    let logoffButton = document.getElementById('logoffButton');
    let profilePictureIcon = document.getElementById('profilePictureIcon');

    let profilePicture = document.getElementById('profilePicture');
    let profilePictureImg = document.getElementById('profilePictureImg');

    elementManager.setDefaultMethods(noteInfo);
    elementManager.setDefaultMethods(logoffButton);
    elementManager.setDefaultMethods(profilePictureIcon);


    noteInfo.setRipple('#999999');
    logoffButton.setRipple('#999999');
    profilePictureIcon.setRipple('#999999');

    profilePictureImg.onchange = (e) => {

        let fileReader = new FileReader();

        fileReader.onload = (data) => {
            profilePicture.src = data.target.result;
        }

        fileReader.readAsDataURL(profilePictureImg.files[0]);

    }

    logoffButton.onclick = () => {
        window.location.href = 'logoff.php';
    }

})();