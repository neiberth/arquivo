<div class="row">
  <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
      
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>

      <div class="flex-shrink-0 ps-2 " style="width: 240px;">
        <ul class="list-unstyled ps-2 nav flex-column justify-content-md-center">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('app.home') }}">
              <p class="fs-5 mb-0 fw-medium"><i class="bi bi-house"></i> Home</p></a>
          </li>
          <li class="mb-1">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                <p class="fs-5 mb-0 fw-medium"><i class="bi bi-box-seam"></i> Caixa</p>
              </a>
            <div class="collapse" id="dashboard-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li>
                  <a href="{{ route('caixa.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">
                    <p class="fs-6 mb-0 fw-semibold ps-3"><i class="bi bi-inboxes"></i> Lista Caixas</p>
                  </a>
                </li>
                <li>
                  <a href="{{ route('caixa.create') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">
                    <p class="fs-6 mb-0 fw-semibold ps-3"><i class="bi bi-check2-square"></i> Nova Caixa</p>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                <p class="fs-5 mb-0 fw-medium"><i class="bi bi-file-medical"></i> Protocolo</p></a>
            <div class="collapse" id="orders-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li>
                  <a href="{{ route('processo.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">
                    <p class="fs-6 mb-0 fw-semibold ps-3"><i class="bi bi-files"></i> Lista Protocolos</p>
                  </a>
                </li>
                <li>
                  <a href="{{ route('processo.create') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">
                    <p class="fs-6 mb-0 fw-semibold ps-3"><i class="bi bi-file-plus"></i> Novo Protocolo</p>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          
        </ul>

      </div>
    </div>
  </div>