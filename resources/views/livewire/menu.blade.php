<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{Route('home')}}">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="btn nav-item nav-link active" href="{{Route('mentions')}}">MENTIONS</a>
        <a class="btn nav-item nav-link active" href="{{Route('specialites')}}">SPECIALITES</a>
        <a class="btn nav-item nav-link active" href="{{Route('niveaux')}}">NIVEAUX</a>
        <a class="btn nav-item nav-link active" href="{{Route('semestres')}}">SEMESTRES</a>
        <a class="btn nav-item nav-link active" href="{{Route('etudiants')}}">ETUDIANTS</a>
      </div>
    </div>
</nav>