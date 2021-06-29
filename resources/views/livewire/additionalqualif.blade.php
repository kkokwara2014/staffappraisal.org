<div>
    <h4>6. Additional Qualification</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Qualification Type </th>
                <th>Date Obtained </th>
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody id="editAdditionalQualif">
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 75%">
                    <input type="text" class="form-control form-control-sm"
                        name="qualificationtype[]"
                        placeholder="Qualification Name">
    
                </td>
                
                <td style="width: 25%">
                    <input type="date" class="form-control form-control-sm"
                        name="dateobtained[]">
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