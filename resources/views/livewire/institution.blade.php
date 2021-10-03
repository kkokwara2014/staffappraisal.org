<div>
    <h4>Institution Attended</h4>
    <table class="table">
        <thead>
            <tr>
        
                <th>Institution <small style="color: red">*</small></th>
                <th>Start Date <small style="color: red">*</small></th>
                <th>End Date <small style="color: red">*</small></th>
               
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody class="editmoreInstitution" id="editmoreInstitution" data-new="Chukwudi">
            @foreach($inputs as $key => $value)
            <tr>
                
                <td style="width: 60%">
                    <input type="text" class="form-control form-control-sm"
                        name="institutionname[]" required
                        placeholder="Institution Name e.g. AIFPU">
                </td>
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="startdate[]" required placeholder="Start Year">
                </td>
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="enddate[]" required placeholder="End Year">
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
