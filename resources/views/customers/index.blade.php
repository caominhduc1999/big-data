<table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($customers as $customer)
	    <tr>
	        <td>{{ $customer->name }}</td>
	        <td>{{ $customer->detail }}</td>
	    </tr>
	    @endforeach
    </table>