<?php $this->view('header',[]); ?>

<div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-primary">All Device In the Database</h4>
                </div>
                <div>
                    <a href="<?= ROOT?>/signup">Add New Device</a>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td>
                                        <?= $user->username ?>
                                    </td>
                                    <td>
                                        <?= $user->email ?>
                                    </td>
                                    
                                    <td>
                                    <a href="#" class="btn btn-success btn-sm rounded-pill py-0">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm rounded-pill py-0">Delete</a>
                                   
                                </td>
                            </tr>
                                <?php endforeach; ?>

                               
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>


<?php $this->view('footer',[]); ?>