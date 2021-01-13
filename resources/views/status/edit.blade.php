  <!-- Edit Modal -->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-orange">
          <h5 class="modal-title" id="exampleModalLabel">AWB UPDATE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="updateform" id="edit-form">
                <meta name="csrf-token" updateform="{{ csrf_token() }}" />
                <div class="row">
                    <div class="col-6 d-none d-lg-block">
                        <img class="logoicon" src="{{ asset('img/apps/Packaging.jpg') }}" style="width: 99%; height: 97%;"  alt="App Logo"/>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="edit-awb">AWB</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" name="edit-awb" id="edit-awb" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-checkpoint_id">CHECK POINT</label><label class="text-danger">*</label>
                            <select class="form-control form-control" name="edit-checkpoint_id" id="edit-checkpoint_id"></select>
                        </div>
                        <div class="form-group"> {{-- Hidden Receive_by DOM  --}}
                            <input type="text" class="form-control" id="rcvby" name="rcvby" placeholder="Receiver's Name"> {{-- style="display:none" --}}
                        </div>
                        <div class="form-group"> {{-- Hidden third party company DOM  --}}
                            <select class="form-control form-control" name="third_party_company" id="third_party_company" ></select> {{-- style="display:none" --}}
                        </div>
                        <div class="form-group"> {{-- Hidden third party company Name  --}}
                            <select class="form-control form-control" name="third_party_company_name" id="third_party_company_name" style="display:none"></select> {{-- style="display:none" --}}
                        </div>
                        <div class="form-group"> {{-- Hidden third party AWB DOM  --}}
                            <input type="text" class="form-control" id="third_party_awb" name="third_party_awb" placeholder="Third Party AWB"> {{-- style="display:none" --}}
                        </div>
                        <div class="form-group"> {{-- Hidden selected chekcpoints option->name DOM. For latter use on showDom() to use checkpoints name insted of ID like '78'.   --}}
                            <input type="text" class="form-control" id="edit-checkpoint_name" name="edit-checkpoint_name" style="display:none"> {{--  --}}
                        </div>
                        {{-- <div class="form-group"> Hidden third party Web DOM  --}}
                            {{-- <input type="text" class="form-control" id="third_party_web" name="third_party_web" placeholder="Third Party Web Link"> style="display:none"  --}}
                        {{-- </div> --}}
                        <label for="edit-created_at">STATUS DATE & TIME</label>
                        <i class="fa fa-calendar-alt"></i>
                        <div class="input-group date" id="p">
                          <input type="text" class="form-control datetimepicker" name="edit-created_at" id="edit-created_at" autocomplete="off" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                        <div class="form-group">
                            <label for="edit-manifest">MANIFEST NO</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" name="edit-manifest" id="edit-manifest" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-areaCodes">AREA CODE</label><label class="text-danger">*</label>
                            <select class="form-control form-control" name="edit-areaCodes" id="edit-areaCodes"></select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn bg-maroon" id="edit-submit_button">SUBMIT</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


