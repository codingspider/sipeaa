<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Message Id</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Attachment</th>
                        <th scope="col">Message Body</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <th scope="row">{{ $data->id }}</th>
                      <th scope="row">{{ $data->subject }}</th>
                      <th scope="row">{{ $data->attachment }}</th>
                      <th scope="row">{{ $data->body }}</th>
                    
                      </tr>
                  
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>