<?php include 'header.php';
$query = $db->query("SELECT c.region_name, c.country_name, count(distinct art.artID) as total_article, count(distinct a.aID) as total_author
  from countries as c
  JOIN users as u on c.cID = u.cID
  JOIN authors as a on a.userID = u.userID
  JOIN articles as art on art.aID = a.aID
  group by c.country_name
  order by c.region_name asc, count(art.artID) desc");
  $query16 = $query->fetchALL( PDO::FETCH_ASSOC );

?>
    <div class="pagetitle">
      <h1>Query 16</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Query 16</li>
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
                    <th scope="col">Region</th>
                    <th scope="col">Country</th>
                    <th scope="col">Total Articles</th>
                    <th scope="col">Total Authors</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query16 as $rows): ?>
                    <tr>
                      <td><?= $rows['region_name'] ?></td>
                      <td><?= $rows['country_name'] ?></td>
                      <td><?= $rows['total_article'] ?></td>
                      <td><?= $rows['total_author'] ?></td>
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