<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- This page is for new accounts. when user has been detected that this account is new,
     The user will go to this page to setup the user's account and esp32 -->

    <!-- Tutorial -->
    <div class="w3-row input-box fadeThis">
            <input type="text" placeholder="First Name" name="fname" id="">
        </div>
        <div class="w3-row input-box fadeThis">
            <input type="text" placeholder="Last Name" name="lname" id="">
        </div>
    <!-- Step 1, Connect your esp32 to this account by:
            -connect your phone to esp32 wifi network
            -go to your browser and enter to this url : 127.0.0.1
            -enter your wifi ssid and password to connect the esp32 to the internet
            -entering the digital serial number prompt on this screen to your esp32. 
            -proceed to step 2     
            
            backend process when clicking step 2:
                check if esp32 is now connected to the user account by replying the esp32 the the webserver thru api (embedded). compare the DigiSN betweeen the two.
                    if the DigiSN between the device and account matched, generate and update the database of this user's UID. AFTER THAT, add the variable UID and the DigiSN to the serial preference.

                if it didnt matched, reload the current page url parameter and generate a new DigiSN.
                    
    -->

    <!-- Step 2, alright, device and the user's account is now connected. eto gagawin ko:
            Add your first fingerprint enrollment as the owner!
            Scan your fingerprint, this may take several times to complete. please only use one finger.
            
            after scanning is complete and it's successful, enter the owner's first and last name.

            CONGRATS DONE NA

            backend process when entering and loading the url parameter of step 2:
            in php page, make a function that'll activate the enroll fingerprint in the esp32. means having a variable that returns true so that the loop in the esp32 will turn on.
                NEXT: 
                javascript. yes. javascript (GO PRACTICE JAVASCRIPT U BRAINDEAD PHP USER)
                With javascript, it will fetch data from api directly to the esp32.
    -->
</body>
</html>