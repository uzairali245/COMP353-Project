<?php include 'header.php';
$query = $db->query("SELECT country.region_name, country.country_name, country.populations, country.vaccinated, country.deaths
FROM Countries as country
GROUP BY country.country_name
ORDER BY count(country.deaths) ASC;");
$query17 = $query->fetchAll( PDO::FETCH_ASSOC); 
?>

    <div class="pagetitle">
      <h1>Query 17</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Query 17</li>
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
                    <th scope="col">region_name</th>
                    <th scope="col">country_name</th>
                    <th scope="col">populations</th>
                    <th scope="col">vaccinated</th>
                    <th scope="col">deaths</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($query17 as $rows): ?>
                  <tr>
                    <td><?= $rows['region_name'] ?></td>
                    <td><?= $rows['country_name'] ?></td>
                    <td><?= $rows['populations'] ?></td>
                    <td><?= $rows['vaccinated'] ?></td>
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