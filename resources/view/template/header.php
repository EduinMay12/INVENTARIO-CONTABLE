<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Cfactura - Inicio</title>
<meta name="description" content="Cfactura sistema de administración contable :)">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Google Fonts -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
    WebFont.load({
        google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
<!-- Favicon -->
<link rel="icon" type="image/png" sizes="92x92" href="../public/img/favicon_.png">
<link rel="icon" type="image/png" sizes="92x92" href="../public/img/favicon_.png">
<!-- Stylesheet -->
<link rel="stylesheet" href="../public/css/base/bootstrap.min.css">
<link rel="stylesheet" href="../public/css/base/cfactura.css">
<link rel="stylesheet" href="../public/css/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="../public/css/owl-carousel/owl.theme.min.css">
<link rel="stylesheet" href="../assets/icons/lineawesome/css/line-awesome.css">
<link rel="stylesheet" href="../assets/icons/ionicons/css/ionicons.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="../assets/icons/themify/css/themify-icons.css">
<link rel="stylesheet" href="../assets/icons/meteocons/css/meteocons.css">
<link rel="stylesheet" href="../public/css/datatables/datatables.css">
<!-- Sweet Alert-->
<link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<style>

#preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("../public/img/fondo/card-2.png") no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    z-index: 999999;
}
.spinner {
    animation: spinner 1s linear infinite;
    border: solid 5px transparent;
    border-top: solid 5px #ffffff;
    border-radius: 100%;
    width: 60px;
    height: 60px;
    margin: 0 auto;
}
nav.navbar {
    background: linear-gradient(45deg,#283581f2,#000000);
    padding: 0 15px;
    color: #aea9c3;
    border-radius: 0;
    box-shadow: 0 1px 15px 1px rgb(52 40 104 / 8%);
    z-index: 1000;
    width: 100%;
}
nav.navbar .user-size.dropdown-menu a.logout {
    background: #ff252594;
    width: 70px;
    height: 70px;
    color: #fff;
    border-radius: 50%;
    text-align: center !important;
    padding: 0;
    line-height: 55px;
    position: relative;
    bottom: -20px;
    font-size: 1.8rem;
    margin: 10px auto 0;
}
nav.navbar .user-size.dropdown-menu li.welcome a.edit-profil {
    position: absolute;
    background: #e4e8f0;
    font-size: 1.6rem;
    border-radius: 50%;
    right: 20px;
    bottom: 10px;
    box-shadow: 0 1px 15px 1px rgb(0 0 0 / 10%);
    width: 50px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    padding: 0;
}
nav.navbar .dropdown-menu.notification .notifications-header .notifications-overlay {
    background: rgb(4 50 99 / 44%);
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 4px 4px 0 0;
}
.default-sidebar > .side-navbar a[aria-expanded="true"] {
    background: #5abdfe;
    margin: 0 10px 0 10px;
    border-radius: 4px 4px 0 0;
}
.default-sidebar > .side-navbar ul ul {
    background: #5abdfe;
    border-radius: 0 0 4px 4px;
}
.default-sidebar > .side-navbar ul ul a {
    font-size: 0.85rem;
    padding-left: 40px;
    color: #ffffff;
}
.default-sidebar {
    background: linear-gradient(45deg,#4f59ff,#222a5a);

    position: fixed;
    height: 100%;
    top: 0;
    z-index: 999;
    transition: all 0.2s ease;
}
.default-sidebar > .side-navbar ul a {
    color: #fbfbfb;
    padding: 10px 10px;
    text-decoration: none;
    display: block;
    font-weight: 500;
}
.default-sidebar > .side-navbar a i {
    font-size: 1.6rem;
    margin-right: 10px;
    transition: none;
    vertical-align: -4px;
    color: #ffffff;
}
.default-sidebar > .side-navbar span.heading {
    font-weight: 600;
    margin-left: 10px;
    color: #ffffff;
    font-size: 0.85rem;
    text-transform: uppercase;
}
.default-sidebar > .side-navbar a[data-toggle="collapse"]::before {
    color: #ffffff;
    font-size: 0.85rem;
    content: '\f124';
    display: inline-block;
    transform: translateY(-50%);
    font-family: 'ionicons';
    position: absolute;
    top: 50%;
    right: 20px;
    opacity: 0.5;
}
.nav-link i {
    color: #ffffff;
}
.default-sidebar > .side-navbar a[aria-expanded="true"] i {
    color: #fffdfd;
}
.default-sidebar > .side-navbar ul a:hover i {
    color: #fefefe;
}
.btn-gradient-02, .btn-gradient-02 a {
    background: linear-gradient(to right, #1f2965 0%, #4f59ff 100%);
    background-size: 200% auto;
    font-weight: 600;
    transition: 0.5s;
    color: #fff;
    border: 0 none;
    padding: 12px 20px;
}
::-webkit-scrollbar {
    display: none;
}
.default-sidebar > .side-navbar ul li.active i, .default-sidebar > .side-navbar li ul li a.active {
    color: #252e63;
}
</style>
