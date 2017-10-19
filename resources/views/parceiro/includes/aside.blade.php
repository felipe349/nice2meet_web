<aside class="aside aside-menu col-12" data-active="true">
    <ul class="flex-grid--wrap dashboard">
        <div class="col-12 dashboard-company pd-10">
            <figure class="flex-grid valign-middle halign-center">
                <image class="col-0" src="/assets/dist/images/parceiros/partner.ico" alt=""/>
                <figcaption class="col dashboard-hidden pd-10">
                    <p class="bold">{{ \Auth::guard('parceiro')->user()->nm_parceiro }} </p><BR>
                    <a href="/Parceiro/logout" class="bold" STYLE="color:orange"> SAIR</a>
                </figcaption>
            </figure>
        </div>
        <p class="dashboard-hidden col-12 pd-10 dashboard-title">MENU PRINCIPAL</p>
        <li class="flex-grid open-options">
            <div class="flex-grid dashboard-item">
                <div class="flex-grid dashboard-box">
                    <i class="fa fa-tachometer"></i>
                    <p class="dashboard-hidden item-name">Ofertas</p>
                    <span class="flex-grid arrow dashboard-hidden col self-middle halign-right">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </div>
                <ul class="options">
                    <p class="flex-grid valign-middle options-name">
                        Opções
                        <span class="arrow">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </p>
                    <li class="options-item">
                        <a href="/Parceiro/Oferta" class="link--white">
                            <i class="fa fa-list"></i>Listar
                        </a>
                    </li>
                    <li class="options-item">
                        <a href="/Parceiro/Oferta/Cadastrar" class="link--white">
                            <i class="fa fa-plus"></i>Cadastrar
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="flex-grid open-options">
            <div class="flex-grid dashboard-item">
                <div class="flex-grid dashboard-box">
                    <i class="fa fa-tachometer"></i>
                    <p class="dashboard-hidden item-name">Cupom</p>
                    <span class="flex-grid arrow dashboard-hidden col self-middle halign-right">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </div>
                <ul class="options">
                    <p class="flex-grid valign-middle options-name">
                        Opções
                        <span class="arrow">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </p>
                    <li class="options-item">
                        <a class='link--white' href="/Parceiro/Cupom/">
                            <i class="fa fa-list"></i>Listar
                        </a>
                    </li>
                    <li class="options-item">
                        <a href="/Parceiro/Cupom/Validar" class="link--white">
                            <i class="fa fa-check"></i>Validar
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="flex-grid">
            <a class="flex-grid dashboard-item" href="/Parceiro">
                <div class="flex-grid dashboard-box">
                    <i class="fa fa-user"></i>
                    <p class="dashboard-hidden item-name">Meus Dados</p>
                </div>
            </a>
        </li>
    </ul>
</aside>