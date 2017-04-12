<header class="header">
    <nav class="flex-grid--wrap header__menu">
        <li class="flex-grid halign-center valign-middle admin-cp children-dashboard" data-active="true">
            <p>
                <strong>N2M</strong>
                <span class="admin-cp__text">NICE2MEET</span>
            </p>
        </li>
        <li class="menu__item open-aside" data-active="true">
            <i class="fa fa-th item__inside flex-grid"></i>
        </li>
        <ul class="flex-grid col-0 menu-user">
            <li class="menu__item active user-item open-sub">
                <figure class="item__inside flex-grid">
                    <img class="user-image" src="/assets/dist/images/users/default.png" />
                    <figcaption class="user-legend">{{ \Auth::guard('parceiro')->user()->nm_parceiro }}</figcaption>
                </figure>
                
                <ul class="flex-grid--wrap valign-right sub-menu--gadgets">
                    <div class="flex-grid--wrap gadgets__box">
                        <li class="sub-menu__item col-12">
                            <a href="/Parceiro/logout" class="flex-grid sub-menu__inside">
                                <i class="fa fa-sign-out flex-grid valign-middle halign-center">&nbsp; Sair</i>
                            </a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </nav>
</header>