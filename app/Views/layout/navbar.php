<header id="navbar-section">
  <div class="fixed-top">
    <!-- // ($title != 'Contact') ? 'bg-tranparent' : 'bg-secondary'; animate__rubberBand -->
    <nav class=" navbar navbar-expand-lg navbar-dark bg-tranparent animate__animated animate__rubberBand" id="mainNav">
      <div class="container">
        <a class="navbar-brand abc" href="/">Muhamad Ardi Nur Insan</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav p-1">
            <li class="nav-item <?= ($methodName == '/') ? 'active present' : ''; ?>">
              <a class="nav-link js-scroll-trigger abc" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?= ($methodName == '/about') ? 'active present' : ''; ?>">
              <a class="nav-link js-scroll-trigger abc" href="/about">About</a>
            </li>
            <li class="nav-item <?= ($methodName == '/contact') ? 'active present' : ''; ?>">
              <a class="nav-link js-scroll-trigger abc" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger abc" href="/poliklinik">Poliklinik</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>