<!-- sample add student on database -->
<div class="modal fade" id="addStudent" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <div class="col-12 form-floating ">
                        <input type="text" class="form-control name" name="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-12 form-floating ">
                        <input type="text" class="form-control address" name="address">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-12 form-floating ">
                        <input type="email" class="form-control email" name="email">
                        <label for="email">Email address</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="course_id" aria-label="Select account">
                            <option value="" class="course_id">Select Course</option>
                            <?php course();?>
                        </select>
                        <label for="course">Course</label>
                    </div>
                    <div class="mb-2">
                        <button class="btn btn-danger btn-sm" data-bs-dismiss="modal" type="button">Back</button>
                        <button class="btn btn-success btn-sm float-end" type="submit" name="addNewStudent">Add
                            New</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end sample add student on database -->

<!-- Sample delete student on database -->

<div class="modal fade" id="deleteStudent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="studentID" name="student_id">
                    <div class="text-center">
                        <p>
                            YES DELETE IT!
                        </p>
                    </div>
                    <div class="mb-2">
                        <button class="btn btn-danger btn-sm" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-success btn-sm float-end" type="submit"
                            name="deleteNewStudent">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- End Sample delete student on database -->
<!-- Sample Update student on database -->
<div class="modal" id="updateStudent" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="includes/queries.php" method="POST" autocomplete="off">
                    <input type="hidden" class="studentID" name="student_id">
                    <div class="col-12 form-floating ">
                        <input type="text" class="form-control name" name="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-12 form-floating ">
                        <input type="text" class="form-control address" name="address">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-12 form-floating ">
                        <input type="email" class="form-control email" name="email">
                        <label for="email">Email address</label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <select class="form-control" name="course_id" aria-label="Select account">
                            <option value="" class="course_descript">Select Course</option>
                            <?php course();?>
                        </select>
                        <label for="course">Course</label>
                    </div>
                    <div class="mb-2">
                        <button class="btn btn-danger btn-sm" data-bs-dismiss="modal" type="button">Back</button>
                        <button class="btn btn-success btn-sm float-end" type="submit"
                            name="editStudent">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Sample Update student on database -->