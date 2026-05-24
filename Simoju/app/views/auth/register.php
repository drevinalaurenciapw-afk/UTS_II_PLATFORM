<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register User</h2>

<form method="POST">

    Nama <br>
    <input type="text"
           name="nama"
           required>

    <br><br>

    Email <br>
    <input type="email"
           name="email"
           required>

    <br><br>

    Password <br>
    <input type="password"
           name="password"
           required>

    <br><br>

    <button type="submit">
        Register
    </button>

</form>

<br>

<a href="/simoju/public/AuthController/login">
    Sudah punya akun?
</a>

</body>
</html>