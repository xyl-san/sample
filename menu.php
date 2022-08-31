

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/styles.php';?>
</head>

<body id="bodyStyle" oncontextmenu="return false">

    <div class="nav float-end">
        <button class="btn btn-dark">
            <a href=""><i class="fa-solid fa-user"></i></a>
        </button>
    </div>
    <div class="bubble x1"></div>
    <div class="bubble x2"></div>
    <div class="bubble x3"></div>
    <div class="bubble x4"></div>
    <div class="bubble x5"></div>
    <div class="bubble x6"></div>
    <div class="bubble x7"></div>
    <div class="bubble x8"></div>
    <div class="bubble x9"></div>
    <div class="bubble x10"></div>
    <div class="container text-center w-50 h-50 position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-start">
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <a href="pointofsale.php">
                    <button class="btn" id="crm">
                        <img src="assets/icons/POS.png" alt="" style="height:100px; border-radius: 15px;">
                        <div class="o_caption">Point of Sale</div>
                    </button>
                </a>

            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <a href="inventory.php">
                    <button class="btn" id="crm">
                        <img src="assets/icons/inventory.png" alt="" style="height:100px; border-radius: 15px;">
                        <div class="o_caption">Inventory</div>
                    </button>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <a href="attendance_list.php">
                    <button class="btn" id="crm">
                        <img src="assets/icons/attendance.png" alt="" style="height:100px; border-radius: 15px;">
                        <div class="o_caption">Attendance</div>
                    </button>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button class="btn" id="crm">
                    <img src="assets/icons/accounting.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">Accounting</div>
                </button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button class="btn" id="crm">
                    <img src="assets/icons/payroll.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">Payroll</div>
                </button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button class="btn" id="crm">
                    <img src="assets/icons/employees.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">Employees</div>
                </button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button class="btn" id="crm">
                    <img src="assets/icons/sales.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">Sales</div>
                </button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button class="btn" id="crm">
                    <img src="assets/icons/customers.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">Customer</div>
                </button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button class="btn" id="crm">
                    <a href="crm.php">
                    <img src="assets/icons/CRM.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">CRM</div>
                    </a>
                </button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button class="btn" id="crm">
                    <img src="assets/icons/account.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">Accounts</div>
                </button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button class="btn" id="crm">
                    <img src="assets/icons/invoices.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">Invoices</div>
                </button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <button href="#" class="btn" id="crm">
                    <img src="assets/icons/purchase.png" alt="" style="height:100px; border-radius: 15px;">
                    <div class="o_caption">Purchase</div>
                </button>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php';?>
</body>
</html> 