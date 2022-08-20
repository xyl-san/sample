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
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data" autocomplete="off">
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
                <form class="row g-3" action="includes/queries.php" method="POST" enctype="multipart/form-data" autocomplete="off">
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