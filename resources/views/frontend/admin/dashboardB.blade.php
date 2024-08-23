
@extends('layouts.dashB')

@section('content')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
    <div class="col-md-10 grid-margin">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Bordered table</h4>
              <p class="card-description">
                Add class <code>.table-bordered</code>
              </p>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Property ID</th>
                      <th>Renter Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Total Price</th>
                      <th>Status</th>
                      <th>Last Updated</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                      <td>{{ $booking->id }}</td>
                      <td>{{ $booking->property->id }}</td>
                      <td>{{ $booking->renter->name }}</td>
                      <td>{{ $booking->start_date }}</td>
                      <td>{{ $booking->end_date }}</td>
                      <td>{{ $booking->total_price }}</td>
                      <td>
                        <form action="{{ route('updateBookingStatus', $booking->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <select name="status" onchange="this.form.submit()" class="form-control">
                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="accepted" {{ $booking->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                          </select>
                        </form>
                      </td>
                      <td>{{ $booking->updated_at }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
    </div>
@endsection