<script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('updateform');
$('#edit').on('show.bs.modal', function (event) {
    var id = $(event.relatedTarget).data('id');
    var st = $('#edit-form');

    // console.log(id);
    // st.find('#edit-awb').empty();
    st.find('#edit-checkpoint_id').empty();
    // st.find('#edit-created_at').empty();
    // st.find('#edit-manifest').empty();
    st.find('#edit-areaCodes').empty();
    st.find('#rcvby').empty();
    st.find('#rcvby').hide();
    st.find('#third_party_company').empty(); //third_party_company
    st.find('#third_party_company').hide(); //third_party_company
    st.find('#third_party_awb').empty(); //third_party_awb
    st.find('#third_party_awb').hide(); //third_party_awb

    getStatus();
    updateStatus();
    showDom(); //Show Receive_by DOM, When select status "Delivered"


    // Populate dropdown menu for status with selected option
    function getStatus(){
        var sltstatusid = '';
        var sltareaid = '';
        var sltstatus = '';
        var option = '';
        // st.find('#third_party_company').empty();

        $.ajax({
            type: 'get',
            url: "{{ url('/statuslist') }}",
            data: {id:id},
            success:function(data){
                // console.log(data.statuses);
                // console.log(data.checkpoints);
                // console.log(data.statuses);
                // console.log(data.areacodes);
                // console.log(data.isThirdPartyExists);
                // console.log(data);

                // Setting up selected option for Checkpoints && Areacode dropdown
                //First populate the selected option then next populate the rest of the options (in latter code loop bellow)
                sltstatus = data.statuses;
                $.each(sltstatus , function(index, val) {
                sltstatusid = val.checkpoint_id;
                option ="<option value=\""+val.checkpoint_id+"\" selected readonly>"+ val.checkpoints +"</option>";
                st.find('#edit-checkpoint_id').append(option);

                // var sltchkpointName = val.checkpoints;
                // console.log(sltchkpointName);
                // st.find('#edit-checkpoint_name').append(option);

                sltareaid = val.areaid;
                option ="<option value=\""+val.areaid+"\" selected readonly>"+ val.areacode +"</option>";
                st.find('#edit-areaCodes').append(option);
                });

                // Polulate all options for all checkpoints dropdown
                //Populate rest of the options for the checkpoints
                var status = data.checkpoints;
                $.each(status , function(index, val) {
                    if (sltstatusid != val.id){ //Populate the dropdown if the optioin is not equal to selected status ID
                        option ="<option value=\""+val.id+"\">"+ val.name +"</option>";
                        st.find('#edit-checkpoint_id').append(option);
                    }
                });

                //Populate awb, date & manifest, rcvby, 3rdParty_web field
                $.each(data.statuses , function(index, val) {
                    st.find('#edit-awb').val(val.awb);
                    st.find('#edit-created_at').val(val.date);
                    st.find('#edit-manifest').val(val.manifest);
                    st.find('#rcvby').val(val.received_by);
                    //var chk_comp = val.third_party_company; //st.find('#third_party_company').
                    st.find('#third_party_awb').val(val.third_party_awb);
                    // st.find('#third_party_web').val(val.third_party_web);
                });

                //Populate Company DOM (for both hidden or not)
                //First check if 3rdParty already exists for the Awb. If not then its a new record so dispaly all the
                //3rdParty company available from 3rdParty master table.
                //If there are a value from DB then this awb is already connected to a 3rdParty. Display the 3rdParty ID/Name
                //from DB
                if(data.isThirdPartyExists == "NULL"){
                    // console.log("NULL");
                    $.each(data.thirdParties , function(index, val) {
                        var option ="<option value=\""+val.id+"\">"+ val.company +"</option>";
                        st.find('#third_party_company').append(option);

                        // var ab = st.find('#third_party_company');
                        // var cd = ab.find('option:selected').text()
                        // st.find('#third_party_company_name').append(cd);
                        // console.log(cd);

                        // if(sltstatusid == '78'){
                        // var option ="<option value=\""+val.id+"\">"+ val.company +"</option>";
                        // st.find('#third_party_company').append(option);
                        // }else{
                        //     var option ="<option value=\"\">"+ val.company +"</option>";
                        //     st.find('#third_party_company').append(option);
                        // }

                    });
                }else{
                    // console.log("NOT NULL");

                    // console.log(data.isThirdPartyExists);
                    // console.log(data.thirdParties);

                    $.each(data.isThirdPartyExists , function(index, val) {
                        // var option ="<option value=\""+val.id+"\">"+ val.third_party_company +"</option>";
                        var option ="<option value=\""+val.third_party_id+"\">"+ val.third_party_company +"</option>";
                        st.find('#third_party_company').append(option);
                    });
                }

                // Setting up all options for areacode dropdown
                //Populate rest of the Area code
                $.each(data.areacodes , function(index, val) {
                if (sltareaid != val.id){
                    var option ="<option value=\""+val.id+"\">"+ val.name +"</option>";
                    st.find('#edit-areaCodes').append(option);
                    }
                });
            }
        })
    }

    //Update Status
    function updateStatus(){
        $(document).one("click", "#edit-submit_button" , function(e) {
            e.preventDefault();
            // e.stopImmediatePropagation();
            var awb = st.find('#edit-awb').val();
            var date = st.find('#edit-created_at').val();
            var manifest = st.find('#edit-manifest').val();
            var checkpoint = st.find('#edit-checkpoint_id').val();
            var areacode = st.find('#edit-areaCodes').val();
            var rcvby = st.find('#rcvby').val();
            var third_party_company = st.find('#third_party_company').val();
            // var third_party_company_name = st.find('#third_party_company option:selected').text()
            // var third_party_company_name = st.find('#third_party_company_name').val();
            var third_party_awb = st.find('#third_party_awb').val();
            // var third_party_web = st.find('#third_party_web').val();
            // console.log(third_party_company_name);


             //SweetAlert2 Toast for AWB Update confirmation
             const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000
                        });

            //If the user only select option '78-Shipment connected to' then only this fild will update.
            //otherwise not.
            // $sltchkpointName = '';
            // $sltchkpointName = $(this).find('option:selected').text(); //Get the selected option->Name
            // console.log("ckp name: " + checkpoint);
            // if($sltchkpointName != "Shipment connected to"){ //Not sending third_party_company: third_party_company, if the status == "78-Shipment conected to"
            if(checkpoint != 78){ //Not sending third_party_company: third_party_company, if the status == "78-Shipment conected to"
                $.ajax({
                type: 'post',
                url: "{{ url('/chgstatusmodal') }}",
                data: {_token: CSRF_TOKEN,id: id, awb: awb, date: date, manifest: manifest, checkpoint: checkpoint, areacode: areacode, rcvby: rcvby, third_party_awb: third_party_awb},
                success:function(data){

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'AWB UPDATED!'
                    });
                    location.reload();
                    }
                })
            }else{
                $.ajax({
                type: 'post',
                url: "{{ url('/chgstatusmodal') }}",
                data: {_token: CSRF_TOKEN,id: id, awb: awb, date: date, manifest: manifest, checkpoint: checkpoint, areacode: areacode, rcvby: rcvby, third_party_company: third_party_company, third_party_awb: third_party_awb},
                success:function(data){

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'AWB UPDATED!'
                    });
                    location.reload();
                    }
                })
            }


        });
    }

    //Show Receive_by DOM
    function showDom(){
        //Check for Check Point dropdown change
        st.find('#edit-checkpoint_id').change(function() {

            $sltchkpoint = '';
            $sltchkpoint = st.find('#edit-checkpoint_id').val();

            $sltchkpointName = '';
            $sltchkpointName = $(this).find('option:selected').text(); //Get the selected option->Name for the if clause
            // console.log("Check Point Name: " + $sltchkpointName);


            // if($sltchkpoint == 35){ //if the status is "Delivered"
            if($sltchkpointName == "Delivered"){ //if the status is "Delivered"
                // console.log("Check Point IDxx: " + $sltchkpoint);

                //Show Receive_by DOM
                st.find('#rcvby').show();
                st.find('#rcvby').prop('required',true);

                //Hide rest of the others
                st.find('#third_party_company').hide();
                st.find('#third_party_company').prop('required',false);
                st.find('#third_party_awb').hide();
                st.find('#third_party_awb').prop('required',false);
                // st.find('#third_party_web').hide();
                // st.find('#third_party_web').prop('required',false);
            // }else if($sltchkpoint == 79){       //if the status is "Shipment connected to"
            }else if($sltchkpointName == "Shipment connected to"){       //if the status is "Shipment connected to"
                // console.log("Check Point IDxx: " + $sltchkpoint);
                //Hide Receive_by DOM
                st.find('#rcvby').hide();
                st.find('#rcvby').prop('required',false);

                //Show company, web, awb for third party connect
                st.find('#third_party_company').show();
                st.find('#third_party_company').prop('required',true);
                st.find('#third_party_awb').show();
                st.find('#third_party_awb').prop('required',true);
                // st.find('#third_party_web').show();
                // st.find('#third_party_web').prop('required',true);

            }else{
                st.find('#rcvby').hide();
                st.find('#rcvby').prop('required',false);


                st.find('#third_party_company').hide();
                st.find('#third_party_company').prop('required',false);
                st.find('#third_party_awb').hide();
                st.find('#third_party_awb').prop('required',false);
                // st.find('#third_party_web').hide();
                // st.find('#third_party_web').prop('required',false);

                // var option ="<option value=\"\">""</option>";
                // st.find('#third_party_company').append(option);
            }

        });

    }

});

</script>
