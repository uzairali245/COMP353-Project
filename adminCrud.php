<?php include 'header.php';
$query = $db->query("SELECT * FROM users;");
$users = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $db->query("SELECT country_name FROM countries;");
$countries = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Table</h5>
            <div class="row">
                <div class="col-md-12">
                    <?php if (isset($_SESSION['msg'])) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> <?= $_SESSION['msg'] ?>
                        </div>
                    <?php endif; ?>
                    <h2 class="text-center float-left" id="title">User's Table</h2>
                    <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#addModal">Add
                        User</a>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Citizenship</th>
                                <th>User Type</th>
                                <th>Date of Birth</th>
                                <th>Suspense Date</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userType;
                            foreach ($users as $user) :
                                if ($user['user_type'] == 1) {
                                    $userType = "Administrator";
                                } else if ($user['user_type'] == 2) {
                                    $userType = "Organizer";
                                } else if ($user['user_type'] == 3) {
                                    $userType = "Researcher";
                                } else if ($user['user_type'] == 4) {
                                    $userType = "Regular";
                                } ?>
                                <tr>
                                    <td><?= $user['userID'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['password'] ?></td>
                                    <td><?= $user['first_name'] ?></td>
                                    <td><?= $user['last_name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['phone'] ?></td>
                                    <td><?= $user['citizenship'] ?></td>
                                    <td><?= $userType ?></td>
                                    <td><?= $user['dob'] ?></td>
                                    <td><?php if (!is_null($user['suspension_date'])) {
                                            echo date('Y/m/d', $user['suspension_date']);
                                        } ?></td>
                                    <td>
                                        <?php
                                        if ($user['status'] == "1")
                                            echo '<span class="badge bg-success">Active</span>';
                                        else
                                            echo '<span class="badge bg-danger">Suspended</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="<?= $user['userID'] ?>" data-username="<?= $user['username'] ?>" data-password="<?= $user['password'] ?>" data-firstname="<?= $user['first_name'] ?>" data-lastname="<?= $user['last_name'] ?>" data-email="<?= $user['email'] ?>" data-phone="<?= $user['phone'] ?>" data-citizenship="<?= $user['citizenship'] ?>" data-user_type="<?= $user['user_type'] ?>" data-dob="<?= $user['dob'] ?>">
                                            Edit</button>
                                        <?php if ($user['status'] == "1") : ?>
                                            <a href="core.php?action=ban&id=<?= $user['userID'] ?>" class="btn btn-warning">Ban</a>
                                        <?php else : ?>
                                            <a href="core.php?action=unban&id=<?= $user['userID'] ?>" class="btn
										    btn-secondary">Unban</a>
                                        <?php endif; ?>
                                        <a href="core.php?action=delete&id=<?= $user['userID'] ?>" class="btn
									    btn-danger deleteBtn">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>



<!-- The Modal -->
<div class="modal" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="core.php" method="post">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username" id="username">
                    </div>

                    <form action="core.php" method="post">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" name="password" class="form-control" placeholder="Enter password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="fname">Firstname:</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Enter firstname" id="fname">
                        </div>

                        <div class="form-group">
                            <label for="lname">Lastname:</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter lastname" id="lname">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of birth:</label>
                            <input type="date" name="dob" class="form-control" placeholder="Enter Date of you birth" id="dob">
                        </div>
                        <div class="form-group">
                            <label for="citizenship">Citizenship</label>
                            <select name="citizenship" id="citizenship" class="form-control">
                                <option value="">Select Citizenship</option>
                                <?php foreach ($countries as $country) : ?>
                                    <option value="<?= $country['country_name'] ?>"><?= $country['country_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="usertype">User Type:</label>
                            <select name="usertype" id="usertype" class="form-control">
                                <option value="">Select User Type</option>
                                <option value="2">Organizer</option>
                                <option value="3">Researcher</option>
                                <option value="4">Regular</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="addUser" value="Add Users" class="btn btn-success">Add User</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>




<!-- The Modal -->
<div class="modal editModal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="core.php" method="post">
                    <input type="hidden" name="id">

                    <div class="form-group">
                        <label for="fname">UserName:</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username" id="fname">
                    </div>

                    <div class="form-group">
                        <label for="uname">Password:</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter password" id="uname">
                    </div>

                    <div class="form-group">
                        <label for="pass">Firstname:</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Enter firstname" id="pass">
                    </div>

                    <div class="form-group">
                        <label for="lname">Lastname:</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Enter lastname" id="lname">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="number" name="email" class="form-control" placeholder="Enter email" id="email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" name="phone" class="form-control" placeholder="Enter phone" id="phone">
                    </div>

                    <div class="form-group">
                        <label for="citizenship">Citizenship</label>
                        <select name="citizenship" id="citizenship" class="form-control">
                            <option value="">Select Citizenship</option>
                            <?php foreach ($countries as $country) : ?>
                                <option><?= $country['country_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="usertype">User Type:</label>
                        <select name="usertype" id="usertype" class="form-control">
                            <option value="">Select User Type</option>
                            <option value="2">Organizer</option>
                            <option value="3">Researcher</option>
                            <option value="4">Regular</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="editStudent" value="Edit Users" class="btn btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(".deleteBtn").on("click", function() {
            return confirm('Are you sure you want to delete this student?\nThis action cannot be undone!');
        });
    })
</script>

<?php
include 'footer.php';
unset($_SESSION['msg'])
?>