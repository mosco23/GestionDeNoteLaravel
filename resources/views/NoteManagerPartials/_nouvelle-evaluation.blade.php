<div class="mb-5" id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouvelle evaluation</h3></div>
                        <div class="card-body">
                            <p>
                                <label for="libelle">LIBELLE</label>
                                <input type="text" wire:model="libelle">
                            </p>
                            <div class="form-group mt-4 mb-0">
                                <button wire:click="addEvaluation" class="btn-primary w-100">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>