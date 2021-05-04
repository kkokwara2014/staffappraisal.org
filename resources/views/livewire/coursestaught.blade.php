<div>
    <h4>11. Courses Taught <small>Courses taught during past three years. (Where there are more than one Lecturer for a Course, indicate your own contribution and teaching load).</small></h4>
    <table class="table">
        <thead>
            <tr>
                <th>Course Code <small style="color: red">*</small></th>
                <th>Course Title <small style="color: red">*</small></th>
                <th>Credit Hour <small style="color: red">*</small></th>
                <th>Semester <small style="color: red">*</small></th>
                <th>Year <small style="color: red">*</small></th>
                
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
                <td style="width: 15%">
                    <input type="text" class="form-control form-control-sm"
                        name="taughtcoursecode[]" required
                        placeholder="Course Code">
                </td>
                <td style="width: 40%">
                    <input type="text" class="form-control form-control-sm"
                        name="taughtcoursetitle[]" required
                        placeholder="Course Title">
                </td>
                <td style="width: 15%">
                    <input type="text" class="form-control form-control-sm"
                        name="taughtcredithour[]" required
                        placeholder="Credit Hour" pattern="[0-9]+">
                </td>
                <td style="width: 20%">
                    <select name="taughtsemester[]" class="form-control form-control-sm qualname"
                        required>
                        <option value="">Select
                            Semester</option>
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
                        <option value="Semester 3">Semester 3</option>
                    </select>
    
                </td>
                <td style="width: 10%">
                    <input type="date" class="form-control form-control-sm"
                        name="taughtyear[]" required>
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
