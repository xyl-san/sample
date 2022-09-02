<?php include 'includes/queries.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php'; ?>
    <!-- https://colorhunt.co/palette/effffdb8fff985f4ff42c2ff -->
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="flex-shrink-0 p-3" style="width: 280px;">
            <div class="sidebar-header rounded">
                <h3>Dream System</h3>
                <strong>Boss Panda</strong>
            </div>
            <ul class="list-unstyled components">
                <h5>Manage</h5>
                <li>
                    <a href="menu.php">
                        <i class="fa-solid fa-house"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#accountingSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle text-wrap">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        Accounting
                    </a>
                    <ul class="collapse list-unstyled" id="accountingSubmenu">
                        <li>
                            <a href="accounting_list.php"> Journal Entries</a>
                            <a href="account_list.php"> Account List</a>
                            <a href="account_group.php"> Group List</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="content" class="w-100">
            <?php include 'header.php'; ?>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm btn-flat mt-2" data-bs-toggle="modal"
                        data-bs-target="#addNewJournal">
                        <span>
                            <i class="fa-solid fa-pen-to-square"></i>
                            Add New Journal Entry
                        </span>
                    </button>
                    <nav aria-label="breadcrumb" class="float-end mt-2">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Accounting</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Journal Code</th>
                                <th>Description</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Encoded by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Journal Code</th>
                                <th>Description</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Encoded by</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <?php include 'includes/scripts.php';?>
    <?php include 'modals.php';?>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });

    $(function() {
        $('#example1').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#editDepartment').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#example1').on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteDepartment').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: 'department_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.department_id').val(response.department_id);
                    $('.department').val(response.department_name);
                    $('.delete_department_name').html(response.department_name);

                }
            });

        })
    }
    </script>
</body>

</html>