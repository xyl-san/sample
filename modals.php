<!-- Start Add Employee -->
<div class="modal fade" id="newEmployee" tabindex="-1" role="dialog" aria-labelledby="employeeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeTitle">Add employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control firstName" name="firstname" required>
                        <label for="firstName">First name</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control lastName" name="lastname" required>
                        <label for="lastName">Last name</label>
                    </div>
                    <div class="col form-floating">
                        <textarea class="form-control tArea addressInfo" rows="2" name="address" required></textarea>
                        <label for="addressInfo">Address</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control birthDate datepicker" name="birthdate" required>
                        <label for="birthDate">Birthdate</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" class="form-control contactInfo" name="contact" required>
                        <label for="contactInfo">Contact Info</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-select genderSelection" name="gender" aria-label="Select gender">
                            <option value="" selected>- Select -</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <label for="genderSelection">Gender</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control departmentSelection" name="department"
                            aria-label="Select department" required>
                            <option value="" selected>- Select -</option>
                            <?php employeeDepartment();?>
                        </select>
                        <label for="departmentSelection">Department</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control jobSelection" name="job" aria-label="Select job" required>
                            <option value="" selected>- Select -</option>
                            <?php employeePosition();?>
                        </select>
                        <label for="jobSelection">Job</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control scheduleSelection" name="schedule" aria-label="Select schedule"
                            required>
                            <option value="" selected>- Select -</option>
                            <?php employeeSchedule();?>
                        </select>
                        <label for="scheduleSelection">Schedule</label>
                    </div>
                    <div class="col-md-12">
                        <label for="filename">Photo</label>
                        <input type="file" class="form-control fileName" name="photo">

                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="addEmployee">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Add Employee -->

<!-- Start Edit Employee -->
<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeTitle">Edit employee information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="employeeId" name="employee_id">
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control firstName" name="firstname" required>
                        <label for="firstName">First name</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control lastName" name="lastname" required>
                        <label for="lastName">Last name</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <textarea class="form-control tArea addressInfo" rows="2" name="address" required></textarea>
                        <label for="addressInfo">Address</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control birthDate datepicker" name="birthdate" required>
                        <label for="birthDate">Birthdate</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" class="form-control contactInfo" name="contact_info" required>
                        <label for="contactInfo">Contact Info</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-select" name="gender" aria-label="Select gender">
                            <option value="" class="genderSelection" selected>- Select -</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <label for="genderSelection">Gender</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control" name="department" aria-label="Select department">
                            <option value="" class="departmentSelection" selected>- Select -</option>
                            <?php employeeDepartment();?>
                        </select>
                        <label for="departmentSelection">Department</label>

                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control" name="job" aria-label="Select job">
                            <option value="" class="jobSelection" selected>- Select -</option>

                            <?php employeePosition();?>
                        </select>
                        <label for="jobSelection">Job</label>

                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control" name="schedule" aria-label="Select schedule">
                            <option value="" class="scheduleSelection timepicker" selected>- Select -</option>
                            <?php employeeSchedule();?>
                        </select>
                        <label for="scheduleSelection">Schedule</label>

                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="editEmployee">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Edit Employee -->

<!-- Delete Employee -->
<div class="modal fade" id="deleteEmployee" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeTitle">Edit employee information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="employeeId" name="employee_id">
                    <div class="text-center">
                        <p>
                            Delete employee?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="deleteEmployee">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete Employee -->

<!-- Start Edit Photo Employee -->
<div class="modal fade" id="editEmployeePhoto" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeTitle">Edit Employee Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="employeeId" name="employee_id">

                    <div class="col-md-12">
                        <label for="filename">Photo</label>
                        <input type="file" class="form-control fileName" name="photo" required>
                    </div>

                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="editEmployeePhoto">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- End Edit Photo Employee -->


<!-- Start Delete Employee -->
<div class="modal fade" id="deleteEmployee" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeTitle">Deleting....</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" autocomplete="off">
                    <div class="text-center col-md-12 form-floating">
                        <input type="hidden" class="employeeId" name="employee_id">
                        <p class=" fs-4">Delete </p>
                        <h4 class="text-center del_employee_name"></h4>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="deleteEmployee">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Delete Employee -->

<!-- Start Add Attendance Employee -->
<div class="modal fade" id="newAttendance" tabindex="-1" role="dialog" aria-labelledby="attendanceTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attendanceTitle">Add Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="employeeId" aria-label="Select employee">
                            <option value="" class="employeeSelection" selected>- Select -</option>
                            <?php employeeAttendance();?>
                        </select>
                        <label for="employeeSelection">Employee</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control dateInfo datepicker" name="date" required>
                        <label for="date">Date</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="time" class="form-control timeIn timepicker" name="time_in" required>
                        <label for="time_in">Time In</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="time" class="form-control timeOut" name="time_out" required>
                        <label for="time_out">Time Out</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="addAttendance">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Add Attendance Employee -->

