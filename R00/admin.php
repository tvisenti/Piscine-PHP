<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<title>Admin</title>
		<style>
		body {
			font-family: 'Raleway', sans-serif;
			font-size: 20px;
		}
		input {
			width: 300px;
			border-radius: 10px;
			height: 50px;
			font-size: 15px;
			border:1px solid #d2a479;
			outline: 0;
			margin-bottom: 30px;
		}
		select {
				width: 50px;
				border-radius: 10px;
				height: 50px;
				font-size: 15px;
				border:1px solid #d2a479;
				outline: 0;
				margin-bottom: 30px;
				margin-top: 10px;
			}
			input[type=submit] {
				background-color: #e6ccb3;
				margin-top: 20px;
			}
			input[type=text],
			input[type=password] {
				font-family: 'Raleway', sans-serif;
				margin-top: 20px;
				padding-left: 20px;
                outline: 0;
            }
            </style>
    </head>
    <div class="header">
    </div>
    <body>
        <div class="body">
        <ul>
            <li>Add an item :<br />
                <form action="datab.php" method="POST">
                    <input type="text" name="name" required placeholder="Name of your item"/><br />
            </li>
            <li>Add a description :<br />
                    <input type="text" name="comment" required placeholder="Describe your product"/><br />
            </li>
            <li>Add a category :<br />
                    <input type="text" name="category" required placeholder="Put a category"/><br />
            </li>
            <li>Add a price :<br />
                    <input type="number" name="price" min="0" required placeholder="Put a price"/><br />
            </li>
            <li>Add stock :<br />
                <input type="number" name="stock" min="1" required placeholder="Your stock"/><br />
            </li>
            <li>Add your image to URL:<br />
                <input type="text" name="image" required placeholder="Put your link"/>
            </li>
            <input type="submit" name="submit" value="OK">
        </form>
        </div>
    </body>
    <div class="footer">
    </div>
</html>
