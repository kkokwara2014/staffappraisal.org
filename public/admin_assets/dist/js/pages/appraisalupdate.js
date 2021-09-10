$('.editappraisal').click(function() {
    let route = $(this).data('route');
    let position = $(this).data('position');
    // alert(route);
    $.ajax({
        url: route,
        type: 'GET',
        success: function(res) {
            console.log(res.data);
            fillFormByPosition(res.data, position);
        }
    });
});

let autoFillQualilficationFormData = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 20%"><select name="qualname[]" class="form-control form-control-sm qualname"required>';
        html += '<option value="">Select Qualification</option>';
        if (data[i].qualname == 'PhD') {
            html += '<option value="PhD" selected>Ph.D</option>';
        } else {
            html += '<option value="PhD">Ph.D</option>';
        }
        if (data[i].qualname == 'MSc') {
            html += '<option value="MSc" selected>MSc</option>';
        } else {
            html += '<option value="MSc">MSc</option>';
        }
        if (data[i].qualname == 'MEd') {
            html += '<option value="MEd" selected>MEd</option>';
        } else {
            html += '<option value="MEd">MEd</option>';
        }

        if (data[i].qualname == 'MBA') {
            html += '<option value="MBA" selected>MBA</option>';
        } else {
            html += '<option value="MBA">MBA</option>';
        }
        if (data[i].qualname == 'MA') {
            html += '<option value="MA" selected>MA</option>';
        } else {
            html += '<option value="MA">MA</option>';
        }
        if (data[i].qualname == 'PGD') {
            html += '<option value="PGD" selected>PGD</option>';
        } else {
            html += '<option value="PGD">PGD</option>';
        }
        if (data[i].qualname == 'PGDE') {
            html += '<option value="PGDE" selected>PGDE</option>';
        } else {
            html += '<option value="PGDE">PGDE</option>';
        }
        if (data[i].qualname == 'BA') {
            html += '<option value="BA" selected>BA</option>';
        } else {
            html += '<option value="BA">BA</option>';
        }
        if (data[i].qualname == 'BSc') {
            html += '<option value="BSc" selected>BSc</option>';
        } else {
            html += '<option value="BSc" >BSc</option>';
        }
        if (data[i].qualname == 'HND') {
            html += '<option value="HND" selected>HND</option>';
        } else {
            html += '<option value="HND">HND</option>';
        }
        if (data[i].qualname == 'BEd') {
            html += '<option value="BEd" selected>BEd</option>';
        } else {
            html += '<option value="BEd">BEd</option>';
        }
        if (data[i].qualname == 'ND') {
            html += '<option value="ND" selected>ND</option>';
        } else {
            html += '<option value="ND">ND</option>';
        }
        if (data[i].qualname == 'NCE') {
            html += '<option value="NCE" selected>NCE</option>';
        } else {
            html += '<option value="NCE">NCE</option>';
        }
        if (data[i].qualname == 'O-level') {
            html += '<option value="O-level" selected>O-level</option>';
        } else {
            html += '<option value="O-level">O-level</option>';
        }
        if (data[i].qualname == 'FSLC') {
            html += '<option value="FSLC" selected>FSLC</option>';
        } else {
            html += '<option value="FSLC">FSLC</option>';
        }
        html += '</select>';
        html += '</td><td style="width: 60%">';
        html += '<input type="text" class="form-control form-control-sm" name="awardinginst[]" value="' + data[i].awardinginst + '" required placeholder="Awarding Institution e.g. AIFPU"></td>';
        html += '<td style="width: 20%"><input type="date" value="' + data[i].dateofgrad + '" class="form-control form-control-sm" name="dateofgrad[]" required placeholder="Grad. Year"> <input type="hidden" value="' + data[i].id + '" class="" name="qualid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
    }

    let key = i++;
    html += '<tr><td style="width: 20%"><select name="qualname[]" class="form-control form-control-sm qualname">';
    html += '<option value="">Select Qualification</option>';
    html += '<option value="PhD" >Ph.D</option>';
    html += '<option value="MSc" >MSc</option>';
    html += '<option value="MEd" >MEd</option>';
    html += '<option value="MBA" >MBA</option>';
    html += '<option value="MA" >MA</option>';
    html += '<option value="PGD" >PGD</option>';
    html += '<option value="PGDE" >PGDE</option>';
    html += '<option value="BA" >BA</option>';
    html += '<option value="BSc" >BSc</option>';
    html += '<option value="HND" >HND</option>';
    html += '<option value="BEd" >BEd</option>';
    html += '<option value="ND" >ND</option>';
    html += '<option value="NCE" >NCE</option>';
    html += '<option value="O-level" >O-level</option>';
    html += '<option value="FSLC" >FSLC</option>';
    html += '</select>';
    html += '</td><td style="width: 60%">';
    html += '<input type="text" class="form-control form-control-sm" name="awardinginst[]" placeholder="Awarding Institution e.g. AIFPU"></td>';
    html += '<td style="width: 20%"><input type="date" class="form-control form-control-sm" name="dateofgrad[]" placeholder="Grad. Year"></td>';
    html += '<td><button wire:click.prevent="remove(' + key + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('.moreQualification').empty();
    $('.moreQualification').prepend(html);
    console.log(html);
}

