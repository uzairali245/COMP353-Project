<?php include 'header.php';
$query = $db->query("SELECT c.report_date, c.populations, c.vaccinated, c.infected, c.deaths
FROM countries as c
WHERE c.country_name = 'Canada' 
ORDER BY c.report_date DESC;");
$query19 = $query->fetchAll( PDO::FETCH_ASSOC ); 
?>

    <div class="pagetitle">
      <h1>Query 19</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Query 19</li>
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
                    <th scope="col">report_date</th>
                    <th scope="col">populations</th>
                    <th scope="col">vaccinated</th>
                    <th scope="col">infected</th>
                    <th scope="col">deaths</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($query19 as $rows): ?>
                  <tr>
                    <td><?= $rows['report_date'] ?></td>
                    <td><?= $rows['populations'] ?></td>
                    <td><?= $rows['vaccinated'] ?></td>
                    <td><?= $rows['infected'] ?></td>
                    <td><?= $rows['deaths'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->
            </div>
        </div>
    </section>

  
    <?php include 'footer.php' ?>