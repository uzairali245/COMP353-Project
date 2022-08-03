<?php 
include 'header.php'; 
$query = $db->query(
"SELECT u.first_name, u.last_name, a.major_topic, a.minor_topic, a.publish_date, u.citizenship  
FROM articles as a
JOIN users as u ON a.userID = u.userID;");
$query11 = $query->fetchALL( PDO::FETCH_ASSOC );
?>


<div class="pagetitle">
      <h1>Query 11</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Query 11</li>
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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Major topic</th>
                    <th scope="col">Minor topic</th>
                    <th scope="col">Publish Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($query11 as $row): ?>
                  <tr>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['major_topic'] ?></td>
                    <td><?= $row['minor_topic'] ?></td>
                    <td><?= $row['publish_date'] ?></td>
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
