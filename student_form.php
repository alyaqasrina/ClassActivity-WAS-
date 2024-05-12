<?php
    require_once('auth_session.php');
    header("Content-Security-Policy: default-src 'self';");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="validate.js"></script>
    <title>A. Student Details</title>
    <style>
        body {
           background: #3e4144;
        }

        .container {
            background: #fff;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            width: 50%;
            text-align: center;
            
        }
        h1 {
            color: #333;
        }

        form {
            text-align: left;
            margin: 20px;
            padding: 20px;
            border-radius: 5px;
            width: 50%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
        input[type="submit"] {
            width: 100%;
            margin-top: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
  <div class="container">
    <h1>A. Student Details</h1>
    <form id="form" method="post" action="server.php" onsubmit="return validateForm()">
      <label for="name">Name (Legal/Official) :</label>
      <input type="text" id="name" name="name" required><br>
      <br>
      <label for="matricNo">Matric No :</label>
      <input type="text" id="matricNo" name="matricNo" required><br>
      <br>
      <label for="currAdd">Current Address :</label>
      <input type="text" id="currAdd" name="currAdd" required><br>
      <br>
      <label for="homeAdd">Home Address :</label>
      <input type="text" id="homeAdd" name="homeAdd" required><br>
      <br>
      <label for="email">Email (Gmail Account) :</label>
      <input type="email" id="email" name="email" required><br>
      <br>
      <label for="mobile">Mobile Phone No :</label>
      <input type="tel" id="mobile" name="mobile" required><br> 
      <br>
      <label for="home">Home Phone No (Emergency) :</label>
      <input type="tel" id="home" name="home" required><br> 
      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

      <div id="error-msg" style="color: red;"></div><br>

      <input type="submit" name="formsubmit" id="formsubmit">
      
    </form>
  </div>

  <section>
    <div>
        <h2>Student Details</h2>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Matric No</th>
                <th>Current Address</th>
                <th>Home Address</th>
                <th>Email</th>
                <th>Mobile Phone</th>
                <th>Home Phone</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require('role.php');
            $students = read();
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($student['matricNo'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($student['currAdd'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($student['homeAdd'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($student['email'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($student['mobile'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($student['home'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td><button onclick='performAction(\"update\", " . htmlspecialchars($student['id'], ENT_QUOTES, 'UTF-8') . ")'>Edit</button></td>";
                echo "<td><button onclick='performAction(\"delete\", " . htmlspecialchars($student['id'], ENT_QUOTES, 'UTF-8') . ")'>Delete</button></td>";
                echo "</tr>";
    }
?>
            </tbody>
        </table>
    </div>
  </section>
</body>
</html>

