<?php 
include 'header.php';
$query = $db->query("SELECT * FROM articles;");
$query_articles = $query->fetchAll( PDO::FETCH_ASSOC );

?>
    <div class="pagetitle">
      <h1>Articles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Articles</li>
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
                    <th scope="col">Article ID</th>
                    <th scope="col">Publication Date</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Major Topic</th>
                    <th scope="col">Minor Topic</th>
                    <th scope="col">Description</th>
                    <th scope="col">Removal Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $rowType; 
                foreach ( $query_articles as $row):
                  ?>
                  <tr>
                    <td><?= $row['artID'] ?></td>
                    <td><?= $row['publish_date'] ?></td>
                    <td><?= $row['summary'] ?></td>
                    <td><?= $row['major_topic'] ?></td>
                    <td><?= $row['minor_topic'] ?></td>
                    <td><?= $row['discription'] ?></td>
                    <td><?= $row['removal_date'] ?></td>
                    <td>
                                        <button
                                         type="button" class="btn btn-primary" 
                                         data-toggle="modal" 
                                         data-target="#editModal" 
                                        >
                                        Edit</button>
                                        <?php if ($row['status'] == "1") : ?>
                                            <a href="core.php?action=ban&id=<?= $row['artID'] ?>" class="btn btn-warning">Ban</a>
                                        <?php else : ?>
                                            <a href="core.php?action=unban&id=<?= $row['artID'] ?>" class="btn
										    btn-secondary">Unban</a>
                                        <?php endif; ?>
                                        <a href="core.php?action=delete&id=<?= $row['artID'] ?>" class="btn
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