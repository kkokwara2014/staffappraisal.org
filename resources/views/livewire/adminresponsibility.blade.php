<div>
    <h4>10. Administrative Responsibility <small>(Headship, Deanship, Chairman of Polytechnic Committee/Board, Member of Polytechnic Committee/Board)</small></h4>
    <table class="table">
        <thead>
            <tr>
                <th>Category </th>
                <th>Starting Date </th>
                <th>Ending Date </th>
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 60%">
                    <select name="admintype[]" class="form-control form-control-sm">
                        <option value="">Select Category</option>
                        <option value="Chairman of Polytechnic Committee">Chairman of Polytechnic Committee</option>
                        <option value="Chairman of School Committee">Chairman of School Committee</option>
                        <option value="Deanship">Deanship</option>
                        <option value="Headship">Headship</option>
                        <option value="Member of Polytechnic Committee">Member of Polytechnic Committee</option>
                        <option value="Member of School Committee">Member of School Committee</option>
                        <option value="Public Service to Federal Govt">Public Service to Federal Govt</option>
                        <option value="Public Service to State Govt">Public Service to State Govt</option>
                        <option value="Public Service to Local Govt">Public Service to Local Govt</option>
                    </select>
    
                </td>
                
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="startingyear[]">
                </td>
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="endingyear[]">
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

