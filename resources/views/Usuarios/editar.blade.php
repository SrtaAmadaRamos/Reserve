<form>
    <fieldset disabled>
        <legend>Editar usuário</legend>
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nome</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
        </div>
        <div class="mb-3">
            <label for="disabledSelect" class="form-label">email</label>
            <select id="disabledSelect" class="form-select">
                <option>Disabled select</option>
            </select>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
                <label class="form-check-label" for="disabledFieldsetCheck">
                    Can't check this
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>
