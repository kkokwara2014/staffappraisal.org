<div>
    <h4>Professional Membership</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Professional Body </th>
                <th>Membership Category </th>
                <th>Memb. Num. </th>
                <th>Award Year </th>
                <th>
                    <button wire:click.prevent="add({{$i}})" class="btn btn-sm btn-success">
                        <span class="fa fa-plus"></span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody id="editProfbody">
            @foreach($inputs as $key => $value)
            <tr>
                <td style="width: 40%">
                    <input type="text" class="form-control form-control-sm"
                        name="profbody[]" 
                        placeholder="Professional Body">
    
                </td>
                <td style="width: 25%">
                    <input type="text" class="form-control form-control-sm"
                        name="membcategory[]" 
                        placeholder="Memb. Category">
    
                </td>
                <td style="width: 15%">
                    <input type="text" class="form-control form-control-sm"
                        name="membnumb[]" 
                        placeholder="Memb. Num.">
                </td>            
                <td style="width: 20%">
                    <input type="date" class="form-control form-control-sm"
                        name="awardyear[]">
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