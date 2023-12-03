<?php ?>
<div class="">

    <div class="row-auto flex-column flex-lg-row position-relative">
        <!-- Start Sidebar -->
        <div class="col-auto sidebar shadow-sm">
            <?php Helper::importView('partials/nav_dashboard.view.php');
            ?>
        </div>
        <!-- End Sidebar -->

        <main class="col position-relative overflow-x-hidden">
            <div class="row justify-content-lg-end">
                <div class="col-lg-10 col px-2 px-lg-5 py-4" title="main" style="max-width: 100vw; ">
                    <div class="content p-lg-4 p-0">
                        <h1>Admin Account</h1>
                        <div class="row ms-2">
                            <div class="col-lg-2 col-auto border border-2 mt-3 py-2 px-2 rounded-3 flex-grow-1 flex-lg-grow-0">
                                <div class="shadow-sm rounded-3 py-3 px-lg-4 px-0 h-100">
                                    <h1 class="mb-0"><?= $usersCount ?></h1>
                                    <h6>Account Admin</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row flex-column gap-3 mt-4">
                            <div class="col justify-content-end d-flex">
                                <button type="button" id="btnPress" class="btn border-none shadow-sm px-3 py-2 rounded-4 flex-shrink-1" data-bs-toggle="modal" data-bs-target="#modalAdd">
                                    <i class="bi bi-person-plus"></i>
                                </button>

                                <!-- pop up -->
                                <div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content modal-dialog-scrollable">
                                            <form action="<?= $newAdminEndpoint ?>" method="post">
                                                <div class="modal-header justify-content-center">
                                                    <h4 class="modal-title" id="modalAdd">ADD ADMIN</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Input Admin Username" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="firstname" class="form-label">Firstname</label>
                                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Input Admin Firstname" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lastname" class="form-label">Lastname</label>
                                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Input Admin Lastname" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Input Admin Title" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Input Admin Email Address" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="noTelp" class="form-label">No. Telp</label>
                                                        <input type="number" class="form-control" id="noTelp" name="no_telp" placeholder="Input Admin Number" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="Input Admin Address" required>
                                                    </div>
                                                    <div class="mb-3" title="flash">
                                                        <label for="newPassword" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="newPassword" name="password" placeholder="Input Admin Password" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Retype Admin Password" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='$("div[role=alert]").remove();removeVal("input")'>Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        /**
                                         * @var UserModel[] $users
                                         */
                                        foreach ($users as $user) :
                                            /**
                                             * @var AdminModel $adminRole
                                             */
                                            $adminRole = $user->getRoleDetail();
                                        ?>
                                            <tr>
                                                <td><?= $user->getUsername() ?></td>
                                                <td><?= $user->getFirstName() ?></td>
                                                <td><?= $user->getLastName() ?></td>
                                                <td><?= $adminRole->getTitle() ?></td>
                                                <td><?= $user->getEmail() ?></td>
                                                <td><?= $user->getPhoneNumber() ?></td>
                                                <td><?= $user->getAddress() ?></td>
                                                <td>
                                                    <!-- modal trigger -->
                                                    <button type="button" id="btnPress" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editModal" title="<?= $user->getIdUser() ?>" onclick="editButtonAction(
                                                        <?= $user->getIdUser() ?>, 
                                                        '<?= $user->getUsername() ?>', 
                                                        '<?= $user->getLastName() ?>',
                                                        '<?= $adminRole->getTitle() ?>',
                                                        '<?= $user->getEmail() ?>',
                                                        '<?= $user->getPhoneNumber() ?>',
                                                        '<?= $user->getAddress() ?>'
                                                    )">
                                                        edit
                                                    </button>
                                                    <!-- Modal -->

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function editButtonAction(id_user, username, lastname, title, email, phoneNumber, address) {
        const modal = /*template*/ `
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true" data-bs-backdrop="static">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content modal-dialog-scrollable">
             <form action="" method="post">
                 <div class="modal-header justify-content-center">
                     <h1 class="modal-title fs-5" id="editModal">EDIT ADMIN</h1>
                 </div>
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="firstname" class="form-label">Firstname</label>
                         <input type="text" class="form-control" id="firstname" name="firstname"
                             placeholder="Input Admin Firstname" value="${username}" required>
                     </div>
                     <div class="mb-3">
                         <label for="lastname" class="form-label">Lastname</label>
                         <input type="text" class="form-control" id="lastname" name="lastname"
                             placeholder="Input Admin Lastname" value="${lastname}" required>
                     </div>
                     <div class="mb-3">
                         <label for="title" class="form-label">Title</label>
                         <input type="text" class="form-control" id="title" name="title" placeholder="Input Admin Title"
                            value="${title}" required>
                     </div>
                     <div class="mb-3">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" class="form-control" id="email" name="email"
                            value="${email}" placeholder="Input Admin Email Address" required>
                     </div>
                     <div class="mb-3">
                         <label for="noTelp" class="form-label">No. Telp</label>
                         <input type="number" class="form-control" id="noTelp" name="no_telp"
                            value="${phoneNumber}" placeholder="Input Admin Number" required>
                     </div>
                     <div class="mb-3">
                         <label for="address" class="form-label">Address</label>
                         <input type="text" class="form-control" id="address" name="address"
                            value="${address}" placeholder="Input Admin Address" required>
                     </div>
                     <div class="mb-3" title="flash">
                         <label for="newPassword" class="form-label">Password</label>
                         <input type="password" class="form-control" id="newPassword" name="password"
                             placeholder="Input Admin Password">
                     </div>
                     <div class="mb-3">
                         <label for="confirmPassword" class="form-label">Confirm Password</label>
                         <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                             placeholder="Retype Admin Password">
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick='$("#editModal").remove();'>Close</button>
                         <button type="submit" class="btn btn-secondary">Save</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>`
        $(`button[title='${id_user}']`).after(modal);
        $("#editModal").modal("show");

    }
</script>

<script src="<?= App::get("root_uri") . "/public/js/script_password.js" ?>"></script>
<script src="<?= App::get("root_uri") . "/public/js/script.js" ?>"></script>