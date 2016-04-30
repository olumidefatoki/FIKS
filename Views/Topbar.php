<?ob_start(); ?> 
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <li class="col-lg-6" >
                    <h1> FADAMA INFORMATION KNOWLEGDE SERVICE</h1>
                    </li> 
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-user username"></span> <?php echo $username; ?>  </a>
                         <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-body list-group scroll">                                
                                <a class="list-group-item" href="ViewUserProfile.php"> <span class="fa fa-user"></span>Profile
                                </a>
                                <a class="list-group-item mb-control" href="#" data-box="#mb-signout">
                                    <span class="fa fa-sign-out"></span> logout
                                </a>                                
                            </div>                    
                        </div>                        
                    </li> 
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    
                    
<?ob_end_flush();?>