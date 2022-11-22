<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zara Wide - Dashboard</title>
    <link rel="icon" href="../img/titlelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <section id="menu">
        <div class="logo">
            <img src="./images/logo-zarawide.jpg" alt="">
            <h2>ZaraWide</h2>
        </div>
        <div class="items">
            <ul>
                <li>
                    <a href="dashboard.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="customer.php"><span class="las la-users"></span><span>Customers</span></a>
                </li>
                <li>
                    <a href="products.php"><span class="las la-clipboard-list"></span><span>Products</span></a>
                </li>
                <li>
                    <a href="order.php"><span class="las la-shopping-bag"></span><span>Orders</span></a>
                </li>
                <!-- <li>
                    <a href=""><span class="las la-receipt"></span><span>Inventory</span></a>
                </li> -->
                <li>
                    <a href="account.php"><span class="las la-user-circle"></span><span>Accounts</span></a>
                </li>
                <li>
                    <a href="Messages.php"><span class="las la-envelope"></span><span>Messages</span></a>
                </li>
            </ul>
        </div>
    </section>

    <section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <span id="menu-btn" class="las la-bars"></span>
                </div>
                <div class="search">
                    <span class="las la-search"></span>
                    <input type="text" placeholder="Search">
                </div>
            </div>
        

        <div class="profile">
            <span class="las la-bell"></span>
            <a href="logout.php">
            <i class="uil uil-sign-out-alt"></i>
            </a>
        </div>
        </div>
    
   
    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass("active");
        })
    </script>
</body>
</html>