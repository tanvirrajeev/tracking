{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
{{-- Status progress modal --}}
<link href="{{ asset('css/progress-wizard.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/vertical-bar.css') }}" rel="stylesheet">


<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tracking">
    Track Your Package
  </button> --}}

  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}



  <!-- Modal Asset Details-->
  <div class="modal fade" id="tracking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="exampleModalLabel">TRACKING</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="tracking-body">
            <div id="timeline-speaker-example">
                <h4>PACKAGE TRACKING</h4><br>
                <ul class="progress-indicator stacked dark" id="tracking-ul">
                    {{-- <li id="dlvrd">
                        <span class="time" id="created-at-dlvrd"></span>
                        <span class="bubble"></span>
                        <span class="stacked-text">
                            Delivered &nbsp; &nbsp; <span style="color: rgb(78, 184, 78);"><i class="fas fa-check-circle"></i></span>
                            <span class="subdued" id="reveived_by"></span>
                        </span>
                    </li>
                    <li class="completed warning">
                        <span class="time" id="created-at-rcvdsthub"></span>
                        <span class="bubble"></span>
                        <span class="stacked-text">
                            Destination HUB
                            <span class="subdued" id="sts-rcvdsthub"></span>
                        </span>
                    </li>
                    <li class="completed warning">
                        <span class="time" id="created-at-rcvhub"></span>
                        <span class="bubble"></span>
                        <span class="stacked-text">
                            Receiving HUB
                            <span class="subdued" id="sts-rcvhub"></span>
                            <span class="subdued" id="awb"></span>
                        </span>
                    </li> --}}


                    {{-- <span style="font-size: 3em; color: Orange;">
                        <i class="fas fa-truck-moving"></i> &nbsp;
                        <span style="font-size: 0.4em; font-family: 'Lato'; color: White;" class="stacked-text">
                            Order Created
                            <span class="subdued" id="cpxid"></span>
                            <span class="subdued" id="created-by"></span>
                            <span class="subdued" id="created-at"></span>
                        </span>
                      </span> --}}
                </ul>
            </div>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>






  <link rel="stylesheet" href="/css/tracking.css">
  <div class="container-fluid">
      <div class="row no-gutter">
          <!-- The image half -->
          <div class="col-md-6 d-none d-md-flex bg-image"></div>


          <!-- The content half -->
          <div class="col-md-6 bg-light">
              <div class="login d-flex align-items-center py-5">

                  <!-- Demo content-->
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-10 col-xl-7 mx-auto">
                              <h3 class="display-5">TRACK YOUR PACKAGE</h3>
                              {{-- <p class="text-muted mb-4">Create a login split page using Bootstrap 4.</p> --}}
                              <form method="POST" action="{{ route('tracking') }}">
                                  @csrf
                                  <div class="form-group mb-3">
                                      <input id="awb" name="awb" type="awb" placeholder="Enter your AWB..." required="" autofocus="" class="form-control bg-light rounded-pill border-1 shadow-sm px-4 @error('awb') is-invalid @enderror">
                                      @error('awb')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  </div>
                                  <button type="submit" class="btn bg-warning btn-block text-uppercase mb-2 rounded-pill shadow-sm" data-toggle="modal" data-target="#tracking">TRACK YOUR PACKAGE</button>
                                  {{-- <div class="text-center d-flex justify-content-between mt-4"><p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted">
                                          <u>Boostrapious</u></a></p></div> --}}
                              </form>
                          </div>
                      </div>
                  </div><!-- End -->

              </div>
          </div><!-- End -->

      </div>
  </div>





















  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
