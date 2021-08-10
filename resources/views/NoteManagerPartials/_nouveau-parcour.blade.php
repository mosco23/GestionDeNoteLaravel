<div class="mb-5" id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouveau Semestre parcours</h3></div>
                        <div class="card-body">
                            <p>
                                <label for="code">Code</label>
                                <input type="text" value="{{$code}}" wire:model="code">
                            </p>
                            <p>
                                <label for="libelle">libelle</label>
                                <input type="text" value="{{$libelle}}" wire:model="libelle">
                            </p>
                            <p>
                                <label for="mention">Mention</label>
                                <select wire:model="mentionSelected" name="mention" id="mention">
                                    @foreach ($mentions as $mention)
                                        <option value="{{$mention->id}}">{!! $mention->libelle !!}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="semestre">Semestre</label>
                                <select wire:model="semestreSelected" name="semestre" id="semestre">
                                    @foreach ($semestres as $semestre)
                                        <option value="{{$semestre->id}}">{{$semestre->libelle}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="niveau">Niveau</label>
                                <select wire:model="niveauSelected" name="niveau" id="niveau">
                                    @foreach ($niveaux as $niveau)
                                        <option value="{{$niveau->id}}">{!! $niveau->libelle !!}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="specialite">Specialite</label>
                                <select wire:model="specialiteSelected" name="specialite" id="specialite">
                                    @foreach ($specialites as $specialite)
                                        <option value="{{$specialite->id}}">{!! $specialite->libelle !!}</option>
                                    @endforeach
                                </select>
                            </p>
                            <div class="form-group mt-4 mb-0">
                                <button wire:click="addParcour" class="btn-primary w-100">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>