let autfillProfMembFormData = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 40%"><input type="text" value="' + data[i].profbody + '" class="form-control form-control-sm" name="profbody[]" placeholder="Professional Body"></td>';
        html += '<td style="width: 25%"><input type="text" value="' + data[i].membcategory + '" class="form-control form-control-sm" name="membcategory[]" placeholder="Memb. Category"></td>';
        html += '<td style="width: 15%"><input type="text" value="' + data[i].membnumb + '" class="form-control form-control-sm" name="membnumb[]" placeholder="Memb. Num."></td>';
        html += '<td style="width: 20%"><input type="date" value="' + data[i].awardyear + '" class="form-control form-control-sm" name="awardyear[]"><input type="hidden" value="' + data[i].id + '" name="profbodyid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
    }
    let key = i++;
    html += '<tr><td style="width: 40%"><input type="text" class="form-control form-control-sm" name="profbody[]" placeholder="Professional Body"></td>';
    html += '<td style="width: 25%"><input type="text" class="form-control form-control-sm" name="membcategory[]" placeholder="Memb. Category"></td>';
    html += '<td style="width: 15%"><input type="text" class="form-control form-control-sm" name="membnumb[]" placeholder="Memb. Num."></td>';
    html += '<td style="width: 20%"><input type="date" class="form-control form-control-sm" name="awardyear[]"></td>';
    html += '<td><button wire:click.prevent="remove(' + key + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('#editProfbody').empty();
    $('#editProfbody').prepend(html);
}

let autfillPromotionFormData = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 50%"><input type="date" value="' + data[i].promodate + '" class="form-control form-control-sm" name="promodate[]" placeholder="Promotion Date"></td>';
        html += '<td style="width: 50%"><input type="text" value="' + data[i].grade + '" class="form-control form-control-sm" name="grade[]" placeholder="Grade"><input type="hidden" value="' + data[i].id + '" name="promoid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    }
    let key = i++;
    html += '<tr><td style="width: 50%"><input type="date" class="form-control form-control-sm" name="promodate[]" placeholder="Promotion Date"></td>';
    html += '<td style="width: 50%"><input type="text" class="form-control form-control-sm" name="grade[]" placeholder="Grade"></td>';
    html += '<td><button wire:click.prevent="remove(' + key + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('#editPromotiontable').empty();
    $('#editPromotiontable').prepend(html);
}

let autofillSalaryScale = function(data) {
    let html = '';
    let i = 0;
    html += '<tr><td style="width: 50%"><input type="text" value="' + data[0].presentpost + '" class="form-control form-control-sm" name="presentpost" required placeholder="Present Scale"></td>';
    html += '<td style="width: 50%"><input type="text" value="' + data[0].salaryscale + '" class="form-control form-control-sm" name="salaryscale" required placeholder="Salary Scale"><input type="hidden" value="' + data[0].id + '" name="salaryid"></td></tr>';

    $('#editSalarScale').empty();
    $('#editSalarScale').prepend(html);
}

