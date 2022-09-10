<nav id="sidebar" class="shadow-md flex-shrink-0 p-3" style="width: 280px;">
    <ul class="list-unstyled components">
        <h5>Manage</h5>
        <li>
            <button class="btn noMenu" href="home.php">
                Home
            </button>
        </li>
        <li>
            <button href="#employeeSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="btn btn-toggle text-wrap">
                Human Resource
            </button>
            <ul class="collapse list-unstyled" id="employeeSubmenu">
                <li>
                    <a href="employees_list.php"><i class="fa-solid fa-user-tie"></i> Employees</a>
                    <a href="attendance_list.php"><i class="fa-regular fa-calendar-days"></i> Attendance</a>
                    <a href="cashadvance_list.php"><i class="fa-solid fa-money-bill-1-wave"></i> Cash Advance</a>
                    <a href="schedule_list.php"><i class="fa-regular fa-calendar-days"></i> Schedules</a>
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
                    <a href="#"><i class="fa-solid fa-warehouse"></i> Warehouse</a>
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
                    <a href="#"><i class="fa-solid fa-person"></i> Customer</a>
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
            <button href="#accountingSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="btn btn-toggle text-wrap">
                Accounting
            </button>
            <ul class="collapse list-unstyled" id="accountingSubmenu">
                <li>
                    <a href=""><i class="fa-solid fa-book"></i> Journal Entries</a>
                    <a href=""><i class="fa-solid fa-file-invoice"></i></i> Account List</a>
                    <a href=""><i class="fa-solid fa-layer-group"></i></i> Group List</a>
                </li>
                <li class="nav-header">Reports</li>
                <li>
                    <a href=""><i class="fa-solid fa-book"></i> Working Trial Balance</a>
                    <a href=""><i class="fa-solid fa-file-invoice"></i></i> Trial Balance</a>
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