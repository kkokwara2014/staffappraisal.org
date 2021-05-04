<div>
    <h4>2. Professional Membership</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Award </th>
                <th>Honor </th>
                <th>Member </th>
                {{-- <th>File <small style="color: red">[PDF only]</small></th> --}}
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
                <td style="width: 30%">
                    <input type="text" class="form-control form-control-sm"
                        name="award[]" 
                        placeholder="Award">
    
                </td>
                <td style="width: 40%">
                    <input type="text" class="form-control form-control-sm"
                        name="honour[]" 
                        placeholder="Honour">
    
                </td>
                <td style="width: 30%">
                    <input type="text" class="form-control form-control-sm"
                        name="member[]" 
                        placeholder="Member">
                </td>            
                {{-- <td style="width: 10%">
                    <input type="file" name="profmembfilename[]" required>
                </td> --}}
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