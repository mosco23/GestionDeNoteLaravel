<div class="mb-5 mt-5" id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Nouvelle ECUE</h3></div>
                        <div class="card-body">
                            <p>
                                <label for="libelle">LIBELLE</label>
                                <input type="text" value="{{$libelle}}" wire:model="libelle">
                            </p>
                            <p>
                                <label for="nbreCredit">NOMBRE DE CREDIT</label>
                                <input type="text" value="{{$nbreCredit}}" wire:model="nbreCredit">
                            </p>
                            <p>
                                <label for="l">UE</label>
                                <select wire:model="ueSelected" name="ueSelected" id="ueSelected">
                                    @foreach ($ues as $ue)
                                        <option value="{{$ue->id}}">{{$ue->libelle}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <div class="form-group mt-4 mb-0">
                                <button wire:click="addEcue" class="btn-primary w-100">Ajouter</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>