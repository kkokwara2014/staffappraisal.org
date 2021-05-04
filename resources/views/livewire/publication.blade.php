<div>
    <h4>8. Publication <small>(Books, Journal Articles, Conference Papers, Seminar Papers, Creative Writings)</small></h4>
    <table class="table">
        <thead>
            <tr>
                <th>Publication Type </th>
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
        <tbody>
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 25%">
                    <select name="pubtype[]" class="form-control form-control-sm">
                        <option value="">Select
                            Publication Type</option>
                        <option value="Book">Book</option>
                        <option value="Journal">Journal</option>
                        <option value="Conference">Conference</option>
                        <option value="Seminar">Seminar</option>
                        <option value="Creative Writing">Creative Writing</option>
                    </select>
    
                </td>
                <td style="width: 60%">
                    <input type="text" class="form-control form-control-sm"
                        name="title[]"
                        placeholder="Title of Publication">
    
                </td>
                <td style="width: 15%">
                    <input type="date" class="form-control form-control-sm"
                        name="yearofpub[]">
                </td>
                {{-- <td style="width: 10%">
                    <input type="file" name="pubfilename[]">
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
