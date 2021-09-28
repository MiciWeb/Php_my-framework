<h4>Register form:</h4>
<form method="post" action="register">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" name="submit" value="Ok">
</form>
<br>
<h4><a href="login">Click here to log in</a></h4>
<?php
if (isset($message)) {
    echo "<h3>" . $message . "</h3>";
}