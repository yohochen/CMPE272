
<div class="top">
    <div>
        <input id="logButton" type="button" value="Login" onclick="openForm()">
    </div>

    <!-- https://www.w3schools.com/howto/howto_js_popup_form.asp -->
    <div class="form-popup" id="myForm">
        <form action="reusable/login.php" class="form-container">
            <h1>Login</h1>

            <label for="id"><b>User ID</b></label>
            <input type="text" placeholder="Enter User ID" name="id" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" class="btn">Login</button>
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
?>
