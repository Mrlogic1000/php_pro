<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>
    <!-- modal -->
    <div class="modal fade" tabindex="-1" id="addNewDeviceModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Device</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" class="p-2" novalidate>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="network" id="fnetwork" class="form-control form-control-lg"
                                    placeholder="Enter Network Address" require>
                                <div class="invalid-feedback">The network Address is required</div>
                            </div>

                            <div class="col">
                                <input type="text" name="device" id="fnetwork" class="form-control form-control-lg"
                                    placeholder="Device" require>
                                <div class="invalid-feedback">The device is required</div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="mac" id="fnetwork" class="form-control form-control-lg"
                                    placeholder="MAC address" require>
                                <div class="invalid-feedback">The network Address is required</div>
                            </div>

                            <div class="col">
                                <input type="text" name="e01" id="fnetwork" class="form-control form-control-lg"
                                    placeholder="E01" require>
                                <div class="invalid-feedback">The E01 is required</div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="w01" id="fnetwork" class="form-control form-control-lg"
                                    placeholder="W01" require>
                                <div class="invalid-feedback">W01</div>
                            </div>

                            <div class="col">
                                <input type="text" name="sn" id="fnetwork" class="form-control form-control-lg"
                                    placeholder="The Seral Number" require>
                                <div class="invalid-feedback">The Seral Number</div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="model" id="fnetwork" class="form-control form-control-lg"
                                    placeholder="Model" require>
                                <div class="invalid-feedback">W01</div>
                            </div>

                            <div class="col">
                                <input type="text" name="version" id="fnetwork" class="form-control form-control-lg"
                                    placeholder="Version" require>
                                <div class="invalid-feedback">The Seral Number</div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button name="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->

    <div class="container-fluid">
    <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?=ROOT?>" class="nav-link px-2 link-body-emphasis">Home</a></li>
          <li><a href="<?=ROOT?>/search" class="nav-link px-2 link-body-emphasis">Search</a></li>
        </ul>

        <form action="<?=ROOT?>/search" method="get" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input value="<?= old_value('find','','get') ?>" name="find" type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?=get_image(user('image'))?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">            
            <li><a class="dropdown-item" href="<?=ROOT?>/setting">Setting</a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/logout">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>