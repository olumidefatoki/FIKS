<?php
$privilege=$_SESSION['Privilege'];
?>
<?ob_start(); ?>

<ul class="x-navigation">
                <li class="xn-logo">
                        <a href="#">FIKS</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                           FIKS
                        </a>
                                                                                              
                    </li>
<li class="xn-title">Navigation</li>
                    <li>
                        <a href="Dashboard.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>  
                <li class="xn-openable">
                        <a href="#"><span class="glyphicon glyphicon-leaf"></span> <span class="xn-text">Crops</span></a>
                        <ul>
                            <li><a href="Crops.php"><span class="fa fa-leaf"></span> Crops</a></li>
                            <li><a href="Disease.php"><span class="fa fa-leaf"></span> Disease</a></li>
                            <li><a href="Fertilizer.php"><span class="fa fa-leaf"></span> Fertilizer</a></li> 
                            <li><a href="Herbicide.php"><span class="fa fa-leaf"></span> Herbicide</a></li>
                            <li><a href="Pest.php"><span class="fa fa-leaf"></span> Pest</a></li>             
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Farmer Info</span></a>
                        <ul>
                            <li><a href="Farmers.php"><span class="fa fa-user"></span> Farmers</a></li>
                            <li><a href="FCA.php"><span class="fa fa-users"></span> Fadama Production Cluster (FPC) </a></li>
                            <li><a href="FUG.php"><span class="fa fa-users"></span> Fadama Production Group (FPG)</a></li> 
           
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-university"></span> <span class="xn-text">Market</span></a>
                        <ul>
                            <li><a href="Market.php"><span class="fa fa-university"></span> Market</a></li>
                            <li><a href="AgroBusiness.php"><span class="fa fa-university"></span> Agro Business Dealer</a></li>          
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-book"></span> <span class="xn-text">Package of Practise</span></a>
                        <ul>
                            <li><a href="CropLifeCycle.php"><span class="fa fa-info"></span> Crop LifeCycle </a></li>
                            <li><a href="VegetableLifeCycle.php"><span class="fa fa-info"></span> Vegetable LifeCycle</a></li>
                                       
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-linux"></span> <span class="xn-text">Animal Husbandry</span></a>
                        <ul>
                            <li><a href="Livestock.php"><span class="fa fa-linux"></span> Livestock</a></li>
                            <li><a href="Aquaculture.php"><span class="fa fa-linux"></span> Aquaculture</a></li>
                                      
                        </ul>
                    </li>
                     <?php if(($privilege==1)|| ($privilege==3)) { ?>  
                    <li><a href="Broadcast.php"><span class="fa fa-envelope"></span>  <span class="xn-text">Broadcast</span></a></li>
                     <?php } ?> 
 <?php if($privilege==1) { ?>  
                    <li><a href="Users.php"><span class="fa fa-user"></span>  <span class="xn-text">Users</span></a></li> 
                        <?php } ?>  
						  <li class="xn-openable">
                        <a href="#"><span class="fa fa-book"></span> <span class="xn-text">Location</span></a>
                        <ul>
                            <li><a href="States.php"><span class="fa fa-info"></span> State </a></li>
                            <li><a href="lga.php"><span class="fa fa-info"></span> LGA</a></li>
                                       
                        </ul>
                    </li>
                      
                    </ul>
<?ob_end_flush();?>