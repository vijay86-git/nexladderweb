<?php
   $uri         =  service('uri');
   $segment     =  $uri->getSegment(2);

   $session_var =  \Config\Services::session();

   $admin_name  =  $session_var->get('name');

   $dashboard_active = '';
   $subjects_active  = '';
   $sections_active  = '';
   $topics_active    = '';
   $images_active    = '';

   switch ($segment) 
     {
            case 'dashboard':
                               $dashboard_active = "active";
                               break;

            case 'subjects':
                               $subjects_active = "active";
                               break;

            case 'sections':
                               $sections_active = "active";
                               break;

            case 'topics':
                               $topics_active = "active";
                               break;

            case 'images':
                               $images_active = "active";
                               break;
     }
?>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="https://www.gravatar.com/avatar/"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"><?php echo ucwords($admin_name); ?> <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="<?php echo route_to('admin.get.profile'); ?>">Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li><?php echo anchor(route_to('admin.dashboard.logout'), 'Logout', ["class='dropdown-item'"]); ?></li>
                    </ul>
                </div>
                <div class="logo-element">
                    BMS
                </div>
            </li>
        
            <li class="<?php echo $dashboard_active ?: ""; ?>">
                <?php echo anchor(route_to('admin.dashboard.index'), '<span class="nav-label">Dashboard</span>', ["class=''"]); ?>
            </li>

            <li class="<?php echo $subjects_active ?: ""; ?>">
                <?php echo anchor(route_to('admin.subjects.index'), '<span class="nav-label">Subjects</span>', ["class=''"]);?>
            </li>

            <li class="<?php echo $sections_active ?: ""; ?>">
                <?php echo anchor(route_to('admin.sections.index'), '<span class="nav-label">Sections</span>', ["class=''"]); ?>
            </li>

            <li class="<?php echo $topics_active ?: ""; ?>">
                <?php echo anchor(route_to('admin.topics.index'), '<span class="nav-label">Topics</span>', ["class=''"]); ?>
            </li>

            <li class="<?php echo $images_active ?: ""; ?>">
                <?php echo anchor(route_to('admin.images.index'), '<span class="nav-label">Images</span>', ["class=''"]); ?>
            </li>


        </ul>
    </div>
</nav>