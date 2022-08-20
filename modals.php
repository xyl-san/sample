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
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
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
                    <div class="col-md-6 form-floating">
                        <input type="file" class="form-control fileName" name="photo" required>
                        <label for="fileName">Photo</label>
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
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
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
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="text-center col-md-12 form-floating">
                        <input type="hidden" class="employeeId" name="employee_id">
                        <p class=" fs-4">Delete </p>
                        <h4 class="text-center del_employee_name"></h4>
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

<!-- Start Add Department -->
<div class="modal fade" id="newDepartment" tabindex="-1" role="dialog" aria-labelledby="departmentTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentTitle">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?php employeeAdd()?>" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control department" name="department" required>
                        <label for="department">Description</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Add Department -->

<!-- Start Edit Department -->
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
                <form class="row g-3" action="" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control department" name="department" required>
                        <label for="department">Department</label>
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

<!-- Start Delete Department -->
<div class="modal fade" id="deleteDepartment" tabindex="-1" role="dialog" aria-labelledby="departmentTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentTitle">Deleting....</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="text-center col-md-12 form-floating">
                        <input type="hidden" class="departmentId" name="department_id">
                        <p class=" fs-4">Delete </p>
                        <h4 class="text-center delete_department_name"></h4>
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
<!-- End Delete Department -->

<!-- Start Add Job -->
<div class="modal fade" id="newJob" tabindex="-1" role="dialog" aria-labelledby="jobTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobTitle">Add Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?php employeeAdd()?>" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control jobDescription" name="jobDescription" required>
                        <label for="jobDescription">Description</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="number" class="form-control jobRate" name="jobRate" required>
                        <label for="jobRate">Rate</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Add Job -->

<!-- Start Edit Job -->
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
                    <input type="hidden" class="joId" name="job_id">
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control jobDescription" name="jobDescription" required>
                        <label for="jobDescription">Description</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="number" class="form-control jobRate" name="jobRate" required>
                        <label for="jobRate">Rate</label>
                    </div>
                    <div class="mb-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-primary float-end" name="add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Job -->

<!-- Start Delete Job -->
<div class="modal fade" id="deleteJob" tabindex="-1" role="dialog" aria-labelledby="jobTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobTitle">Deleting....</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="text-center col-md-12 form-floating">
                        <input type="hidden" class="jobId" name="job_id">
                        <p class=" fs-4">Delete </p>
                        <h4 class="text-center delete_job"></h4>
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
<!-- End Delete Job -->

<!--Start Add Deductions-->
<div class="modal fade" id="newDeduction" tabindex="-1" role="dialog" aria-labelledby="deductionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deductionTitle">Add Deduction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="employeeDeduction" aria-label="Select employee">
                            <option value="" class="employeeSelection" selected>- Select -</option>
                            <?php employeeDeduction();?>
                        </select>
                        <label for="employeeSelection">Employee</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control deductions" name="deductions" required>
                        <label for="deductions">Description</label>        
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="number" class="form-control deductionsAmount" name="deductionsAmount" required>
                        <label for="deductionsAmount">Amount</label>
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
<!--End Add Deductions-->

<!-- Start Edit Deduction -->
<div class="modal fade" id="editDeduction" tabindex="-1" role="dialog" aria-labelledby="deductionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deductionTitle">Edit Deduction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="employeeDeduction" aria-label="Select employee">
                        <?php employeeDeduction();?>
                            <option value="" class="employeeSelection" selected>- Select -</option>
                        </select>
                        <label for="employeeSelection">Employee</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control deductionDescription" name="deductionDescription" required>
                        <label for="deductionDescription">Description</label>        
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="number" class="form-control deductionAmount" name="deductionAmount" required>
                        <label for="deductionAmount">Amount</label>
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
<!-- End Edit Deduction -->

<!-- Start Delete Deduction -->
<div class="modal fade" id="deleteDeduction" tabindex="-1" role="dialog" aria-labelledby="deductionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deductionTitle">Deleting....</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="text-center col-md-12 form-floating">
                        <input type="hidden" class="deduction_id" name="deduction_id">
                        <p class=" fs-4">Delete </p>
                        <h4 class="text-center delete_deduction"></h4>
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
<!-- End Delete Deduction -->

<!--Start Add Schedule-->
<div class="modal fade" id="newSchedule" tabindex="-1" role="dialog" aria-labelledby="scheduleTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleTitle">Add Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="employeeSchedule" aria-label="Select employee">
                            <option value="" class="employeeSelection" selected>- Select -</option>
                            <?php employee();?>
                        </select>
                        <label for="employeeSelection">Employee</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="employeeSchedule" aria-label="Select employee">
                            <option value="" class="scheduleSelection" selected>- Select -</option>
                            <?php employeeSchedule();?>
                        </select>
                        <label for="scheduleSelection">Schedule</label>
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
<!--End Add Schedule-->
<!-- Start Edit schedule -->
<div class="modal fade" id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="scheduleTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleTitle">Edit Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="employeeSchedule" aria-label="Select employee">
                            <option value="" class="employeeSelection" selected>- Select -</option>
                            <?php employee();?>
                        </select>
                        <label for="employeeSelection">Employee</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="employeeSchedule" aria-label="Select employee">
                            <option value="" class="scheduleSelection" selected>- Select -</option>
                            <?php employeeSchedule();?>
                        </select>
                        <label for="scheduleSelection">Schedule</label>
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
<!-- End Edit Schedule -->
<!-- Start Delete Deduction -->
<div class="modal fade" id="deleteSchedule" tabindex="-1" role="dialog" aria-labelledby="scheduleTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleTitle">Deleting....</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="#" method="POST" autocomplete="off">
                    <div class="text-center col-md-12 form-floating">
                        <input type="hidden" class="schedule_id" name="schedule_id">
                        <p class=" fs-4">Delete </p>
                        <h4 class="text-center delete_schedule"></h4>
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
<!-- End Delete Deduction -->