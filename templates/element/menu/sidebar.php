<?php
$c_name = $this->request->getParam('controller');
$a_name = $this->request->getParam('action');
?>
<!-- Menu -->
<nav id="sidebar" class="custom-sidebar shadow">
    <div class="sidebar-header pt-2 ps-3">
        <b class="gradient-animate-small">
  <b class="logo-small"><i class="fa-solid fa-house"></i></b> 
  <?php echo $system_abbr; ?>
</b>

    </div>
    <style>
       .gradient-animate-small {
    background: linear-gradient(to right, 
        #fbe9dc,  /* cream */
        #f7944d,  /* orange */
        #de5e91,  /* pinkish */
        #a455c1   /* purple */
    );
    background-size: 100% 100%; /* ensures no scrolling effect */
    background-position: center;
    background-repeat: no-repeat;
    
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
    
    display: inline-block;
    font-weight: bold;

    animation: none !important; /* disables any inherited animation */
}



        .custom-sidebar {
            background-color: #1a1c1fff; /* your preferred dark color */
            color: #ffffff !important; /* force white text */
            }

        .custom-sidebar a,
        .custom-sidebar li,
        .custom-sidebar span,
        .custom-sidebar p {
        color: #ffffff !important;
        }
        .gradient_line {
    height: 4px; /* increased for visibility */
    background: linear-gradient(to right, 
        #fbe9dc,  /* cream */
        #f7944d,  /* orange */
        #de5e91,  /* pinkish */
        #a455c1   /* purple */
    );
    border-radius: 4px;
}
    </style>
    <div class="px-0">
        <ul class="list-unstyled components">
            
            <?php if ($this->Identity->isLoggedIn() == NULL) {
            ?>
                <li class="menu-item">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-right-to-bracket"></i> Sign-in'), ['controller' => 'Users', 'action' => 'login', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
            <?php } ?>
            <?php if ($this->Identity->isLoggedIn()) {
            ?>
                <li class="menu-item">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-chart-simple"></i> Dashboard'), ['controller' => 'Dashboards', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
                <li class="menu-item <?= $c_name == 'Users' && $a_name == 'profile' ? 'active' : '' ?>">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-user-tie"></i> Profile'), ['controller' => 'Users', 'action' => 'profile', 'prefix' => false, $this->Identity->get('slug')], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
            <?php }
            ?>
            
            <li class="menu-item">
                <?= $this->Html->link(__('<i class="menu-icon fa-regular fa-message"></i> Contact Us'), ['controller' => 'Contact', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
            </li>
            <li class="menu-item">
                <?= $this->Html->link(__('<i class="menu-icon fa-regular fa-circle-question"></i> FAQ'), ['controller' => 'Faqs', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
            </li>
            
            
            <?php if ($this->Identity->isLoggedIn()  && $this->Identity->get('user_group_id') == '3') {
            ?>
                <li class="menu-header fw-bold text-uppercase mt-4 mb-3">
                        <div class="gradient_line mb-3"></div>
                </li>
                <li class="menu-item">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-graduation-cap"></i></i>NR Registration'), ['controller' => 'Students', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
                <li class="menu-item <?= $c_name == 'Houses' && $a_name == 'index' ? 'active' : '' ?>">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-house"></i> Houses'), ['controller' => 'Houses', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
                <li class="menu-item <?= $c_name == 'Reservations' && $a_name == 'index' ? 'active' : '' ?>">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-file-contract"></i> Reservations'), ['controller' => 'Reservations', 'action' => 'index','prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
            <?php } ?>

            <?php if ($this->Identity->isLoggedIn()) { ?>
                
                <?php if ($this->Identity->isLoggedIn() && $this->Identity->get('user_group_id') == '1') { ?>
                    <!-- Administrator -->
                    <li class="menu-header fw-bold text-uppercase mt-4 mb-3">
                        <span class="menu-header-text ps-4">Administrator</span>
                        <div class="gradient_line mb-3"></div>
                    </li>
                    <li class="menu-item">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-graduation-cap"></i></i> NR Students'), ['prefix' => 'Admin', 'controller' => 'Students', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Houses' && $a_name == 'index' ? 'active' : '' ?>">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-house"></i> Houses Verification'), ['prefix' => 'Admin', 'controller' => 'Houses', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Settings' && $a_name == 'update' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-gear"></i> Site Configuration'), ['prefix' => 'Admin', 'controller' => 'Settings', 'action' => 'update', 'recrud'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Users' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-users-viewfinder"></i> User Management'), ['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    
                    <li class="menu-item <?= $c_name == 'Contacts' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-regular fa-message"></i> Contacts'), ['prefix' => 'Admin', 'controller' => 'Contacts', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'AuditLogs' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-timeline"></i> Audit Trail'), [
                            'prefix' => 'Admin',
                            'controller' => 'auditLogs',
                            'action' => 'index',
                            //'?' => ['limit' => '25', 'status' => '1']
                        ], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Faqs' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-regular fa-circle-question"></i> FAQ'), ['prefix' => 'Admin', 'controller' => 'Faqs', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if ($this->Identity->isLoggedIn()) { ?>
                
                <?php if ($this->Identity->isLoggedIn() && $this->Identity->get('user_group_id') == '2') { ?>
                    <!-- Landlord -->
                    <li class="menu-header fw-bold text-uppercase mt-4 mb-3">
                        <span class="menu-header-text ps-4">Landlord</span>
                        <div class="gradient_line mb-3"></div>
                    </li>
                <li class="menu-item <?= $c_name == 'Houses' && $a_name == 'index' ? 'active' : '' ?>">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-house"></i> Houses Registration'), ['prefix' => 'Landlord', 'controller' => 'Houses', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
                <li class="menu-item <?= $c_name == 'Reservations' && $a_name == 'index' ? 'active' : '' ?>">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-file-contract"></i> Reservations'), ['prefix' => 'Landlord', 'controller' => 'Reservations', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</nav>
<!-- / Menu -->