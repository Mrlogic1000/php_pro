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
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
   
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
<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= ROOT?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT?>/device">Device</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT?>/task">Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT?>/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT?>/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT?>/logout">Logout</a>
        </li>
        
        
      </ul>
      
    </div>
  </div>
</nav>