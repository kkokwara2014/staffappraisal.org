<div>
    <h4>Summary of Teaching Load <small>(Normal teaching loead per week is as prescribed by the Polytechnic for each grade of Lecturer).</small></h4>
    <table class="table">
        <thead>
            <tr>
                <th>Semester <small style="color: red">*</small></th>
                <th>Year <small style="color: red">*</small></th>
                <th>Credit Hours/Week <small style="color: red">*</small></th>
                <th>Normal Load (Hours)/Week <small style="color: red">*</small></th>
                <th>Excess Load (Hours)/Week <small style="color: red">*</small></th>
                                
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody id="editTeachingLoad">
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 20%">
                    <select name="teachingloadsemester[]" class="form-control form-control-sm qualname"
                        required>
                        <option value="">Select
                            Semester</option>
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
                        <option value="Semester 3">Semester 3</option>
                        
                    </select>
    
                </td>
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="teachingloadyear[]" required>
                </td>
                <td style="width: 20%">
                    <input type="text" class="form-control form-control-sm"
                        name="teachingloadcredithour[]" required
                        placeholder="Credit Hour" pattern="[0-9]+" maxlength="3">
                </td>
                <td style="width: 20%">
                    <input type="text" class="form-control form-control-sm"
                        name="teachingnormalload[]" required
                        placeholder="Normal Load" pattern="[0-9]+" maxlength="3">
                </td>
                <td style="width: 20%">
                    <input type="text" class="form-control form-control-sm"
                        name="teachingexcessload[]" required
                        placeholder="Excess Load" pattern="[0-9]+" maxlength="3">
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

