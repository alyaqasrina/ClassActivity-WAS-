<?php
    include 'db.php';
    include 'auth_session.php'; // Include your authorization check file here

    // Create
    function create($username, $role) {
        global $con;
        if ($_SESSION['role'] != 'admin') {
            echo "Only admins can create users.";
            return;
        }
        $sql = "INSERT INTO users (username, role) VALUES (?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $username, $role);
        $stmt->execute();
    }

    // Read
    function read() {
        global $con;
        $sql = "SELECT * FROM users";
        $result = $con->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Update
    function update($id, $username, $role) {
        global $con;
        if ($_SESSION['role'] != 'admin' && $_SESSION['username'] != $username) {
            echo "Only admins or the user themselves can update user data.";
            return;
        }
        $sql = "UPDATE users SET username = ?, role = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssi", $username, $role, $id);
        $stmt->execute();
    }

    // Delete
    function delete($id) {
        global $con;
        if ($_SESSION['role'] != 'admin') {
            echo "Only admins can delete users.";
            return;
        }
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    // Pagination parameters
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// SQL query to select data
$sql = "SELECT id, name, matricNo, currAdd, homeAdd, email, mobile, home FROM student LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

echo '<table class="table table-bordered">';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th><th>Matric No</th><th>Current Address</th><th>Home Address</th><th>Email</th><th>Mobile Phone</th><th>Home Phone</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr id='row{$row['id']}'>";
        echo '<td>' . htmlspecialchars($row["name"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["matricNo"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["currAdd"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["homeAdd"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["email"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["mobile"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["home"]) . '</td>';
        echo "<td><button onclick='performAction(\"edit\", {$row['id']})'>Edit</button></td>";
        echo "<td><button onclick='performAction(\"delete\", {$row['id']})'>Delete</button></td>";
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="9">No data found</td></tr>';
}
echo '</tbody>';
echo '</table>';

$con->close();
?>
