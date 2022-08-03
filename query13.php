<?php 
include 'header.php'; 
$query = $db->query(
"SELECT user_type,username,last_name,first_name,citizenship,email,phone,suspension_date 
FROM users 
WHERE users.status = 0 
ORDER BY users.suspension_date ASC;");
$query13 = $query->fetchALL( PDO::FETCH_ASSOC );
?>

<div class="pagetitle">
      <h1>Query 13</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Query 13</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table</h5>
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">User Type</th>
                    <th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Citizenship</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Suspension Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query13 as $row): ?>
                  <tr>
                    <td><?= $row['user_type'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['citizenship'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['suspension_date'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->
            </div>
        </div>
    </section>

    <?php 
    include 'footer.php'; 
    ?>