<!-- Start Edit Attendance Employee -->
<div class="modal fade" id="editAttendance" tabindex="-1" role="dialog" aria-labelledby="attendanceTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attendanceTitle">Edit Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="" method="POST" autocomplete="off">
                    <input type="hidden" class="attendanceId" name="attendance_id">
                    <div class="col-md-12 form-floating">
                        <input type="date" class="form-control dateInfo" name="date" required>
                        <label for="date">Date</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="time" class="form-control timeIn" name="time_in" required>
                        <label for="time_in">Time In</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="time" class="form-control timeOut" name="time_out" required>
                        <label for="time_out">Time Out</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="editAttendance">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Edit Attendance Employee -->

<!-- Start Adding Journal Entry  -->
<div class="modal fade" id="newJournalEntry" tabindex="-1" role="dialog" aria-labelledby="journalEntryTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="journalEntryTitle">Add Journal Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" name="randform" enctype="multipart/form-data"
                    autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control journalEntryDate" name="journal_date" required>
                        <label for="dateCreated">Date Created</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <button type="button" class="btn btn-secondary  btn-sm" onClick="randomString();">Generate
                            Code</button>
                        <input type="text" name="randomfield" required>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control journalDescription" name="description" required>
                        <label for="dateCreated">Entry Description</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="accountListDebit" aria-label="Select account"
                            id="account_id">
                            <option value="" class="accounListDebitSelection" selected>- Select -</option>
                            <?php accountListSelection();?>
                        </select>
                        <label for="accountDebit">Debit Description</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="groupListDebit" aria-label="Select group" id="group_id">
                            <option value="" class="groupListDebitSelection" selected>- Select -</option>
                            <?php groupListSelection();?>
                        </select>
                        <label for="groupDebit">Debit Account</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="number" class="form-control amount" name="amount" id="debitAmount"
                            oninput="add()" required>
                        <label for="debitAmount">Debit Amount</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="accountListDebit" aria-label="Select account"
                            id="account_id">
                            <option value="" class="accounListDebitSelection" selected>- Select -</option>
                            <?php accountListSelection();?>
                        </select>
                        <label for="accountDebit">Credit Description</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="groupListDebit" aria-label="Select group" id="group_id">
                            <option value="" class="groupListDebitSelection" selected>- Select -</option>
                            <?php groupListSelection();?>
                        </select>
                        <label for="groupDebit">Crdit Account</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="number" class="form-control amount" name="amount" id="creditAmount"
                            oninput="add()" required>
                        <label for="debitAmount">Credit Amount</label>
                    </div>
                    <div class="col-md-12 form-floating border-bottom">
                        <input type="number" class="form-control journalEntryAmount" id="amount" name="amount">
                        <label for="dateCreated">Total</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success float-end" name="addJournalEntry">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End of Adding Journal Entry -->
<!-- Start Edit Journal Entry -->

<!-- End EditJournal Entry -->

<!--Start Adding Account List-->
<div class="modal fade" id="newAccountList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title" id="JourneyTitle">Add Account List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body rounded-0">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">

                    <div class="col-md-12 form-floating">
                        <textarea class="form-control tArea entryName" rows="2" name="accountName" required></textarea>
                        <label for="accountName">Name</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <textarea class="form-control tArea entryDescription" rows="2" name="accountDescription"
                            required></textarea>
                        <label for="accountDescription">Description</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="accountStatus" aria-label="Select account"
                            id="accountStatus">
                            <option value="0" class="Status" selected>Inactive</option>
                            <option value="1" class="Status" selected>Active</option>
                            <option value="" class="Status" selected>--Select--</option>
                        </select>
                        <label for="account">Status</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="addAccountList">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Adding Account List-->

<!--Start edit Account List-->
<div class="modal fade" id="editAccountList" tabindex="-1" role="dialog" aria-labelledby="accountListTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountListTitle">Edit account information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="accountId" name="account_id">
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control accountName" name="name" required>
                        <label for="accountName">Name</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control accountDescription" name="description" required>
                        <label for="accountDescription">Description</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control accountStatusSelection" name="status" aria-label="Select account">
                            <option value="" class="accoutStatus" selected>--Select--</option>
                            <option value="0" class="accoutStatus" selected>Inactive</option>
                            <option value="1" class="accoutStatus" selected>Active</option>
                        </select>
                        <label for="accountStatus">Status</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="editAccountList">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--End edit Account List-->

