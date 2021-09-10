<div>
    <h4>Production and Achievements <small>(Patents, Inventions, Trademarks, Copyright, Designs, Consultancy, Feasibility Studies)</small></h4>
    <table class="table">
        <thead>
            <tr>
                <th>Production Type </th>
                <th>Title </th>
                <th>Date </th>
                {{-- <th>File </th> --}}
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody id="editAchievement">
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 25%">
                    <select name="prodtype[]" class="form-control form-control-sm">
                        <option value="">Select
                            Production Type</option>
                        <option value="Consultancy">Consultancy</option>
                        <option value="Copyright">Copyright</option>
                        <option value="Design">Design</option>
                        <option value="Feasibility Study">Feasibility Study</option>
                        <option value="Invention">Invention</option>
                        <option value="Member of Professional Body">Member of Professional Body</option>
                        <option value="Patent">Patent</option>
                        <option value="Trademark">Trademark</option>
                    </select>
    
                </td>
                <td style="width: 60%">
                    <input type="text" class="form-control form-control-sm"
                        name="prodtitle[]"
                        placeholder="Title of Production">
    
                </td>
                <td style="width: 15%">
                    <input type="date" class="form-control form-control-sm"
                        name="yearofprod[]">
                </td>
                {{-- <td style="width: 10%">
                    <input type="file" name="prodfilename[]">
                </td>            --}}
                
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
