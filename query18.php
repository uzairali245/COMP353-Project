<?php include 'header.php'; 
$query = $db->query("SELECT e.sent_date, e.email, e.subject
FROM emails as e
ORDER BY e.sent_date DESC;");
$query18 = $query->fetchAll( PDO::FETCH_ASSOC ); 
?>

    <div class="pagetitle">
      <h1>Query 18</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Query 18</li>
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
                    <th scope="col">Sent date</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($query18 as $rows): ?>
                  <tr>
                    <td><?= $rows['sent_date'] ?></td>
                    <td><?= $rows['email'] ?></td>
                    <td><?= $rows['subject'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->
            </div>
        </div>
    </section>

  
    <?php include 'footer.php' ?>