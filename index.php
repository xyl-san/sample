<?php include 'queries.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'scripts.php';?>
</head>

<body>
    <div class="row">
        <div class="container col-lg-8">
            <div class="box">
                <div class="box-header with-border">
                   <button type="button" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#newEmployee"><span><i class="fa fa-plus"></i> New</span></button>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Employee ID</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Address</th>
                                <th scope="col">Birthdate</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php employeetable();?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'modals.php'; ?>
</body>

</html>