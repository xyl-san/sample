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
                        <input type="date" class="form-control birthDate" name="birthdate" required>
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
                            aria-label="Select department">
                            <option value="" selected>- Select -</option>
                            <?php employeeDepartment();?>
                        </select>
                        <label for="departmentSelection">Department</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control jobSelection" name="job" aria-label="Select job">
                            <option value="" selected>- Select -</option>
                            <?php employeePosition();?>
                        </select>
                        <label for="jobSelection">Job</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select class="form-control scheduleSelection" name="schedule" aria-label="Select schedule">
                            <option value="" selected>- Select -</option>
                            <?php employeeSchedule();?>
                        </select>
                        <label for="scheduleSelection">Schedule</label>
                    </div>
                    <div class="col-md-12">
                        <label for="filename">Photo</label>
                        <input type="file" class="form-control fileName" name="photo" required>

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
                        <input type="date" class="form-control birthDate" name="birthdate" required>
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
                            <option value="" class="scheduleSelection" selected>- Select -</option>
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
                        <select class="form-control" name="employee" aria-label="Select employee">
                            <option value="" class="employeeSelection" selected>- Select -</option>
                            <?php employeeAttendance();?>
                        </select>
                        <label for="employeeSelection">Employee</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control dateInfo" name="date" required>
                        <label for="date">Date</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="time" class="form-control timeIn" name="time_in" required>
                        <label for="time_in">Time In</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="time" class="form-control timeOut" name="time_out" required>
                        <label for="time_out">Time Out</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
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
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <input type="hidden" class="attendanceId" name="attendance_Id">
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
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Edit Attendance Employee -->


<!-- Start of Accounting Add new Journal -->
<div class="modal fade" id="addNewJournal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title" id="JourneyTitle">Add New Journal Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body rounded-0">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control date" name="date" id="datepicker_add" required>
                        <label for="date">Entry Date</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <textarea class="form-control tArea entryDescription" rows="2" name="entrydescription"
                            required></textarea>
                        <label for="entrydescription">Entry Description</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="accountList" aria-label="Select account" id="account_id">
                            <option value="" class="accounListSelection" selected>- Select -</option>
                            <?php accountListSelection();?>
                        </select>
                        <label for="account">Account List</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-control" name="accountgroup" aria-label="Select accountgroup" id="group_id">
                            <option value="" class="accountGroupSelection" selected>- Select -</option>
                            <?php accountGroupSelection();?>
                        </select>
                        <label for="accountgroup">Account Group</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="number" class="form-control amount" name="amount" id="amount" required>
                        <label for="amount">Amount</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <button type="button" class="btn btn-secondary " id="addToList"><i
                                class="fa-solid fa-plus"></i>Add Account</button>
                        <button type="button" class="btn btn-secondary"><i class="fa-solid fa-plus"></i>Add Account
                        </button>
                    </div>
                    <div class="col-md-12 form-floating">
                        <table id="example1" class="table table-stripped table-bordered">
                            <thead class="table-info">
                                <tr>
                                    <th width="10%">Tool</th>
                                    <th>Account</th>
                                    <th>Group</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr class="bg-gradient-secondary">
                                <tr>
                                    <th colspan="3" class="text-center">Total</th>
                                    <th class="text-right total_debit">0.00</th>
                                    <th class="text-right total_credit">0.00</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"></th>
                                    <th colspan="3" class="text-center total-balance">0</th>
                                </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Accounting Add new Journal -->
<!--Start Adding Account List-->
<div class="modal fade" id="addAccountList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title" id="JourneyTitle">Add Account List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body rounded-0">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <textarea class="form-control tArea entryDescription" rows="2" name="accountName" required></textarea>
                        <label for="accountName">Name</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <textarea class="form-control tArea entryDescription" rows="2" name="accountDescription" required></textarea>
                        <label for="accountDescription">Description</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="accountStatus" aria-label="Select account"
                            id="accountStatus">
                            <option value="" class="accoutStatus" selected>--Select--</option>  
                            <option value="0" class="accoutStatus" selected>Inactive</option>
                            <option value="1" class="accoutStatus" selected>Active</option>   
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
                        <input type="date" class="form-control birthDate" name="birthdate" required>
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
                            <option value="" class="scheduleSelection" selected>- Select -</option>
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
<!--End edit Account List-->

























<!-- Add lead -->
<div class="modal fade" id="newLead" tabindex="-1" role="dialog" aria-labelledby="leadTitle"
    aria-hidden="true">
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
                        <input type="text" class="form-control leadFirstName" name="leadfirstname" placeholder="John"
                            required>
                        <label for="leadfirstname">First name</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <input type="text" class="form-control leadLastName" name="leadlastname" placeholder="Smith"
                            required>
                        <label for="leadlastname">Last name</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <input type="email" class="form-control leadEmail" name="leademail" placeholder="example@email.com" required>
                        <label for="leadcontact">E-mail Address</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <input type="number" class="form-control leadContact" name="leadcontact"
                            placeholder="09123456789" required>
                        <label for="leadcontact">Contact Number</label>
                    </div>
                    <div class="col-xs-12 form-floating">
                        <textarea class="tArea form-control leadDescription" name="leaddescription" placeholder="Description"></textarea>
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
