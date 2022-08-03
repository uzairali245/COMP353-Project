<?php
include 'header.php';
$query = $db->query("SELECT * FROM users;");
$query_users = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="pagetitle">
  <h1>Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Users</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Table</h5>
      <!-- Table with hoverable rows -->
      <table class="table table-hover datatable">
        <thead>
          <tr>
            <th scope="col">User Type</th>
            <th scope="col">Username</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Citizenship</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Suspension Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $userType;
          foreach ($query_users as $row) :
            if ($row['user_type'] == 1) {
                $userType = "Administrator";
              } else if ($row['user_type'] == 2) {
                $userType = "Organizer";
              } else if ($row['user_type'] == 3) {
                $userType = "Researcher";
              } else if ($row['user_type'] == 4) {
                $userType = "Regular";
              }
          ?>
            <tr>
            <td><?= $userType; ?></td>
              <td><?= $row['username'] ?></td>
              <td><?= $row['first_name'] ?></td>
              <td><?= $row['last_name'] ?></td>
              <td><?= $row['citizenship'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['dob'] ?></td>
              <td><?php
                  if (!is_null($row['suspension_date'])) {
                    echo date('Y/m/d', $row['suspension_date']);
                  } ?>
              </td>
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