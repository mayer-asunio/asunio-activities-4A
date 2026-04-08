<!DOCTYPE html>
<html>
<head>
    <title>Order Details View</title>
</head>
<body>

<h2>Order Details View</h2>

<form>
    Trans No: <input type="text" value="{{ $transNo }}"><br><br>
    Order No: <input type="text" value="{{ $orderNo }}"><br><br>
    Item ID: <input type="text" value="{{ $itemId }}"><br><br>
    Name: <input type="text" value="{{ $name }}"><br><br>
    Price: <input type="text" value="{{ $price }}"><br><br>
    Qty: <input type="text" value="{{ $qty }}"><br><br>
</form>


</body>
</html>
