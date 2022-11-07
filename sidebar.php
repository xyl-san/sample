<nav id="sidebar" class="shadow-md flex-shrink-0 p-3" style="width: 280px;">
    <ul class="list-unstyled components">
        <h5>Manage</h5>
        <li>
            <button class="btn noMenu" href="home.php">
                Home
            </button>
        </li>
        <li>
            <button href="#employeeSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                class="btn btn-toggle text-wrap">
                Human Resource
            </button>
            <ul class="collapse list-unstyled" id="employeeSubmenu">
                <li>
                    <a href="employees_list.php"><i class="fa-solid fa-user-tie"></i> Employees</a>
                    <a href="attendance_list.php"><i class="fa-regular fa-calendar-days"></i> Attendance</a>
                    <a href="cashadvance_list.php"><i class="fa-solid fa-money-bill-1-wave"></i> Cash Advance</a>
                    <!-- <a href="schedule_list.php"><i class="fa-regular fa-calendar-days"></i> Schedules</a> -->
                    <a href="department_list.php"><i class="fa-solid fa-building"></i> Department</a>
                    <a href="job_list.php"><i class="fa-regular fa-id-card"></i> Jobs</a>
                    <a href="deduction_list.php"><i class="fa-solid fa-money-bill-1-wave"></i> Deductions</a>
                </li>
            </ul>
        </li>
        <li>

            <button href="#pmSystem" data-bs-toggle="collapse" aria-expanded="false" class="btn btn-toggle text-wrap">
                Inventory
            </button>
            <ul class="collapse list-unstyled" id="pmSystem">
                <li>
                    <a href="inventory_list.php"><i class="fa-solid fa-warehouse"></i> Warehouse</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-box-open"></i> Products</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-user-tag"></i> Supplier</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-envelope-open-text"></i> Purchase Order</a>
                </li>
            </ul>
        </li>
        <li>
            <button href="#cmSystem" data-bs-toggle="collapse" aria-expanded="false" class="btn btn-toggle text-wrap">
                Customers
            </button>
            <ul class="collapse list-unstyled" id="cmSystem">
                <li>
                    <a href="customer.php"><i class="fa-solid fa-person"></i> Customer</a>
                </li>
                <li>
                    <a href="invoices.php"><i class="fa-solid fa-file-invoice"></i> Invoice</a>
                </li>
                <li>
                    <a href="credit_notes.php"><i class="fa-solid fa-file-invoice-dollar"></i> Credit Note</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-list"></i> Transactions</a>
                </li>
                <li>
                    <a href="crm.php"><i class="fa-solid fa-person"></i> Customer Relationship Management</a>
                </li>
            </ul>
        </li>
        <li>
            <button href="#paySystem" data-bs-toggle="collapse" aria-expanded="false" class="btn btn-toggle text-wrap">
                Payroll
            </button>
            <ul class="collapse list-unstyled" id="paySystem">
                <li>
                    <a href="#"><i class="fa-solid fa-file-invoice"></i> Payroll</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-file-invoice"></i> Payslip</a>
                </li>
            </ul>
        </li>
        <li>
            <button href="#accountingSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                class="btn btn-toggle text-wrap">
                Accounting
            </button>
            <ul class="collapse list-unstyled" id="accountingSubmenu">
                <li>
                    <a href="accounting_menu.php"><i class="fa-solid fa-book"></i> Dashboard</a>
                    <a class="nav-header"><i class="fa-solid fa-book"></i><b> Miscellaneous</b></a>
                    <a href="journal_entry.php"> Journal Entries</a>
                    <a class="nav-header"><i class="fa-solid fa-book"></i><b> Journals</b></a>
                    <a href="sales.php"> Sales</a>
                    <a href="purchases.php"> Purchases</a>
                    <a href="cash_bank.php"> Bank and Cash</a>
                    <a href="miscellaneous.php"> Miscellaneous</a>
                    <a class="nav-header"><i class="fa-solid fa-book"></i><b> Ledgers</b></a>
                    <a href="general_ledger.php"> General Ledger</a>
                    <a href="partner_ledger.php"> Partner Ledger</a>
                       
                </li>
                <li class="nav-header">Reports</li>
                <li>
                    <a href="trial_balance.php"><i class="fa-solid fa-book"></i> Trial Balance</a>
                    <a href="balance_sheet.php"><i class="fa-solid fa-file-invoice"></i></i> Balance Sheet</a>
                    <a href="equity_statement.php"><i class="fa-solid fa-file-invoice"></i></i> Statement of Changes in Equity</a>
                    <a href="income_statement.php"><i class="fa-solid fa-file-invoice"></i></i> Income Statement</a>
                </li>
            </ul>
        </li>
        <li>
            <button href="#" class="btn noMenu text-wrap"></i> Point of Sales</button>
        </li>
        <li>
            <button href="#" class="btn noMenu text-wrap"></i> Account Settings</button>
        </li>
    </ul>
</nav>