let autofillTrainings = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 25%"><select name="trainingtype[]" value="' + data[i].trainingtype + '" class="form-control form-control-sm">';
        html += '<option value="">Select Training Type</option>';
        if (data[i].trainingtype == 'Course') {
            html += '<option value="Course" selected>Course</option>';
        } else {
            html += '<option value="Course">Course</option>';
        }
        if (data[i].trainingtype == 'Workshop') {
            html += '<option value="Workshop" selected>Workshop</option>';
        } else {
            html += '<option value="Workshop">Workshop</option>';
        }
        html += '</select></td>';
        html += '<td style="width: 50%"><input type="text" value="' + data[i].caption + '" class="form-control form-control-sm" name="caption[]" placeholder="Caption"></td>';
        html += '<td style="width: 25%"><input type="date" value="' + data[i].trainingdate + '" class="form-control form-control-sm" name="trainingdate[]"><input type="hidden" value="' + data[i].id + '" name="trainingid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
    }
    html += '<tr><td style="width: 25%"><select name="trainingtype[]" class="form-control form-control-sm">';
    html += '<option value="">Select Training Type</option>';
    html += '<option value="Course">Course</option>';
    html += '<option value="Workshop">Workshop</option>';
    html += '</select></td>';
    html += '<td style="width: 50%"><input type="text" class="form-control form-control-sm" name="caption[]" placeholder="Caption"></td>';
    html += '<td style="width: 25%"><input type="date" class="form-control form-control-sm" name="trainingdate[]"></td>';
    html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('#editTrainingtable').empty();
    $('#editTrainingtable').prepend(html);
}

let autofillAdditQuali = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 75%"><input type="text" value="' + data[i].qualificationtype + '" class="form-control form-control-sm" name="qualificationtype[]" placeholder="Qualification Name"></td>';
        html += '<td style="width: 25%"><input type="date" value="' + data[i].dateobtained + '" class="form-control form-control-sm" name="dateobtained[]"><input type="hidden" value="' + data[i].id + '" name="qtypeid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
    }
    let key = i++;
    html += '<tr><td style="width: 75%"><input type="text" class="form-control form-control-sm" name="qualificationtype[]" placeholder="Qualification Name"></td>';
    html += '<td style="width: 25%"><input type="date" class="form-control form-control-sm" name="dateobtained[]"></td>';
    html += '<td><button wire:click.prevent="remove(' + key + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('#editAdditionalQualif').empty();
    $('#editAdditionalQualif').prepend(html);

}

let autofillDuties = function(data) {
    let html = '<input type="hidden" value="' + data[0].id + '" name="dutyid">';
    $('#dutyContainer').prepend(html);

    let duty = $('#performedduty');
    duty.text(data[0].performedduty);
}


