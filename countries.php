<?php
include 'header.php';
$query = $db->query("SELECT * FROM countries;");
$query_countries = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="pagetitle">
  <h1>Countries</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Countries</li>
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
            <th scope="col">Country ID</th>
            <th scope="col">Country Name</th>
            <th scope="col">Population</th>
            <th scope="col">Deaths</th>
            <th scope="col">Infected</th>
            <th scope="col">Vaccinated</th>
            <th scope="col">Government agency</th>
            <th scope="col">Region Name</th>
            <th scope="col">Latest Report Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $userType;
          foreach ($query_countries as $row) :
          ?>
            <tr>
              <td><?= $row['cID'] ?></td>
              <td><?= $row['country_name'] ?></td>
              <td><?= $row['populations'] ?></td>
              <td><?= $row['deaths'] ?></td>
              <td><?= $row['infected'] ?></td>
              <td><?= $row['vaccinated'] ?></td>
              <td><?= $row['gov_agency'] ?></td>
              <td><?= $row['region_name'] ?></td>
              <td><?php if (!is_null($row['report_date'])) {
                    echo date('Y/m/d', $row['report_date']);
                  } ?></td>
                   <td>
                                        <button
                                         type="button" class="btn btn-primary" 
                                         data-toggle="modal" 
                                         data-target="#editModal" 
                                        >
                                        Edit</button>
                                        <a href="core.php?action=delete&id=<?= $row['cID'] ?>" class="btn
									    btn-danger deleteBtn">Delete</a>
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