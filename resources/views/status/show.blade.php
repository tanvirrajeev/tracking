  <!-- Modal -->
  <div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-orange">
          <h5 class="modal-title" id="exampleModalLabel">AWB VIEW</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="updateform" id="show-form">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="show-awb">AWB</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" name="show-awb" id="show-awb" autocomplete="off" required disabled>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label for="show-checkpoint_id">CHECK POINT</label><label class="text-danger">*</label>
                            <select class="form-control form-control" name="show-checkpoint_id" id="show-checkpoint_id" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="show-created_at">STATUS DATE & TIME</label>
                      <i class="fa fa-calendar-alt"></i>
                      <div class="input-group date" id="p">
                        <input type="text" class="form-control datetimepicker" name="show-created_at" id="show-created_at" autocomplete="off" required disabled><span class="input-group-addon" disabled><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="show-manifest">MANIFEST NO</label><label class="text-danger">*</label>
                            <input type="text" class="form-control" name="show-manifest" id="show-manifest" autocomplete="off" required disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="show-areaCodes">AREA CODE</label><label class="text-danger">*</label>
                            <select class="form-control form-control" name="show-areaCodes" id="show-areaCodes" disabled></select>
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
$('#show').on('show.bs.modal', function (event) {
    var id = $(event.relatedTarget).data('id');
    var st = $('#show-form');

    // console.log(id);
    // st.find('#show-awb').empty();
    st.find('#show-checkpoint_id').empty();
    // st.find('#show-created_at').empty();
    // st.find('#show-manifest').empty();
    st.find('#show-areaCodes').empty();

    getstatus();
    // updatestatus();

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
                st.find('#show-checkpoint_id').append(option);

                sltareaid = val.areaid;
                var option ="<option value=\""+val.areaid+"\" selected readonly>"+ val.areacode +"</option>";
                st.find('#show-areaCodes').append(option);
                });

                // Polulate all options for all checkpoints dropdown
                var status = data.checkpoints;
                $.each(status , function(index, val) {
                    if (sltstatusid != val.id){ //Populate the dropdown if the optioin is not equal to selected status ID
                        var option ="<option value=\""+val.id+"\">"+ val.name +"</option>";
                        st.find('#show-checkpoint_id').append(option);
                    }
                });

                //Populate awb, date & manifest field
                $.each(data.statuses , function(index, val) {
                    st.find('#show-awb').val(val.awb);
                    st.find('#show-created_at').val(val.date);
                    st.find('#show-manifest').val(val.manifest);
                });


                // Setting up all options for areacode dropdown
                $.each(data.areacodes , function(index, val) {
                if (sltareaid != val.id){
                    var option ="<option value=\""+val.id+"\">"+ val.name +"</option>";
                    st.find('#show-areaCodes').append(option);
                    }
                });
            }
        })
    }
});

</script>
