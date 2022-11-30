<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu">
            
            <?php
            
            if($_SESSION["cc_user_console"] == "admin"){
                
                echo '<li>
                <a href="inicio">
                <i class="fa fa-home"></i>
                <span>Inicio</span>
                </a>
            </li>

            <li>
                <a href="log-activity">
                <i class="fa fa-archive"></i>
                <span>Log de actividades</span>
                </a>
            </li>

          <li>
                <a href="users-centros-comerciales">
                <i class="fa fa-building-o"></i>
                <span>Centros Comerciales</span>
                </a>
            </li>

         <li>
                <a href="users-console">
                <i class="fa fa-users"></i>
                <span>Usuarios Consola</span>
                </a>
            </li>
            
            <li>
            <a href="events">
            <i class="fa fa-bullhorn"></i>
            <span>Eventos</span>
            </a>
            </li>

            <li>
            <a href="intereses">
            <i class="fa fa-diamond"></i>
            <span>Intereses</span>
            </a>
            </li>

            ';
                
            }else{
                
                echo '<li>
                <a href="inicio">
                <i class="fa fa-home"></i>
                <span>Inicio</span>
                </a>
            </li>
            
            <li>
            <a href="events">
            <i class="fa fa-bullhorn"></i>
            <span>Eventos</span>
            </a>
            </li>

            <li>
            <a href="intereses">
            <i class="fa fa-diamond"></i>
            <span>Intereses</span>
            </a>
            </li>
            
            ';
                
            }
            
            
            ?>

        

        </ul>

    </section>
    
</aside>