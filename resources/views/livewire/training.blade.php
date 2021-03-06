<div>
    <h4>Training</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Training Type </th>
                <th>Caption </th>
                <th>Date </th>
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody id="editTrainingtable">
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 25%">
                    <select name="trainingtype[]" class="form-control form-control-sm">
                        <option value="">Select Training Type</option>
                        <option value="Course">Course</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Seminar">Seminar</option>
                       
                    </select>
    
                </td>
                <td style="width: 50%">
                    <input type="text" class="form-control form-control-sm"
                        name="caption[]"
                        placeholder="Caption">
    
                </td>
                <td style="width: 25%">
                    <input type="date" class="form-control form-control-sm"
                        name="trainingdate[]">
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