<?php include 'header.php';
$query = $db->query(
  "SELECT  publish_date, major_topic, minor_topic, summary, discription
FROM  articles
ORDER BY publish_date ASC;
");
$query14 = $query->fetchAll( PDO::FETCH_ASSOC);


?>    <div class="pagetitle">
      <h1>Query 14</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Query 14</li>
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
                    <th scope="col">Published Date</th>
                    <th scope="col">Major Topic</th>
                    <th scope="col">Minor Topic</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Description</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($query14 as $row): ?>
                  <tr>
                    <td><?= $row['publish_date'] ?></td>
                    <td><?= $row['major_topic'] ?></td>
                    <td><?= $row['minor_topic'] ?></td>
                    <td><?= $row['summary'] ?></td>
                    <td><?= $row['discription'] ?></td>
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