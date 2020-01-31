<?php

?>
<h1>Se Connecter</h1>
<form action="/connect" method="post">
    <div class="imgcontainer">
        <img src="" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit"class="btn btn-primary">Login</button>

    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="submit" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>