let autofillPublications = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 25%"><select name="pubtype[]" class="form-control form-control-sm"><option value="">Select Publication Type</option>';
        if (data[i].pubtype == 'Book') {
            html += '<option value="Book" selected>Book</option>';
        } else {
            html += '<option value="Book">Book</option>';
        }
        if (data[i].pubtype == 'Journal') {
            html += '<option value="Journal" selected>Journal</option>';
        } else {
            html += '<option value="Journal">Journal</option>';
        }
        if (data[i].pubtype == 'Conference') {
            html += '<option value="Conference" selected>Conference</option>';
        } else {
            html += '<option value="Conference">Conference</option>';
        }
        if (data[i].pubtype == 'Seminar') {
            html += '<option value="Seminar" selected>Seminar</option>';
        } else {
            html += '<option value="Seminar">Seminar</option>';
        }
        if (data[i].pubtype == 'Creative Writing') {
            html += '<option value="Creative Writing" selected>Creative Writing</option>';
        } else {
            html += '<option value="Creative Writing">Creative Writing</option>';
        }
        html += '</select></td>';

        html += '<td style="width: 60%"><input type="text" value="' + data[i].title + '" class="form-control form-control-sm" name="title[]" placeholder="Title of Publication"></td>';
        html += '<td style="width: 15%"><input type="date" value="' + data[i].yearofpub + '" class="form-control form-control-sm" name="yearofpub[]"><input type="hidden" value="' + data[i].id + '" name="pubid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    }

    html += '<tr><td style="width: 25%"><select name="pubtype[]" class="form-control form-control-sm"><option value="">Select Publication Type</option>';
    html += '<option value="Book">Book</option>';
    html += '<option value="Journal">Journal</option>';
    html += '<option value="Conference">Conference</option>';
    html += '<option value="Seminar">Seminar</option>';
    html += '<option value="Creative Writing">Creative Writing</option>';
    html += '</select></td>';
    html += '<td style="width: 60%"><input type="text" class="form-control form-control-sm" name="title[]" placeholder="Title of Publication"></td>';
    html += '<td style="width: 15%"><input type="date" class="form-control form-control-sm" name="yearofpub[]"></td>';
    html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('#editPublicationtable').empty();
    $('#editPublicationtable').prepend(html);

}


let autofillAchievenents = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 25%"><select name="prodtype[]" class="form-control form-control-sm"><option value="">Select Production Type</option>';
        if (data[i].prodtype == 'Consultancy') {
            html += '<option value="Consultancy" selected>Consultancy</option>';
        } else {
            html += '<option value="Consultancy">Consultancy</option>';
        }
        if (data[i].prodtype == 'Copyright') {
            html += '<option value="Copyright" selected>Copyright</option>';
        } else {
            html += '<option value="Copyright">Copyright</option>';
        }
        if (data[i].prodtype == 'Design') {
            html += '<option value="Design" selected>Design</option>';
        } else {
            html += '<option value="Design">Design</option>';
        }
        if (data[i].prodtype == 'Feasibility Study') {
            html += '<option value="Feasibility Study" selected>Feasibility Study</option>';
        } else {
            html += '<option value="Feasibility Study">Feasibility Study</option>';
        }
        if (data[i].prodtype == 'Invention') {
            html += '<option value="Invention" selected>Invention</option>';
        } else {
            html += '<option value="Invention">Invention</option>';
        }
        if (data[i].prodtype == 'Member of Professional Body') {
            html += '<option selected value="Member of Professional Body">Member of Professional Body</option>';
        } else {
            html += '<option value="Member of Professional Body">Member of Professional Body</option>';
        }
        if (data[i].prodtype == 'Patent') {
            html += '<option value="Patent" selected>Patent</option>';
        } else {
            html += '<option value="Patent">Patent</option>';
        }
        if (data[i].prodtype == 'Trademark') {
            html += '<option value="Trademark" selected>Trademark</option>';
        } else {
            html += '<option value="Trademark">Trademark</option>';
        }
        html += '</select></td>';

        html += '<td style="width: 60%"><input type="text" value="' + data[i].title + '" class="form-control form-control-sm" name="prodtitle[]" placeholder="Title of Production"></td>';
        html += '<td style="width: 15%"><input type="date" value="' + data[i].yearofprod + '" class="form-control form-control-sm" name="yearofprod[]"><input type="hidden" value="' + data[i].id + '" name="achievid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
    }

    html += '<tr><td style="width: 25%"><select name="prodtype[]" class="form-control form-control-sm"><option value="">Select Production Type</option>';
    html += '<option value="Consultancy">Consultancy</option>';
    html += '<option value="Copyright">Copyright</option>';
    html += '<option value="Design">Design</option>';
    html += '<option value="Feasibility Study">Feasibility Study</option>';
    html += '<option value="Invention">Invention</option>';
    html += '<option value="Member of Professional Body">Member of Professional Body</option>';
    html += '<option value="Patent">Patent</option>';
    html += '<option value="Trademark">Trademark</option>';
    html += '</select></td>';

    let key = i++;
    html += '<td style="width: 60%"><input type="text" class="form-control form-control-sm" name="prodtitle[]" placeholder="Title of Production"></td>';
    html += '<td style="width: 15%"><input type="date" class="form-control form-control-sm" name="yearofprod[]"></td>';
    html += '<td><button wire:click.prevent="remove(' + key + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('#editAchievement').empty();
    $('#editAchievement').prepend(html);
}


