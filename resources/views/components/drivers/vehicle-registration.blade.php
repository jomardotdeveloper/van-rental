@section('vehicle-registration')
     {{-- view modal --}}
     <div class='modal fade' id='vehicleModal' tabindex='-1' aria-labelledby='exampleModalLabel'
     aria-hidden='true'>
     <div class='modal-dialog modal-xl'>
         <div class='modal-content'>
             <div class='modal-header'>
                 <h5 class='modal-title' id='exampleModalLabel'>Vehicle Status | <span id="stats"></span> 
                 | <span id="msg"></span></h5>
                 <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                 </button>
             </div>
             <div class='modal-body'>
                 <form method="POST" enctype="multipart/form-data" class="row g-3" id="edit-form">
                     @csrf
                     <div class="col-md-12 row" id="view-vehicle-status">
                         
                    </div>
                    <div class="col-md-4 d-flex">
                        <div class="mb-3"> 
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            <button type='button' class='btn btn-primary' id='update'>Update</button>
                        </div>
                    </div>
                    
                 </form>
             </div>
             
         </div>
     </div>
 </div>
@endsection