<?php $this->view('header',[]); ?>
<div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-primary">All Device In the Database</h4>
                </div>
                <div>
                    <button  class="btn btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#addNewDeviceModal">Add New Device</button>
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
                                <th>Network</th>
                                <th>Router</th>
                                <th>MAC</th>
                                <th>E01</th>
                                <th>W01</th>
                                <th>SN</th>
                                <th>MODEL</th>
                                <th>VERSION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($devices as $hotel): ?>
                                <tr>
                                    <td>
                                        <?= $hotel->network ?>
                                    </td>
                                    <td>
                                        <?= $hotel->devices ?>
                                    </td>
                                    <td>
                                        <?= $hotel->mac ?>
                                    </td>
                                    <td>
                                        <?= $hotel->e01 ?>
                                    </td>
                                    <td>
                                        <?= $hotel->w01 ?>
                                    </td>
                                    <td>
                                        <?= $hotel->sn ?>
                                    </td>
                                    <td>
                                        <?= $hotel->model ?>
                                    </td>
                                    <td>
                                        <?= $hotel->version ?>
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
        <?php 
        $page = new \Core\Pager;
        $page->display();
        ?>
        <?php $this->view('footer',[]); ?>
    