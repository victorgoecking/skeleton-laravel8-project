<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Cadastar novo endereço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-row">
                        <div class="col-md-2 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" name="cep" id="cep" MAXLENGTH="9" placeholder="Ex.: 00000-000">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="publicPlace">Logradouro</label>
                            <input type="text" class="form-control" name="public_place" id="publicPlace" data-toggle="tooltip" data-placement="top" title="Logradouro obrigatório para cadastro de endereço. Caso vazio, o endereço será desconsiderado." placeholder="Ex.: Rua ...">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="number">Número</label>
                            <input type="text" class="form-control" name="number" id="number" placeholder="">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="disctrict">Bairro</label>
                            <input type="text" class="form-control" name="district" id="disctrict" placeholder="Ex.: Bairro ...">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="complement">Complemento</label>
                            <input type="text" class="form-control" name="complement" id="complement" placeholder="Ex.: APTO...">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="city">Cidade</label>
                            <select class="form-control" name="city" id="city">
                                <option value="-" >-</option>
                                <option value="MG">Teofilo Otoni</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="state">Estado</label>
                            <select class="form-control" name="state" id="state">
                                <option value="-" >-</option>
                                <option value="Minas Gerais">Minas Gerais</option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="uf">UF</label>
                            <select class="form-control" name="uf" id="uf">
                                <option value="-" >-</option>
                                <option value="MG">MG</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="noteAddress">Observação</label>
                            <input type="text" class="form-control" name="note_address" id="noteAddress" placeholder="Ex.: Endereço de entrega">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
