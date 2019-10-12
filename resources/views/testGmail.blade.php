
<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body>
    <form action="testGmail" method="post">
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="textarea" name="comment">
        <button type="submit"> Send</button>
    </form>
</body>
</html>