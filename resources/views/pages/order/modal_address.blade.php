<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Cadastar novo endereço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formModalNewAddress" class="needs-validation" method="POST" action="{{ route('address.store') }}" novalidate>
                @csrf

                <div class="modal-body">
                    <input type="hidden" id="id_client" name="id_client">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" name="cep" id="cep" MAXLENGTH="9" placeholder="Ex.: 00000-000">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="publicPlace">Logradouro</label>
                            <input type="text" class="form-control" name="public_place" id="publicPlace" placeholder="Ex.: Rua ..." required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="number">Número</label>
                            <input type="text" class="form-control" name="number" id="number" placeholder="">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="disctrict">Bairro</label>
                            <input type="text" class="form-control" name="district" id="district" placeholder="Ex.: Bairro ...">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="complement">Complemento</label>
                            <input type="text" class="form-control" name="complement" id="complement" placeholder="Ex.: APTO...">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="city">Cidade</label>
                            <select class="form-control" name="city" id="city" required>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="state">Estado</label>
                            <select class="form-control" name="state" id="state">
                                @foreach($states as $state)
                                    <option value="{{$state->id}}" {{$state->uf === "MG" ? 'selected' : ''}}>{{$state->uf}} - {{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="noteAddress">Observação</label>
                            <input type="text" class="form-control" name="note_address" id="noteAddress" placeholder="Ex.: Endereço de entrega">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" id="registerAddress" class="btn btn-primary">Cadastrar endereço</button>
                </div>
            </form>
        </div>
    </div>
</div>