let autofillAdminResp = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 60%"><select name="admintype[]" class="form-control form-control-sm"><option value="">Select Category</option>';
        if (data[i].admintype == 'Chairman of Polytechnic Committee') {
            html += '<option value="Chairman of Polytechnic Committee">Chairman of Polytechnic Committee</option>';
        } else {
            html += '<option value="Chairman of Polytechnic Committee">Chairman of Polytechnic Committee</option>';
        }
        if (data[i].admintype == 'Deanship') {
            html += '<option selected value="Chairman of School Committee">Chairman of School Committee</option>';
        } else {
            html += '<option value="Chairman of School Committee">Chairman of School Committee</option>';
        }
        if (data[i].admintype == 'Deanship') {
            html += '<option selected value="Deanship">Deanship</option>';
        } else {
            html += '<option value="Deanship">Deanship</option>';
        }
        if (data[i].admintype == 'Headship') {
            html += '<option selected value="Headship">Headship</option>';
        } else {
            html += '<option value="Headship">Headship</option>';
        }
        if (data[i].admintype == 'Member of Polytechnic Committee') {
            html += '<option selected value="Member of Polytechnic Committee">Member of Polytechnic Committee</option>';
        } else {
            html += '<option value="Member of Polytechnic Committee">Member of Polytechnic Committee</option>';
        }
        if (data[i].admintype == 'Member of School Committee') {
            html += '<option selected value="Member of School Committee">Member of School Committee</option>';
        } else {
            html += '<option value="Member of School Committee">Member of School Committee</option>';
        }
        if (data[i].admintype == 'Public Service to Federal Govt') {
            html += '<option selected value="Public Service to Federal Govt">Public Service to Federal Govt</option>';
        } else {
            html += '<option value="Public Service to Federal Govt">Public Service to Federal Govt</option>';
        }
        if (data[i].admintype == 'Public Service to State Govt') {
            html += '<option selected value="Public Service to State Govt">Public Service to State Govt</option>';
        } else {
            html += '<option value="Public Service to State Govt">Public Service to State Govt</option>';
        }
        if (data[i].admintype == 'Public Service to Local Govt') {
            html += '<option selected value="Public Service to Local Govt">Public Service to Local Govt</option>';
        } else {
            html += '<option value="Public Service to Local Govt">Public Service to Local Govt</option>';
        }
        html += '</select></td>';
        html += '<td style="width: 20%"><input type="date" value="' + data[i].startingyear + '" class="form-control form-control-sm" name="startingyear[]"></td>';
        html += '<td style="width: 20%"><input type="date" value="' + data[i].endingyear + '" class="form-control form-control-sm" name="endingyear[]"><input type="hidden" value="' + data[i].id + '" name="responsibid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"> <span class="fa fa-times"></span></button></td></tr>';
    }

    html += '<tr><td style="width: 60%"><select name="admintype[]" class="form-control form-control-sm"><option value="">Select Category</option>';
    html += '<option value="Chairman of Polytechnic Committee">Chairman of Polytechnic Committee</option>';
    html += '<option value="Chairman of School Committee">Chairman of School Committee</option>';
    html += '<option value="Deanship">Deanship</option>';
    html += '<option value="Headship">Headship</option>';
    html += '<option value="Member of Polytechnic Committee">Member of Polytechnic Committee</option>';
    html += '<option value="Member of School Committee">Member of School Committee</option>';
    html += '<option value="Public Service to Federal Govt">Public Service to Federal Govt</option>';
    html += '<option value="Public Service to State Govt">Public Service to State Govt</option>';
    html += '<option value="Public Service to Local Govt">Public Service to Local Govt</option>';
    html += '</select></td>';
    let key = i++;
    html += '<td style="width: 20%"><input type="date" class="form-control form-control-sm" name="startingyear[]"></td>';
    html += '<td style="width: 20%"><input type="date" class="form-control form-control-sm" name="endingyear[]"></td>';
    html += '<td><button wire:click.prevent="remove(' + key + ')" class="btn btn-danger btn-sm"> <span class="fa fa-times"></span></button></td></tr>';

    $('#editAdminResp').empty();
    $('#editAdminResp').prepend(html);
}

