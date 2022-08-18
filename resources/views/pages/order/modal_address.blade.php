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
                            <label for="customCEP1">CEP</label>
                            <input type="text" class="form-control" name="cep" id="customCEP1" MAXLENGTH="9" placeholder="Ex.: 00000-000">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationPublicPlace1">Logradouro</label>
                            <input type="text" class="form-control" name="public_place" id="validationPublicPlace1" data-toggle="tooltip" data-placement="top" title="Logradouro obrigatório para cadastro de endereço. Caso vazio, o endereço será desconsiderado." placeholder="Ex.: Rua ...">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="validationNumber1">Número</label>
                            <input type="text" class="form-control" name="number" id="validationNumber1" placeholder="">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationDistrict1">Bairro</label>
                            <input type="text" class="form-control" name="district" id="validationDistrict1" placeholder="Ex.: Bairro ...">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationCompletemnt1">Complemento</label>
                            <input type="text" class="form-control" name="complement" id="validationCompletemnt1" placeholder="Ex.: APTO...">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="selectCity1">Cidade</label>
                            <select class="form-control" name="city" id="selectCity1">
                                <option value="-" >-</option>
                                <option value="MG">Teofilo Otoni</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="selectState1">Estado</label>
                            <select class="form-control" name="state" id="selectState1">
                                <option value="-" >-</option>
                                <option value="Minas Gerais">Minas Gerais</option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="selectUF1">UF</label>
                            <select class="form-control" name="uf" id="selectUF1">
                                <option value="-" >-</option>
                                <option value="MG">MG</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="customNoteAddress1">Observação</label>
                            <input type="text" class="form-control" name="note_address" id="customNoteAddress1" placeholder="Ex.: Endereço de entrega">
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

<script src="{{ asset('admin/js/searchCep.js')}}"></script>
