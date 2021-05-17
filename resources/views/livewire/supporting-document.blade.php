<div>
    <h4> Supporting Documents <small>(Please ensure that all your documents are in Portable Document Format (PDF) only)</small></h4>
    <table class="table">
        <thead>
            <tr>
                <th>Document Type </th>
                <th>File </th>
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
                    <select name="documenttype[]" class="form-control form-control-sm">
                        <option value="">Select Document Type</option>
                        <option value="Certification">Certificate</option>
                        <option value="Transcript">Transcript</option>
                        <option value="Statement of Result">Statement of Result</option>
                        <option value="OLevel">OLevel</option>
                        <option value="FSLC">FSLC</option>
                        <option value="Other">Other</option>
                    </select>
    
                </td>
                
                <td style="width: 40%">
                    <input type="file" name="supportingdoc[]" required>
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