let autofillCourseTuaght = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 15%"><input type="text" value="' + data[i].coursecode + '" class="form-control form-control-sm" name="taughtcoursecode[]" required placeholder="Course Code"></td>';
        html += '<td style="width: 40%"><input type="text" value="' + data[i].coursetitle + '" class="form-control form-control-sm" name="taughtcoursetitle[]" required placeholder="Course Title"></td>';
        html += '<td style="width: 15%"><input type="text" value="' + data[i].credithour + '" class="form-control form-control-sm" name="taughtcredithour[]" required placeholder="Credit Hour" pattern="[0-9]+"></td>';
        html += '<td style="width: 20%"><select name="taughtsemester[]" class="form-control form-control-sm qualname" required><option value="">Select Semester</option>';
        if (data[i].semester == 'First Semester') {
            html += '<option selected value="First Semester">First Semester</option>';
        } else {
            html += '<option value="First Semester">First Semester</option>';
        }
        if (data[i].semester == 'Second Semester') {
            html += '<option selected value="Second Semester">Second Semester</option>';
        } else {
            html += '<option value="Second Semester">Second Semester</option>';
        }
        if (data[i].semester == 'Semester 3') {
            html += '<option selected value="Semester 3">Semester 3</option>';
        } else {
            html += '<option value="Semester 3">Semester 3</option>';
        }
        html += '</select></td>';

        html += '<td style="width: 10%"><input type="date" value="' + data[i].courseyear + '" class="form-control form-control-sm" name="taughtyear[]" required><input type="hidden" value="' + data[i].id + '" name="taughtid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
    }

    html += '<tr><td style="width: 15%"><input type="text" class="form-control form-control-sm" name="taughtcoursecode[]" placeholder="Course Code"></td>';
    html += '<td style="width: 40%"><input type="text" class="form-control form-control-sm" name="taughtcoursetitle[]" placeholder="Course Title"></td>';
    html += '<td style="width: 15%"><input type="text" class="form-control form-control-sm" name="taughtcredithour[]" placeholder="Credit Hour" pattern="[0-9]+"></td>';
    html += '<td style="width: 20%"><select name="taughtsemester[]" class="form-control form-control-sm qualname"><option value="">Select Semester</option>';
    html += '<option value="First Semester">First Semester</option>';
    html += '<option value="Second Semester">Second Semester</option>';
    html += '<option value="Semester 3">Semester 3</option>';
    html += '</select></td>';
    let key = i++;
    html += '<td style="width: 10%"><input type="date" class="form-control form-control-sm" name="taughtyear[]"></td>';
    html += '<td><button wire:click.prevent="remove(' + key + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('#editCourseTaught').empty();
    $('#editCourseTaught').prepend(html);
}


