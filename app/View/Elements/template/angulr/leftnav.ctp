<aside id="aside" class="app-aside hidden-xs bg-dark" style="width: 230px;">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <nav ui-nav class="navi clearfix">
                <ul class="nav">
                    <li>
                        <div class="user-menu dropdown list-group">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="pull-left m-r thumb-sm">
                                    <img src="<?= Router::url('/', true) . $this->Session->read("credential.admin.User.profile_picture") ?>">
                                </span>
                                <span class="clear block m-b-none">
                                    <?= $this->Echo->fullName($this->Session->read("credential.admin.Biodata")) ?> <br>
                                    <small class="text-muted"><?= $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) ?></small>
                                </span>
                            </a>
                            <div class="dropdown-menu w-xl animated fadeInUp">
                                <center><img src="<?= Router::url('/', true) . $this->Session->read("credential.admin.User.profile_picture") ?>" class="img-circle"></center>
                                <div>
                                    <center><small><?= $this->Echo->fullName($this->Session->read("credential.admin.Biodata")) ?></small> <br> <small><?= $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) ?></small></center>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="<?= $url == "admin/dashboard" ? "active" : "" ?>">
                        <a href="<?= Router::url("/admin/dashboard", true) ?>" class="auto">                
                            <i class="icon-screen-desktop icon text-primary-dker"></i>
                            <span class="font-bold">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?= $url == "admin/employees/profil" ? "active" : "" ?>">
                        <a href="<?= Router::url("/admin/employees/profil", true) ?>">
                            <i class="icon-user"></i>
                            <span class="font-bold">Profil Anda</span>            
                        </a>
                    </li>
                    <?php

                    function leftSubMenu($menu, $urls) {
                        global $MID;
                        if (!empty($menu)) {
                            echo "<ul class='nav'>";
                            foreach ($menu as $subMenu) {
                                $expandable = !empty($subMenu['content']) ? "expand" : '';
                                $active = ($MID == "submenu_{$subMenu["submenuId"]}") ? "active" : "";
                                $newtab = '';
                                $icon = '';
                                if (empty($subMenu['alias'])) {
                                    $alias = "#";
                                } elseif (strpos($subMenu['alias'], "http") !== false || strpos($subMenu['alias'], "https") !== false) {
                                    $alias = $subMenu['alias'];
                                    $newtab = 'target="_blank"';
                                    $icon = '<i class="icon-new-tab"></i>';
                                } else {
                                    $alias = Router::url("/" . $subMenu['alias'] . "?mID=submenu_{$subMenu["submenuId"]}", true);
                                }
                                echo "<li class='{$active}'><a href='{$alias}' class='{$expandable}' {$newtab}>{$icon} " . __($subMenu['label']) . "</a>";
                                leftSubMenu($subMenu['content'], $urls);
                                echo "</li>";
                            }
                            echo "</ul>";
                        }
                    }

                    foreach ($leftSideMenuData as $menu) {
                        $urls = $this->StnAdmin->getOtherUrlName($url);
                        $expandable = !empty($menu['content']) ? "expand" : '';
                        $newtab = '';
                        $icon = '';
                        $active = $MID == "menu_{$menu["menuId"]}" ? "active" : "";
                        if (empty($menu['alias'])) {
                            $alias = "#";
                        } elseif (strpos($menu['alias'], "http") !== false || strpos($menu['alias'], "https") !== false) {
                            $alias = $menu['alias'];
                            $newtab = 'target="_blank"';
                            $icon = '<i class="icon-new-tab"></i>';
                        } else {
                            $alias = Router::url("/" . $menu['alias'] . "?mID=menu_{$menu["menuId"]}", true);
                        }
                        ?>
                        <li class="<?= $active ?>">
                            <a href="<?= $alias ?>" class="<?= $expandable ?>" <?= $newtab ?>>
                                <span class="font-bold"><?= $icon . " " . __($menu['label']) ?></span> 
                                <i class="<?= $menu['icon'] ?>"></i>
                            </a>
                            <?php
                            leftSubMenu($menu['content'], $urls);
                            ?>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="<?= $url == "admin/accounts/change_password" ? "active" : "" ?>">
                        <a href="<?= Router::url("/admin/accounts/change_password", true) ?>">
                            <span class="font-bold">Ganti Kata Sandi</span> 
                            <i class="icon-lock"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Router::url("/admin/logout", true) ?>">
                            <span class="font-bold">Logout/Keluar Aplikasi</span> 
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>