<!--Start Delete Account List-->
<div class="modal fade" id="deleteAccountList" tabindex="-1" role="dialog" aria-labelledby="accountListTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountListTitle">Edit account information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="accountId" name="account_id">
                    <div class="text-center">
                        <p>
                            Delete account list?
                        </p>
                        <p class="deleteAccountList">
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="deleteAccountList">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Delete Account List-->

<!--Start Adding Group List-->
<div class="modal fade" id="newGroupList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title" id="groupListTitle">Add Group List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body rounded-0">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <textarea class="form-control tArea entryName" rows="2" name="name" required></textarea>
                        <label for="accountName">Name</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <textarea class="form-control tArea entryDescription" rows="2" name="description"
                            required></textarea>
                        <label for="accountDescription">Description</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="type" aria-label="Select type" id="accountType">                         
                            <option value="0" class="accoutType" selected>Debit</option>
                            <option value="1" class="accoutType" selected>Credit</option>
                            <option value="" class="accoutType" selected>--Select--</option>
                        </select>
                        <label for="account">Status</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="status" aria-label="Select status" id="accountStatus">
                            <option value="0" class="accoutStatus" selected>Inactive</option>
                            <option value="1" class="accoutStatus" selected>Active</option>
                            <option value="" class="accoutStatus" selected>--Select--</option>
                        </select>
                        <label for="account">Status</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="addGroupList">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Adding Group List-->

<!--Start edit Group List-->
<div class="modal fade" id="editGroupList" tabindex="-1" role="dialog" aria-labelledby="groupListTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="groupListTitle">Edit group list information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="groupId" name="group_id">
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control groupName" name="name">
                        <label for="groupName">Name</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control groupDescription" name="description">
                        <label for="groupDescription">Description</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control groupTypeSelection" name="type" aria-label="Select account">
                            <option value="0" class="typeSelection" selected>Debit</option>
                            <option value="1" class="typeSelection" selected>Credit</option>
                            <option value="" class="typeSelection" selected>--Select--</option>
                        </select>
                        <label for="groupStatus">Type</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control groupStatusSelection" name="status" aria-label="Select account">
                            <option value="0" class="statusSelection" selected>Inactive</option>
                            <option value="1" class="statusSelection" selected>Active</option>
                            <option value="" class="statusSelection" selected>--Select--</option>
                        </select>
                        <label for="groupStatus">Status</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="editGroupList">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End edit Group List-->

<!--Start Delete Group List-->
<div class="modal fade" id="deleteGroupList" tabindex="-1" role="dialog" aria-labelledby="groupListTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="groupListTitle">Edit account information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="groupId" name="group_id">
                    <div class="text-center">
                        <p>
                            Delete group list?
                        </p>
                        <p class="deleteGroupName">
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="deleteGroupList">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Delete Group List-->

<!-- Add lead -->
<div class="modal fade" id="newLead" tabindex="-1" role="dialog" aria-labelledby="leadTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leadTitle">New Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-xs-12 form-floating">
                        <input type="text" class="form-control leadName" name="leadname" placeholder="John" required>
                        <label for="leadname">Name</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <input type="email" class="form-control leadEmail" name="leademail"
                            placeholder="example@email.com" required>
                        <label for="leadcontact">E-mail Address</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <input type="number" class="form-control leadContact" name="leadcontact"
                            placeholder="09123456789" required>
                        <label for="leadcontact">Contact Number</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <textarea class="tArea form-control leadDescription" name="leaddescription"
                            placeholder="Description"></textarea>
                        <label for="leaddescription">Description (Optional)</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="leadAdd">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End add lead -->

<!-- Add Department -->
<div class="modal fade" id="newDepartment" tabindex="-1" role="dialog" aria-labelledby="leadTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leadTitle">New Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-xs-12 form-floating">
                        <input type="text" class="form-control departmentName" name="departmentname"
                            placeholder="IT Department" required>
                        <label for="departmentname">Name</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="departmentAdd">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Add Department -->

<!-- Edit Department -->

<div class="modal fade" id="editDepartment" tabindex="-1" role="dialog" aria-labelledby="departmentTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentTitle">Edit Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <input type="hidden" class="departmentId" name="department_id">
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control departmentName" name="department_name" required>
                        <label for="department_name">Department Name</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="departmentEdit">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- End Edit Department -->

<!-- Delete Department -->
<div class="modal fade" id="deleteDepartment" tabindex="-1" role="dialog" aria-labelledby="employeeTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentTitle">Delete Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" class="departmentId" name="department_id">
                    <div class="text-center">
                        <p>
                            Delete department?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="departmentDelete">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete Department -->