let autofillTeachingLoad = function(data) {
    let html = '';
    let i = 0;
    for (i = 0; i < data.length; i++) {
        html += '<tr><td style="width: 20%"><select name="teachingloadsemester[]" class="form-control form-control-sm qualname" required><option value="">Select Semester</option>';
        if (data[i].semester == 'First Semester') {
            html += '<option selected value="First Semester">First Semester</option>';
        } else {
            html += '<option value="First Semester">First Semester</option>';
        }
        if (data[i].semester == 'Second Semester') {
            html += '<option selected value="Second Semester">Second Semester</option>';
        } else {
            html += '<option value="Second Semester">Second Semester</option>';
        }
        if (data[i].semester == 'Semester 3') {
            html += '<option selected value="Semester 3">Semester 3</option>';
        } else {
            html += '<option value="Semester 3">Semester 3</option>';
        }
        html += '</select></td>';
        html += '<td style="width: 20%"><input type="date" value="' + data[i].courseyear + '" class="form-control form-control-sm" name="teachingloadyear[]" required></td>';
        html += '<td style="width: 20%"><input type="text" value="' + data[i].credithour + '" class="form-control form-control-sm" name="teachingloadcredithour[]" required placeholder="Credit Hour" pattern="[0-9]+" maxlength="3"></td>';
        html += '<td style="width: 20%"><input type="text" value="' + data[i].normalload + '" class="form-control form-control-sm" name="teachingnormalload[]" required placeholder="Normal Load" pattern="[0-9]+" maxlength="3"></td>';
        html += '<td style="width: 20%"><input type="text" value="' + data[i].excessload + '" class="form-control form-control-sm" name="teachingexcessload[]" required placeholder="Normal Load" pattern="[0-9]+" maxlength="3"><input type="hidden" value="' + data[i].id + '" name="teachid[]"></td>';
        html += '<td><button wire:click.prevent="remove(' + i + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
    }
    let key = i++;
    html += '<tr><td style="width: 20%"><select name="teachingloadsemester[]" class="form-control form-control-sm qualname" required><option value="">Select Semester</option>';
    html += '<option value="First Semester">First Semester</option>';
    html += '<option value="Second Semester">Second Semester</option>';
    html += '<option value="Semester 3">Semester 3</option>';
    html += '</select></td>';
    html += '<td style="width: 20%"><input type="date" class="form-control form-control-sm" name="teachingloadyear[]" required></td>';
    html += '<td style="width: 20%"><input type="text" class="form-control form-control-sm" name="teachingloadcredithour[]" required placeholder="Credit Hour" pattern="[0-9]+" maxlength="3"></td>';
    html += '<td style="width: 20%"><input type="text" class="form-control form-control-sm" name="teachingnormalload[]" required placeholder="Normal Load" pattern="[0-9]+" maxlength="3"></td>';
    html += '<td style="width: 20%"><input type="text" class="form-control form-control-sm" name="teachingexcessload[]" required placeholder="Excess Load" pattern="[0-9]+" maxlength="3"></td>';
    html += '<td><button wire:click.prevent="remove(' + key + ')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

    $('#editTeachingLoad').empty();
    $('#editTeachingLoad').prepend(html);

}


let autofillOtherInfo = function(data) {
    let otherInfo = $('#anyotherinfo');
    let html = '<input type="hidden" value="' + data[0].id + '" name="otherinfoid">';
    otherInfo.text(data[0].anyotherinfo);
    $('#otherinfo').prepend(html);
}

//for junior staff
let autofillAdhocPerfDuty = function(data) {
    let html = '<input type="hidden" value="' + data[0].id + '" name="adhocdutyid">';
    $('#dutyContainer').prepend(html);

    let adhocduty = $('#adhocperfduty');
    adhocduty.text(data[0].adhocperfduty);
}


let fillFormByPosition = function(data, position) {
    if (position === 1) autoFillQualilficationFormData(data, position);
    if (position === 2) autfillProfMembFormData(data, position);
    if (position === 3) autfillPromotionFormData(data, position);
    if (position === 4) autofillSalaryScale(data, position);
    if (position === 5) autofillTrainings(data, position);
    if (position === 6) autofillAdditQuali(data, position);
    if (position === 7) autofillDuties(data, position);
    if (position === 8) autofillPublications(data, position);
    if (position === 9) autofillAchievenents(data, position);
    if (position === 10) autofillAdminResp(data, position);
    if (position === 11) autofillCourseTuaght(data, position);
    if (position === 12) autofillTeachingLoad(data, position);
    if (position === 13) autofillOtherInfo(data, position);

    if (position === 14) autofillInstitution(data, position);
    if (position === 15) autofillJuniorQualification(data, position);
    if (position === 16) autofillPostQualiExperience(data, position);
    if (position === 17) autofillAdhocPerfDuty(data, position);
}