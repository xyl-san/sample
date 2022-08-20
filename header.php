<nav class="navbar rounded navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div type="button" id="sidebarCollapse" class="btn btn-light">
            <i class="fas fa-align-justify"></i>
            <span></span>
        </div>
        <!-- <button class="btn btn-dark d-inline-block d-lg-none ms-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#profile" aria-controls="profile" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button> -->
<!-- 
        <button class="btn btn-dark d-lg-none" data-bs-toggle="collapse" data-bs-target="#profile" aria-controls="profile" aria-expanded="false" aria-label="Toggle Navigation">
            <i class="fas fa-align-justify"></i>
        </button> -->

        <!-- <div class="collapse navbar-collapse" id="profile">
            <ul class="nav navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link ms-auto" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div> -->

        <div class="dropdown dropstart">
            <button type="button" class="btn btn-light" data-bs-toggle="dropdown"><i class="fa-regular fa-user"></i></button>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Profile Settings</a>
                <a href="#" class="dropdown-item">Logout</a>
            </div>
        </div>
    </div>
</nav>