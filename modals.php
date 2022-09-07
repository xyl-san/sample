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
                        <select class="form-control -Selection" name="schedule" aria-label="Select schedule" required>
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
                            <?php employeeSelection();?>
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
<div class="modal fade lg-4" id="newJournalEntry" tabindex="-1" role="dialog" aria-labelledby="journalEntryTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="journalEntryTitle">Add Journal Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" name="randform"
                    enctype="multipart/form-data" autocomplete="off">
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary" type="button" onClick="randomString();"
                            id="button-addon1">Generate Code</button>
                        <input type="text" class="form-control" placeholder="Generate code"
                            aria-label="Example text with button addon" aria-describedby="button-addon1"
                            name="randomfield">
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control journalDescription" name="description">
                        <label for="dateCreated">Reference</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control journalEntryDate" name="journal_date" required>
                        <label for="dateCreated">Date Created</label>
                    </div>


                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control journalDescription" name="description">
                        <label for="dateCreated">Description</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="accountStatus" aria-label="Select account"
                            id="accountStatus">
                            <option value="3" class="Status" selected>Cash Basis Taxes</option>
                            <option value="2" class="Status" selected>Exchange Difference</option>
                            <option value="1" class="Status" selected>Miscellaneous Operations</option>
                            <option value="" class="Status" selected>--Select--</option>
                        </select>
                        <label for="account">Journal</label>
                    </div>
                    <div>
                        <h6>
                            Journal Items
                        </h6>
                    </div>
                    <div class="col-md-12 form-floating">
                        <div id="containerTable">
                            <table class="table" id="dynamicTable">
                                <thead>
                                    <tr>
                                        <th>Debit Account</th>
                                        <th>Credit Account</th>
                                        <th>Partner</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Total</th>
                                        <th>Tool</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <button type="button" class="btn btn-secondary  btn-sm"
                                onClick="addNewRowTable();">Add</button>
                        </div>
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

<!-- Add Cash Advance -->
<div class="modal fade" id="newCashAdvance" tabindex="-1" role="dialog" aria-labelledby="cashAdvanceTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cashAdvanceTitle">New Cash Advance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="employeeId" aria-label="Select employee">
                            <option value="" class="employeeSelection" selected>- Select -</option>
                            <?php employeeSelection();?>
                        </select>
                        <label for="employeeSelection">Employee</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control dateInfo datepicker" name="date" required>
                        <label for="date">Date</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <input type="number" class="form-control amountInfo" name="amount" placeholder="123456789"
                            required>
                        <label for="amount">Amount</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="advanceAdd">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Add Cash Advance -->


<!-- Edit Cash Advance -->
<div class="modal fade" id="editCashAdvance" tabindex="-1" role="dialog" aria-labelledby="cashAdvanceTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cashAdvanceTitle">Cash Advance Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <input val="" type="hidden" class="cashAdvanceId" name="cashadvanceid">
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="employeeId" aria-label="Select employee">
                            <option value="" class="employeeSelection" selected>- Select -</option>
                            <?php employeeSelection();?>
                        </select>
                        <label for="employeeSelection">Employee</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control dateInfo datepicker" name="date" required>
                        <label for="date">Date</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <input type="number" class="form-control amountInfo" name="amount" placeholder="123456789"
                            required>
                        <label for="amount">Amount</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="advanceEdit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Cash Advance -->

<!-- Delete Cash Advance -->
<div class="modal fade" id="deleteCashAdvance" tabindex="-1" role="dialog" aria-labelledby="cashadvanceTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cashadvanceTitle">Delete Employee's Cash Advance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="cashAdvanceId" name="cashadvanceid">
                    <div class="text-center">
                        <p>
                            Delete employee's cash advance??
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="advanceDelete">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete Cash Advance -->

<!-- Add Job -->
<div class="modal fade" id="newJob" tabindex="-1" role="dialog" aria-labelledby="jobTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobTitle">New Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <select id="deptSelect" class="form-control" name="departmentId" aria-label="Select Department">
                            <option value="" class="departmentSelection" selected>- Select -</option>
                            <?php employeeDepartment();?>
                        </select>
                        <label for="departmentSelection">Department</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control jobName" name="jobname" required>
                        <label for="jobname">Job Name</label>
                    </div>
                    <div class="col form-floating">
                        <textarea class="form-control jobDesc" name="jobdesc" required></textarea>
                        <label for="jobdesc">Job Description</label>
                    </div>
                    <div class="col form-floating">
                        <input type="number" class="form-control rateInfo" name="rate" required>
                        <label for="rate">Job Rate</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="jobAdd">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Add Job -->

<!-- Edit Job -->
<div class="modal fade" id="editJob" tabindex="-1" role="dialog" aria-labelledby="jobTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobTitle">Edit Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <input val="" type="hidden" class="jobId" name="jobid">
                    <div class="col-md-12 form-floating">
                        <select id="deptSelect" class="form-control" name="departmentId" aria-label="Select Department">
                            <option value="" class="departmentSelection" selected>- Select -</option>
                            <?php employeeDepartment();?>
                        </select>
                        <label for="departmentSelection">Department</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control jobName" name="jobname" required>
                        <label for="jobname">Job Name</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <textarea class="form-control jobDesc" name="jobdesc" rows="3" required></textarea>
                        <label for="jobdesc">Job Description</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="number" class="form-control rateInfo" name="rate" required>
                        <label for="rate">Job Rate</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="jobEdit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Job -->

<!-- Delete Job -->
<div class="modal fade" id="deleteJob" tabindex="-1" role="dialog" aria-labelledby="jobTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cashadvanceTitle">Delete a Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    <input type="hidden" class="jobId" name="jobid">
                    <div class="text-center">
                        <p>
                            Are you sure you want to delete this job?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="jobDelete">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete Job -->
