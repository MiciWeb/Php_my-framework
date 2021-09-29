<?= "Hello " . $_SESSION["email"]; ?>
<form method="post" action="show">
    <label for="">Update email</label>
    <input type="email" name="email" id="">
    <label for="">Update password</label>
    <input type="password" name="password" id="">
    <input type="submit" name="submit">
</form>

<form action="delete" method="post">
    <label for="">Delete</label>
    <input name="delete" type="submit" value="Ok">
</form>

<h3><a href="movie">See movies</a></h3> 