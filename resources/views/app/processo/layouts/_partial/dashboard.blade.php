<div class="row">
  <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="flex-shrink-0 p-3" style="width: 280px;">
        <ul class="list-unstyled ps-2 nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('app.home')}}">
              <i class="bi bi-house"></i>
              HOME
            </a>
          </li>
          <li class="mb-1">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                <i class="bi bi-archive"></i>
                  Caixa
                </a>
            <div class="collapse" id="dashboard-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{ route('caixa.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-inboxes"></i>Lista Caixas</a></li>
                <li><a href="{{ route('caixa.create') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-box-arrow-up"></i>Nova Caixa</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                <i class="bi bi-file-earmark-medical"></i>
                  Protocolo
                </a>
            <div class="collapse" id="orders-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-files"></i>Lista Protocolos</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-search"></i>Busca Protocolos</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-file-plus"></i>Novo Protocolo</a></li>
              </ul>
            </div>
          </li>
          
        </ul>

      </div>
    </div>
  </div>