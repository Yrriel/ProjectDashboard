<?php include "displayTable.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/dashboard-style.css">
</head>
<body>
    <div class="half-circle"></div>
    <div class="headerwrapper">
        <div class="header">
            <nav class="dash-nav">
                <a class="button-menu-href" href=""><img class="button-menu" src="src/svg/menu.svg" alt=""></a>
                <a class="button-profile-href" href="login.html">logout<img class="button-profile" src="src/svg/profile-icon.svg" alt=""></a>
            </nav>
        </div>
        <div class="section">
            <div class="wrapper">
                <div class="profile-container">
                    <span class="profile-container-span">
                        <img class="profile-picture" src="src/img/profile-sample.jpeg" alt="">
                        <span class="profile-text-box">
                            <h1>Your Users</h1>
                            <p>Add, Edit, or Delete!</p>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="message-alert-container">
        <div class="table-container">
            <div class="searchbar-container">
                <p>Search: <input type="text" placeholder="Username, Email"></p>
            </div>
            <table class="php-table">
                <tr>
                    <th>Username</th>
                    <th>Admin Status</th>
                </tr>
                <?php 
                $count = 0;
                while($row = $result->fetch_assoc()){ ?>

                    <tr onclick="window.location='http://localhost/ProjectDashboard/editUser.php?email=<?php echo $row["email"] ?>';" id="rows-table"  <?php if ($count % 2 == 0) echo 'class="even-color"';?>>
                    <input type="hidden" name="username" value=<?php echo $row['user_name'];?>>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['is_admin'];?></td>
                    </tr>

                <?php $count++; }?>
            </table>
            <div class="pagehere">
                <div class="page-info">
                    <?php 
                        if(!isset($_GET['page-nr'])){
                            $page = 1;
                        }else{
                            $page = $_GET['page-nr'];
                        }
                    ?>
                    Showing <?php echo $page ?> of <?php echo $pages ?>
                </div>
                <div class="pagination">
                    <!-- first page -->
                    <a href="?page-nr=1">First</a>

                    <!-- previous page -->
                     <?php 
                        if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){ ?>
                            <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
                        <?php }
                        else{
                        ?>
                            <a href="">Previous</a>
                        <?php } ?>

                    <!-- output the page numbers -->
                    <div class="page-numbers">
                    <!-- if ( $pages <= 5 )
                    {
                    echo all 
                    }

                    if($pages <= $pageVisible)?>
                                    <a href="?page-nr= echo $i ?>"> echo $i ?></a> ;

                    if ( $_GET['page-nr'] > 3 && $_GET['page-nr'] < $pages-1 ) {
                    print ($_GET['page-nr'] - 2 + $count)
                    }
                    if( $_GET['page-nr'] < 3 ){
                    print 1 + $count
                    }
                    if( $_GET['page-nr'] => $pages-1 ){
                    print $pages-4 + $count
                    } -->
                        <?php 
                            for($i = 1; $i <= $pageVisible; $i++){
                                
                                if ( $_GET['page-nr'] > $pageMiddle && $_GET['page-nr'] < $pages-1 ){?> 
                                    <a class="page<?php echo $_GET['page-nr']-$pageMiddle + $i ?>" href="?page-nr=<?php echo $_GET['page-nr']-$pageMiddle + $i ?>"><?php echo $_GET['page-nr']-$pageMiddle + $i ?></a> <?php ; continue; }
                                if( $_GET['page-nr'] <= $pageMiddle ){?> 
                                    <a class="page<?php echo $i ?>" href="?page-nr=<?php echo $i ?>"><?php echo $i ?></a> <?php ; continue; }
                                if( $_GET['page-nr'] >= $pages-1 ){?>
                                    <a class="page<?php echo $pages - $pageVisible + $i ?>" href="?page-nr=<?php echo $pages - $pageVisible + $i ?>"><?php echo $pages - $pageVisible + $i ?></a> <?php ; continue; }
                                ?>
                        <?php }?>

                    </div>

                    <!-- next page -->
                    <?php 
                        if(!isset($_GET['page-nr'])){ ?>
                            <a href="?page-nr=2">Next</a>
                        
                     <?php }else{
                        if($_GET['page-nr'] >= $pages){  ?>
                            <a href="">Next</a>
                        

                    <?php }else{ ?>
                        <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
                    <?php } } ?> 

                    <!-- last page -->
                    <a href="?page-nr=<?php echo $pages?>">Last</a>
                </div>
            </div>
        </div>
        
    </div>
     <script>
        let links = document.querySelectorAll('.page<?php echo $_GET['page-nr']?>');
        links[0].classList.add("active");
     </script>                   
    <script src="AnimationTransitiontoPage.js"></script>
</body>
</html>