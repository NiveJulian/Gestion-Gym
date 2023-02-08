<?php include('db_connect.php'); 
?>
<style>
  .logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
  }
  

</style>
<div id="page">
</div>


<div id="loading"></div>

    <nav class="navbar navbar-light fixed-top">
      
      <div class="container-fluid mt-2 mb-2">
        <div class="col-lg-12">
          <div class="float-right">
            <ul class="nav-main">
          
                <!-- Nav Item - Alerts -->
                <li class="nav-icon dropdown mx-1">
                    <?php
                        $student = $conn->query("SELECT *, vencimiento - CURDATE() AS expiring FROM student ORDER BY id ASC");
                    ?>

                    <a class="nav-link" href="#" id="alertsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger">❕</span>
                    </a>
                    
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-lista " aria-labelledby="alertsDropdown" id="popup" >
                      <h6 class="dropdown-header">
                            Centro de Alertas <i class="fa-sharp fa-solid fa-xmark" id="close"></i>
                        </h6>
                        
                    <?php
                    $fecha_hoy= date("Y-m-d");
                    $i = 0;
				            while ($row = $student->fetch_assoc()){
                      $text       = "";
                      $background = '#fff';
                      $color      = '#000';
                      $display    = 'flex';

                      if ($row['expiring'] == 0) { // Vence hoy
                        $text       = 'Vence hoy';
                        $background = 'red';
                        $color      = 'white';
                        $display    = 'flex';
                        } elseif ($row['expiring'] == 1) { // Vence mañana
                            $text       = 'Vence mañana';
                            $background = 'red';
                            $color      = '#fff';
                            $display    = 'flex';
                        } elseif ($row['expiring'] > 1 && $row['expiring'] <= 7) { // Vence en una semana
                          $text       = 'Vencerá';
                          $background = 'yellow';
                          $display    = 'flex';
                        } elseif ($row['expiring'] < 0) { // Vencido
                            $text       = 'Venció';
                            $background = 'red';
                            $color      = '#fff';
                            $display    = 'flex';
                        }elseif ($row['expiring'] > 7) { // Que tiempo
                          $display    = 'none';
                        }
                    
									  ?>
                        
                        <a class="dropdown-item  align-items-center" href="#" style="display:<?php echo $display; ?>; color: <?php echo $color; ?>; background: <?php echo $background; ?>;">
                            <div class="mr-3">
                              <div class="icon-circle bg-primary">
                              <i class="fa-solid fa-calendar-circle-exclamation"></i>
                              </div>
                            </div>
                            <div >
                                <div class="small text-gray-500">El usuario <?php echo $row['id_no'] ?>, <?php echo ucwords($row['name']) ?>
                              se <?php echo $text; ?> su pago con fecha <?php echo $row['vencimiento'] ?></div>
                            </div>
                        </a>
                        <?php $i++; ?>
                        <?php } ?>
                      </div>
              </li>




              <div class="topbar-divider d-none d-sm-block"></div>




                          
              <li class="nav-item-tb dropdown no-arrow">
                    <a class="nav-link-tb dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <?php
                    include 'db_connect.php';
                    $type = array("", "Admin", "Staff", "Alumnus/Alumna");
                    $users = $conn->query("SELECT * FROM users order by name asc");
                    $i = 1;
                    while ($row = $users->fetch_assoc()) :
                    ?>

                        <span class="mr-2 d-lg-inline text-gray-600 small"><?php echo ucwords($row['name']) ?></span>
                        <img class="img-profile rounded-circle"
                            src="assets/uploads/undraw_profile.svg">
                    </a>
                    
                    <!-- Dropdown - User Information -->
                    
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown" id="showup">
                        <a href="#">
                          <i class="fa-sharp fa-solid fa-xmark" id="closed"></i>
                        </a>
                        
                        <a class="dropdown-item" href="index.php?page=users">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfiles
                                </a>
                                <a class="dropdown-item" href="index.php?page=site_settings">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuracion
                                </a>
                                <a class="dropdown-item" href="index.php?page=home">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Actividad de la Cuenta
                                </a>
                                <div class="dropdown-divider"></div>
                        <a class="dropdown-item-tb" href="#" data-toggle="modal" data-target="#logoutModal">
                        <div class="dropdown mr-4">
                            <a class="dropdown-item-tb" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
                          </div>
                        </a>
                        <?php endwhile; ?>  
                    </div>
                    
                </li>
                        

            </ul>
          </div>
        </div>
      </div>

</nav>


<script>
  $('#manage_my_account').click(function() {
    uni_modal("Manage Account", "manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
  $(document).ready(function(){
    $("#alertsDropdown").on("click", function(){
      $("#popup").fadeIn("slow");
    });

    $("#close").on("click", function (){
      $("#popup").fadeOut("slow");
    })

    $("#userDropdown").on("click", function(){
      $(".dropdown-menu").fadeIn("slow");
    });

    $("#closed").on("click", function (){
      $(".dropdown-menu").fadeOut("slow");
    })

  })
</script>