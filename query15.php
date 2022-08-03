<?php include 'header.php' ;
$query = $db->query(
  "SELECT u.first_name, u.last_name, count(art.artID) as totalartID, u.citizenship
FROM articles as art
JOIN users as u ON art.userID = u.userID
JOIN authors as a ON a.userID = u.userID
GROUP BY a.aID
ORDER BY count(art.artID) DESC;
");
$query15 = $query->fetchAll( PDO::FETCH_ASSOC);


?>
    <div class="pagetitle">
      <h1>Query 15</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Query 15</li>
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
                    <th scope="col">Total Articles</th>
                    <th scope="col">Citizenship</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($query15 as $row): ?>
                  <tr>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['totalartID'] ?></td>
                    <td><?= $row['citizenship'] ?></td>
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