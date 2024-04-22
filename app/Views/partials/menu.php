<!DOCTYPE html>
<html>
<head>
    <title>My Menu</title>
</head>
<body>
    <nav>
        <ul>
        <?php foreach ($arrayMenu as $menuItem): ?>
            <?= $menuItem ?>
        <?php endforeach; ?>
        </ul>
    </nav>
    
    <h1>Welcome to Our Website!</h1>
    <p>Thank you for visiting our website. We hope you find what you're looking for.</p>

</body>
</html>