<div>
    <h4>Academic Qualification</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Qualification <small style="color: red">*</small></th>
                {{--  <th> of Degreee <small style="color: red">*</small></th>  --}}
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
                        <option selected="disabled">Select Qualification</option>
                        <option value="Ph.D">Ph.D</option>
                        <option value="MSc">MSc</option>
                        <option value="MSc.Eng">MSc.Eng</option>
                        <option value="MSc.Ed">MSc.Ed</option>
                        <option value="MEd">MEd</option>
                        <option value="MBA">MBA</option>
                        <option value="MA">MA</option>
                        <option value="PGD">PGD</option>
                        <option value="PGDE">PGDE</option>
                        <option value="BA">BA</option>
                        <option value="BSc">BSc</option>
                        <option value="BSc.Ed">BSc.Ed</option>
                        <option value="HND">HND</option>
                        <option value="BEd">BEd</option>
                        <option value="ND">ND</option>
                        <option value="NCE">NCE</option>
                        <option value="A-level">A-level</option>
                        <option value="O-level">O-level</option>
                        <option value="FSLC">FSLC</option>
                    </select>
    
                </td>
                {{--  <td style="width: 20%">
                    <select name="degreeclass[]" class="form-control form-control-sm qualname"
                        required>
                        <option selected="diabled">Degree Class</option>
                        <option value="1st Class/Distinction">1st Cl./Distinction</option>
                        <option value="2nd Class Upper/Upper Credit">2nd Cl. Upper/Upper Credit</option>
                        <option value="2nd Class/Lower Credit">2nd Cl./Lower Credit</option>
                        <option value="3rd Class/Pass">3rd Cl./Pass</option>
                        <option value="Others">Others</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>  --}}
                <td style="width: 60%">
                    <input type="text" class="form-control form-control-sm"
                        name="awardinginst[]" required
                        placeholder="Awarding Institution e.g. AIFPU">
                </td>
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="dateofgrad[]" required placeholder="Grad. Year">
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