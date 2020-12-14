  <!-- Modal -->
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
                    <div class="col-5">
                        <div class="form-group">
                            <label for="edit-awb">AWB</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" name="edit-awb" id="edit-awb" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label for="edit-checkpoint_id">CHECK POINT</label><label class="text-danger">*</label>
                            <select class="form-control form-control" name="edit-checkpoint_id" id="edit-checkpoint_id"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="edit-created_at">STATUS DATE & TIME</label>
                      <i class="fa fa-calendar-alt"></i>
                      <div class="input-group date" id="p">
                        <input type="text" class="form-control datetimepicker" name="edit-created_at" id="edit-created_at" autocomplete="off" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="edit-manifest">MANIFEST NO</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" name="edit-manifest" id="edit-manifest" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="edit-areaCodes">AREA CODE</label><label class="text-danger">*</label>
                            <select class="form-control form-control" name="edit-areaCodes" id="edit-areaCodes"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <button type="button" class="btn bg-purple" id="edit-submit_button">SUBMIT</button>
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

    getstatus();
    updatestatus();

    // Populate dropdown menu for status with selected option
    function getstatus(){
        var sltstatusid = '';
        var sltareaid = '';

        $.ajax({
            type: 'get',
            url: "{{ url('/statuslist') }}",
            data: {id:id},
            success:function(data){
                // console.log(data.statuses);
                // console.log(data.areacodes);

                // Setting up selected option for Checkpoints && Areacode dropdown
                var sltstatus = data.statuses;
                $.each(sltstatus , function(index, val) {
                sltstatusid = val.checkpoint_id;
                var option ="<option value=\""+val.checkpoint_id+"\" selected readonly>"+ val.checkpoints +"</option>";
                st.find('#edit-checkpoint_id').append(option);

                sltareaid = val.areaid;
                var option ="<option value=\""+val.areaid+"\" selected readonly>"+ val.areacode +"</option>";
                st.find('#edit-areaCodes').append(option);
                });

                // Polulate all options for all checkpoints dropdown
                var status = data.checkpoints;
                $.each(status , function(index, val) {
                    if (sltstatusid != val.id){ //Populate the dropdown if the optioin is not equal to selected status ID
                        var option ="<option value=\""+val.id+"\">"+ val.name +"</option>";
                        st.find('#edit-checkpoint_id').append(option);
                    }
                });

                //Populate awb, date & manifest field
                $.each(data.statuses , function(index, val) {
                    st.find('#edit-awb').val(val.awb);
                    st.find('#edit-created_at').val(val.date);
                    st.find('#edit-manifest').val(val.manifest);
                });


                // Setting up all options for areacode dropdown
                $.each(data.areacodes , function(index, val) {
                if (sltareaid != val.id){
                    var option ="<option value=\""+val.id+"\">"+ val.name +"</option>";
                    st.find('#edit-areaCodes').append(option);
                    }
                });
            }
        })
    }


    function updatestatus(){
        $(document).on("click", "#edit-submit_button" , function() {

            var awb = st.find('#edit-awb').val();
            var date = st.find('#edit-created_at').val();
            var manifest = st.find('#edit-manifest').val();
            var checkpoint = st.find('#edit-checkpoint_id').val();
            var areacode = st.find('#edit-areaCodes').val();

            console.log(awb);
            console.log(date);
            console.log(manifest);
            console.log(checkpoint);
            console.log(areacode);

             //SweetAlert2 Toast for AWB Update confirmation
             const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000
                        });

            $.ajax({
                type: 'post',
                url: "{{ url('/chgstatusmodal') }}",
                data: {_token: CSRF_TOKEN,id: id, awb: awb, date: date, manifest: manifest, checkpoint: checkpoint, areacode: areacode},
                success:function(data){

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'AWB UPDATED!'
                    });
                    location.reload();
                    }
                })
        });
    }









});

</script>
