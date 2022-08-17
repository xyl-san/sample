<div class="modal fade" id="newEmployee" tabindex="-1" role="dialog" aria-labelledby="employeeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <div class="col-lg-6">
                      	<label for="firstname" class="control-label">First name</label>
                        <input type="text" class="form-control" id="firstName" name="firstname" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="lastname" class="control-label">Last name</label>
                        <input type="text" class="form-control" id="lastName" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="control-label">Address</label>
                        <textarea class="form-control tArea" rows="2" id="addressInfo" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="control-label">Birthdate</label>
                        <input type="text" class="form-control" id="birthDate" name="birthdate" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="control-label">Contact Info</label>
                        <input type="number" class="form-control" id="contactInfo" name="contactinfo" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Gender</label>
                        <select class="form-select" id="genderSelection" name="gender" aria-label="Select gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>