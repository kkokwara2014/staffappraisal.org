<div>
    <h4>Academic Qualifications Obtained</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Qualification <small style="color: red">*</small></th>
                <th>Date Obtained <small style="color: red">*</small></th>
                <th>Specialization <small style="color: red">*</small></th>
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody class="moreJuniorQualification" id="moreJuniorQualification">
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 30%">
                    <select name="qualification[]" class="form-control form-control-sm qualname"
                        required>
                        <option value="">Select
                            Qualification</option>
                        <option value="PhD">Ph.D</option>
                        <option value="MSc">MSc</option>
                        <option value="MEd">MEd</option>
                        <option value="MBA">MBA</option>
                        <option value="MA">MA</option>
                        <option value="PGD">PGD</option>
                        <option value="PGDE">PGDE</option>
                        <option value="BA">BA</option>
                        <option value="BSc">BSc</option>
                        <option value="HND">HND</option>
                        <option value="BEd">BEd</option>
                        <option value="ND">ND</option>
                        <option value="NCE">NCE</option>
                        <option value="O-level">O-level
                        </option>
                        <option value="FSLC">FSLC
                        </option>
                    </select>
    
                </td>
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="dateobtained[]" required placeholder="Date Obtained">
                </td>
                <td style="width: 50%">
                    <input type="text" class="form-control form-control-sm"
                        name="specialization[]" required
                        placeholder="Specialization e.g. Wood Work">
                </td>
                
                <td>
                    <button wire:click.prevent="remove({{$key}})" class="btn btn-danger btn-sm">
                        <span class="fa fa-times"></span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

