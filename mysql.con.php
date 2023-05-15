<?php
/*
首先，创建一个PDO对象，并使用数据库的主机名、名称、用户名和密码来连接到MySQL数据库。
然后，设置PDO对象的错误模式为异常，这样如果发生错误，就会抛出一个PDOException对象。
接着，准备一个SQL语句，用冒号表示参数占位符。这样可以防止SQL注入攻击，因为参数会被自动转义和引用。
然后，绑定$_POST数组中的用户名和密码到SQL语句中的占位符。$_POST数组是一个超全局变量，它包含了通过HTTP POST方法传递的表单数据。
接着，执行SQL语句，并返回一个PDOStatement对象。这个对象可以用来获取查询结果。
然后，设置PDOStatement对象的返回结果模式为关联数组。这样可以用列名作为数组的键来访问结果。
接着，获取返回结果并转换为JSON数据。json_encode()函数可以将PHP值转换为JSON格式的字符串。
最后，输出JSON数据。echo语句可以将字符串发送到浏览器或其他客户端。
*/
// 创建PDO对象并连接到MySQL数据库
$pdo = new PDO("mysql:host=localhost;dbname=test", "root", "password");
// 设置错误模式为异常
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 准备SQL语句，用冒号表示参数占位符
$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
$stmt = $pdo->prepare($sql);
// 绑定参数到占位符
$stmt->bindParam(":username", $_POST["username"]);
$stmt->bindParam(":password", $_POST["password"]);
// 执行SQL语句
$stmt->execute();
// 设置返回结果的关联数组模式
$stmt->setFetchMode(PDO::FETCH_ASSOC);
// 获取返回结果并转换为JSON数据
$result = $stmt->fetch();
$json = json_encode($result);
// 输出JSON数据
echo $json;
?>
