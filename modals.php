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
                            <option value="" class="0" selected>- Select -</option>
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
                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
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
<div class="modal fade" id="editJob" tabindex="-1" role="dialog" aria-labelledby="jobTitle" aria-hidden="true">
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
<div class="modal fade" id="deleteJob" tabindex="-1" role="dialog" aria-labelledby="jobTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cashadvanceTitle">Delete a Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
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

<!-- Schedules Modals -->
<div class="modal fade" id="newSchedule" tabindex="-1" role="dialog" aria-labelledby="schedTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="schedTitle">Add a new Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col form-floating">
                        <input type="time" class="form-control timeIn" name="timein" required>
                        <label for="rate">Time In</label>
                    </div>
                    <div class="col form-floating">
                        <input type="time" class="form-control timeOut" name="timeout" required>
                        <label for="rate">Time Out</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="schedAdd">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="schedTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="schedTitle">Edit a schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <input val="" type="hidden" class="schedule_id" name="scheduleid">
                    <div class="col form-floating">
                        <input type="time" class="form-control timeIn" name="timein" required>
                        <label for="rate">Time In</label>
                    </div>
                    <div class="col form-floating">
                        <input type="time" class="form-control timeOut" name="timeout" required>
                        <label for="rate">Time Out</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="schedEdit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteSchedule" tabindex="-1" role="dialog" aria-labelledby="schedTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="schedTitle">Delete a schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" class="schedule_id" name="scheduleid">
                    <div class="text-center">
                        <p>
                            Are you sure you want to delete this schedule?
                        </p>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="schedDelete">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Schedules Modals -->
<!-- modal New Journal Entry ADD-->
<div class="modal fade w-80" id="journalEntryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-book"></i> Create Journal
                    Entry</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/queries.php" id="journAdd" method="POST">
                    <div class="">
                        <div class="row py-2 align-items-start">
                            <div class="col input-group">
                                <span class="input-group-text" id="basic-addon1">JOURNAL CODE</span>
                                <input type="text" class="form-control code text-dark bg bg-white" name="code"
                                    value="JRE-<?php echo (new DateTime())->format('mY'); ?>-00<?php journalEntryCode();?>"
                                    style="--bs-text-opacity: .5;" readonly>
                            </div>
                            <div class="col input-group">
                                <span class="input-group-text" id="basic-addon1">Date</span>
                                <input type="date" class="form-control journDate" name="journal_date"
                                    value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class=" p-2 row align-items-start">
                            <div class="col-6 g-2 py-2 row border rounded-1">
                                <div class="form-floating">
                                    <select class="form-control employee" name="employee_id">
                                        <option value=""> </option>
                                        <?php employeeSelection();?>
                                    </select>
                                    <label for="account" class="">Employee</label>
                                </div>
                                <div class="col-6 form-floating ">
                                    <select class="form-control bg-info account" name="account" id="accountListJourn"
                                        style="--bs-bg-opacity: .25;">
                                        <option value=""> </option>
                                        <?php accountListRow();?>
                                    </select>
                                    <label for="account" class="">Account</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <select class="form-control bg-warning group" name="group" id="groupListJourn"
                                        style="--bs-bg-opacity: .25;">
                                        <option value=""> </option>
                                        <?php groupListRow();?>
                                    </select>
                                    <label for="account" class="">Group</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <input type="number" class="form-control amount bg-success" id="amountJourn"
                                        onchange="this.value = Math.abs(this.value)" style="--bs-bg-opacity: .25;">
                                    <label for="" class="">Amount</label>
                                </div>

                                <div class="col-3 form-floating">
                                    <select class="form-control type" name="type" id="typeId"
                                        style="--bs-bg-opacity: .25;">
                                        <option value=""> </option>
                                        <option value="1">DEBIT</option>
                                        <option value="2">CREDIT</option>
                                    </select>
                                    <label for="" class="">TYPE</label>
                                </div>
                                <div class="col-3">
                                    <button type="button" class=" btn btn-success p-3  amount form-control"
                                        name="amount" id="myButton"><i class="fa-solid fa-file-circle-plus"></i>
                                        ADD</button>
                                </div>

                            </div>
                            <div class="col-6 px-4 py-2 g-2 row align-items-start">
                                <div class=" form-floating">
                                    <input type="text" class="description form-control" name="journal_entry_description"
                                        style="text-transform:uppercase"
                                        onkeyup="this.value = this.value.toUpperCase();" placeholder="Description"
                                        required>
                                    <label for="">Description</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="partner form-control" name="partner" placeholder="Partner"
                                        required>
                                    <label for="">Partner</label>
                                </div>

                            </div>
                        </div>

                        <table id="tableJourn" class="table table-stripped table-bordered gx-3">
                            <colgroup>

                                <col width="30%">
                                <col width="20%">
                                <col width="20%">
                                <col width="20%">
                                <col width="5%">
                            </colgroup>
                            <thead>
                                <tr class="bg-dark bg-gradient text-white">
                                    <th>Account</th>
                                    <th>Group</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Tool</th>
                                </tr>
                            </thead>
                            <tbody id="bodys"></tbody>
                            <tfoot>
                                <tr class="bg-gradient-secondary">
                                </tr>
                                <tr class=" border">
                                    <th></th>
                                    <th class="text-center">Total</th>
                                    <th class="text-right totalDebit">0.00</th>
                                    <th class="text-right totalCredit">0.00</th>
                                </tr>

                                <tr class=" border">
                                    <th colspan="2" class="text-center"></th>
                                    <th colspan="2" class="text-center totalBalanceJourn" id="totalCol">0</th>
                                </tr>

                            </tfoot>
                            <input type="hidden" name="totalcatch" id="totalcatch" readonly value="0">
                        </table>

                        <noscript id="cloneThis">
                            <tr>
                                <td class="">
                                    <input type="hidden" class="accountName" name="account_ids[]" value="">
                                    <input type="hidden" class="groupName" name="group_ids[]" value="">
                                    <input type="hidden" class="amount" name="amounts[]" value="">
                                    <input type="hidden" class="amountType" name="amountType[]" value="">
                                    <span class="accountsD" id="accD"></span>
                                </td>
                                <td class="groupsD"></td>
                                <td class="debitAmounts text-right"></td>
                                <td class="creditAmounts text-right"></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline btn-danger btn-flat delRow" id="deleteRow"
                                        type="button"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </noscript>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="journAddnewEntry">SAVE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal New Journal Entry END -->
