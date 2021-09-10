<div>
    <h4>Promotion</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Promotion Date </th>
                <th>Grade </th>
                {{-- <th>File <small style="color: red">[PDF only]</small></th> --}}
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody id="editPromotiontable">
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 50%">
                    <input type="date" class="form-control form-control-sm"
                        name="promodate[]" 
                        placeholder="Promotion Date">
    
                </td>
                
                <td style="width: 50%">
                    <input type="text" class="form-control form-control-sm"
                        name="grade[]" 
                        placeholder="Grade">
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