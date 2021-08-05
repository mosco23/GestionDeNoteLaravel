<div class="mb-5 mt-5" id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouvel etudiant</h3></div>
                        <div class="card-body">
                            <p>
                                <label for="nce">Nce</label>
                                <input type="text" value="{{$nce}}" wire:model="nce">
                            </p>
                            <p>
                                <label for="nom">Nom</label>
                                <input type="text" value="{{$nom}}" wire:model="nom">
                            </p>
                            <p>
                                <label for="prenoms">Prenoms</label>
                                <input type="text" value="{{$prenoms}}" wire:model="prenoms">
                            </p>
                            <div class="form-group mt-4 mb-0">
                                <button wire:click="addEtudiant" class="btn-primary w-100">Ajouter</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>