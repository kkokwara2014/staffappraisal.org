<div>
    <h4>1. Academic Qualification</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Qualification <small style="color: red">*</small></th>
                <th>Institution <small style="color: red">*</small></th>
                <th>Grad. Date <small style="color: red">*</small></th>
                {{-- <th>File <small style="color: red">[PDF only]</small></th> --}}
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody class="moreQualification">
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 20%">
                    <select name="qualname[]" class="form-control form-control-sm qualname"
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
                    </select>
    
                </td>
                <td style="width: 60%">
                    <input type="text" class="form-control form-control-sm"
                        name="awardinginst[]" required
                        placeholder="Awarding Institution e.g. AIFPU">
                </td>
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="dateofgrad[]" required placeholder="Grad. Year">
                </td>
                
                {{-- <td style="width: 10%">
                    <input type="file" name="qualifilename[]" required>
                </td> --}}
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