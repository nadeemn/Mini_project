
<html>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=Number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
body{
	background-size: cover;
	}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

 </style>
 <body background="fp.jpg">
<form action="nn.php" method="POST">
     <table align="center">
	<tr>
        <td align="right"></td><td><input type="text" name="na"  placeholder="Name" required></td>
  <br>
       </tr>
<tr>
   <td align="right"></td><td><input type="text" name="num" placeholder="Number" required></td>
<br><br></tr>
<tr>
   <td align="right"></td><td><input type="Number" min="1" max="5" name ="rate" placeholder="rating" required></td><br>
</tr>
<tr>
   <td align="right"></td><td><textarea rows="4" cols="50" name="fback" placeholder="say something about us" required></textarea></td><br><br>
</tr>
<tr>
   <td><br></td><td align="center"><button class="button button2" name="button">submit</button></td>
</table>


</form>
</body>
</html>
