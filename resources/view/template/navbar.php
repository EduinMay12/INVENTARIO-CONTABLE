    <body class="bg-white" onload="inicio()" onkeypress="reset()" onclick="reset()" onMouseMove="reset()">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="../public/img/logo/logo-blanco-actualizado.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div id="wrapper" class="page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">         
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between" id="sidebar-menu">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="profile.php" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="../public/img/logo/logo-blanco-actualizado.png" alt="logo" class="logo-big">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="../public/img/logo/logo-blanco-actualizado.png" alt="logo" class="logo-small">
                                </div>
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            
                            <!-- Begin Notifications -->
                            <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-bell animated infinite swing"></i><span class="badge-pulse"></span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu notification">
                                    <li>
                                        <div class="notifications-header">
                                            <div class="title">Notifications (4)</div>
                                            <div class="notifications-overlay"></div>
                                            <img src="../public/img/fondo/card-7.png" alt="..." class="img-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    New user registered
                                                </div>
                                                <span class="date">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-calendar-check-o"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    New event added
                                                </div>
                                                <span class="date">7 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-history"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    Server rebooted
                                                </div>
                                                <span class="date">7 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-twitter"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    You have 3 new followers
                                                </div>
                                                <span class="date">10 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">View All Notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Notifications -->
                            <!-- User -->
                            <li class="nav-item dropdown"  id="sidebar-menu">
                                <a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                    <?php 
                                        $sql = "SELECT image FROM users WHERE id = '$id'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $image = $row['image'];
                                            if ($image == ''){ 
                                                echo    '<img src="../images/profil_auto.jpg" alt="..." class="avatar rounded-circle">';    
                                                } else {
                                                    echo    '<img src="../images/' . $image . '" alt="..." class="avatar rounded-circle">';
                                                }
                                            } else {
                                            echo "0 results";
                                        }
                                    ?>
                                </a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <ul id="side-menu">
                                        <li class="welcome">
                                            <a href="view/perfil/perfil.php" class="edit-profil"><i class="la la-gear"></i></a>
                                            <?php 
                                                $sql = "SELECT image FROM users WHERE id = '$id'";
                                                $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                        $image = $row['image'];
                                                    if ($image == ''){ 
                                                        echo    '<img src="../images/profil_auto.jpg" alt="..." class="rounded-circle">';    
                                                    } else {
                                                        echo    '<img src="../images/' . $image . '" alt="..." class="rounded-circle">';
                                                    }
                                                    } else {
                                                    echo "0 results";
                                                }
                                            ?>
                                        </li>
                                        
                                        <!--li>
                                            <a href="view/perfil/perfil.php" class="dropdown-item"> 
                                                Perfil Fiscal
                                            </a>
                                        </li-->
                                    </ul>
                                    <li class="separator"></li>
                                    <li>
                                        <a href="pages-faq.html" class="dropdown-item no-padding-top"> 
                                            Facturas
                                        </a>
                                    </li>
                                    <li><a href="javascript:cerrarsesion();" rel="nofollow" href="login.php" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                                </ul>
                                
                            </li>
                            <!-- End User -->
                            <!-- Begin Quick Actions -->
                            <li class="nav-item"><a href="#off-canvas" class="open-sidebar"><i class="la la-ellipsis-h"></i></a></li>
                            <!-- End Quick Actions -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <!-- End Header -->
