<!-- Main Navbar -->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <!-- Navbar Header -->
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand">
                    <div class="brand-text brand-big hidden-lg-down text-light ml-4">
                        <span>Admin </span><strong>Controller</strong>
                    </div>
                    <div class="brand-text brand-small">
                        <strong>BD</strong>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Search -->
                    <li class="nav-item">
                        <a class="nav-link" id="search" href="#"><i class="icon-search"></i></a>
                    </li>
                    <!-- Notifications -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="notifications" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i><span class="badge bg-danger">12</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="notifications">
                            <a class="dropdown-item" href="#">
                                <div class="notification">
                                    <i class="fa fa-envelope bg-success"></i> You have 6 new messages
                                    <small class="text-muted">4 minutes ago</small>
                                </div>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="notification">
                                    <i class="fa fa-twitter bg-info"></i> You have 2 followers
                                    <small class="text-muted">4 minutes ago</small>
                                </div>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="notification">
                                    <i class="fa fa-upload bg-warning"></i> Server Rebooted
                                    <small class="text-muted">4 minutes ago</small>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center" href="#">View all notifications</a>
                        </div>
                    </li>
                    <!-- Messages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="messages" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope"></i><span class="badge bg-warning">10</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messages">
                            <a class="dropdown-item d-flex" href="#">
                                <img src="images/avatar-1.jpg" alt="..." class="img-fluid rounded-circle" width="30">
                                <div class="msg-body">
                                    <h5 class="h6">Jason Doe</h5><span>Sent You Message</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex" href="#">
                                <img src="images/avatar-2.jpg" alt="..." class="img-fluid rounded-circle" width="30">
                                <div class="msg-body">
                                    <h5 class="h6">Frank Williams</h5><span>Sent You Message</span>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center" href="#">Read all messages</a>
                        </div>
                    </li>
                    <!-- Logout -->
                    <li class="nav-item">
                        <a href="login.html" class="nav-link logout">
                            Logout <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
