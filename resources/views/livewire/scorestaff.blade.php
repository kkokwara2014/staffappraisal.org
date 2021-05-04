<div>
    
    {{-- <button wire:click="$set('showform', true)" class="btn btn-primary btn-sm"><span class="fa fa-check"></span> Score this Staff</button>
    <button wire:click="$set('showform', false)" class="btn btn-default btn-sm">Cancel</button>
    @if ($showform) --}}
    <p>
        <br>
        <form action="{{ route('store.appraisal.score') }}"  method="post">
            @csrf
            
                        
            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
            <input type="hidden" name="user_id" value="{{ $staff_id }}">

            <div class="row">
                <div class="col-md-10">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <td><strong>Heading</strong></td>
                                <td><strong>Score</strong></td>
                                <td><strong>Total Score</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Publication (Max. Score: 20)</strong>
                                    <div>
                                        Books
                                    </div>
                                    <div>
                                        Journal Articles
                                    </div>
                                    <div>
                                        Published Conference papers
                                    </div>
                                    <div>
                                        Seminar papers
                                    </div>
                                    <div>
                                        Creative Writings
                                    </div>
                                
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" wire:model.lazy="publicationscore" name="publicationscore" value="{{ old('publicationscore') }}" class="form-control" placeholder="Publication Score" pattern="[0-9]+" maxlength="2">
                                        <div>
                                            @error('publicationscore')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    
                                        <span class="badge badge-pill badge-success" style="background-color: green; color: seashell">
                                            <strong>{{ $totalscore }}</strong>
                                        </span>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Production &amp; Achievements (Max. Score: 25)</strong>
                                    <div>
                                        Patents
                                    </div>
                                    <div>
                                        Inventions
                                    </div>
                                    <div>
                                        Trademarks
                                    </div>
                                    <div>
                                        Copyrights
                                    </div>
                                    <div>
                                        Designs
                                    </div>
                                    <div>
                                        Consultancy
                                    </div>
                                    <div>
                                        Feasibility Studies
                                    </div>
                                    <div>
                                        Membership of Learned/Professional Bodies
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" wire:model.lazy="productionscore" value="{{ old('productionscore') }}" name="productionscore" class="form-control" placeholder="Production Score" pattern="[0-9]+" maxlength="2">
                                        <div>
                                            @error('productionscore')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Administrative Responsibility (Max. Score: 10)</strong>
                                    <div>
                                        Deanship
                                    </div>
                                    <div>
                                        Headship
                                    </div>
                                    <div>
                                        Chairman of Polytechnic Committee/Boards
                                    </div>
                                    <div>
                                        Member of Polytechnic Committee/Boards
                                    </div>
                                    <div>
                                        Chairman of School Committee/Board
                                    </div>
                                    <div>
                                        Member of School Committee/Board
                                    </div>
                                    <div>
                                        Membership of Learned/Professional Bodies
                                    </div>
                                    <div>
                                        Public Service Render:
                                        <p>
                                            <ol>
                                                <li>Federal Government</li>
                                                <li>State Government</li>
                                                <li>Local Government</li>
                                            </ol>
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" wire:model.lazy="adminresponscore" name="adminresponscore" class="form-control" placeholder="Admin. Resp. Score" pattern="[0-9]+" maxlength="2">
                                        <div>
                                            @error('adminresponscore')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Academic Qualifications (Max. Score: 10)</strong>
                                    <div>
                                        Ph.D
                                    </div>
                                    <div>
                                        Masters Degree
                                    </div>
                                    <div>
                                        Postgraduate Diploma (Post B.A, B.S., HND)
                                        <p>
                                            B.A.,/B.Sc. 1<sup>st</sup> Class Hons (or HND with Distinction)
                                        </p>
                                    </div>
                                    <div>
                                        B.A.,/B.Sc. 2<sup>nd</sup> Class (Hons) Upper Division (or HND Upper Credit)
                                    </div>
                                    <div>
                                        B.A.,/B.Sc. 2<sup>nd</sup> Class (Hons) Lower Division (or HND Lower Credit)
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" wire:model.lazy="qualificationscore" name="qualificationscore" class="form-control" placeholder="Acad. Qualification Score" pattern="[0-9]+" maxlength="2">
                                        <div>
                                            @error('qualificationscore')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Teaching Ability/Other Abilities (Max. Score: 15)</strong>
                                    <div>
                                        Knowledge of the Subject
                                    </div>
                                    <div>
                                        Communication Skill
                                    </div>
                                    <div>
                                        Thoroughness In Teaching
                                    </div>
                                    <div>
                                        Acceptance of Responsibility
                                    </div>
                                    <div>
                                        Resourcefulness
                                    </div>
                                    <div>
                                        Responsiveness
                                    </div>
                                    <div>
                                        Punctuality
                                    </div>
                                    <div>
                                        Reliability
                                    </div>
                                    <div>
                                        Excess Teaching Load
                                    </div>
                                    
                                   
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" wire:model.lazy="abilityscore" name="abilityscore" class="form-control" placeholder="Ability Score" pattern="[0-9]+" maxlength="2">
                                        <div>
                                            @error('abilityscore')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Length of Service in this Polytechnic (Max. Score: 20)</strong>
                                    <div>
                                        Length of Service
                                    </div>                                  
                                   
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" wire:model.lazy="servicelengthscore" name="servicelengthscore" class="form-control" placeholder="Length of Service Score" pattern="[0-9]+" maxlength="2">
                                        <div>
                                            @error('servicelengthscore')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                
            </div>
            <p>
              
                <button type="submit"  class="btn btn-primary btn-sm">Submit</button>
            </p>
        </form>
    </p>
    {{-- @endif --}}
</div>
