<?php
// echo "<h4>Hello ". $scope["email"] .", howayou?</h4>";
echo $_SESSION["id"];
?>
<form method="post">
    <label for="">Update email</label>
    <input type="email" name="" id="">
    <input type="submit" name="updateEmail">
</form>

<form method="post">
    <label for="">logout</label>
    <input name="logout" type="submit" value="Ok">
</form>

<form action="delete" method="post">
    <label for="">Delete</label>
    <input name="delete" type="submit" value="Ok">
</form>

<?php
if (isset($_POST["updateEmail"])) {
    $this->update();
}
if (isset($_POST["logout"])) {
    $this->logout();
}
// if (isset($_POST["delete"])) {
//     $this->delete($_SESSION["id"]);
// }
