
<div class="top">
    <div>
        <input id="logButton" type="button" value="<?php getLoginStatus() ?>" onclick="openForm()">
    </div>

    <!-- https://www.w3schools.com/howto/howto_js_popup_form.asp -->
    <div class="form-popup" id="myForm" >
        <form action="reusable/login.php" class="form-container" method = "post">
            <h1>Login</h1>

            <label for="id"><b>User ID</b></label>
            <input type="text" placeholder="Enter User ID" name="id" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" >

            <button type="submit" class="btn" name="submit">Login</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <h1>Placeholder</h1>
</div>


<?php  echo "
    <script>
    function openForm() {
      document.getElementById('myForm').style.display = 'block';
    }

    function closeForm() {
      document.getElementById('myForm').style.display = 'none';
    }
    </script> ";


    function getLoginStatus(){
        if (isset($_SESSION['id']) && strlen($_SESSION['id'] > 0)) {
            echo "Logout";
        } else{
            echo "Login";
        }
    }
?>


<!-- Change Login/Logout button based on session status -->
<?php
    echo "
    <script type='text/javascript'>
        changeValue()
        function changeValue()
        {
            // if( isset() ){
                if(".json_encode($_SESSION['id'])."){
                    document.getElementById('logButton').value = 'Logout'
                    console.log('time to logout');
                }
                else {
                    document.getElementById('logButton').value = 'Login'
                    console.log('time to login');
                }
            // }
        }
    </script> ";
?>
