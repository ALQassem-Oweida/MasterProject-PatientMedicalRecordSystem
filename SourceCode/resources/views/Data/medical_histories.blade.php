@extends('user.userdash')
@section('user_content')  





<div class="table-responsive">
<table class="table table-striped">
           
    <tr>
        <th>Event Type</th>
        <th>Event Date</th>
        <th>Event Description</th>
        <th>Medication Name</th>
        <th>Dosage</th>
        <th>Frequency</th>
        <th>Allergy</th>
      </tr>
    <tbody>
        @foreach ($m_infos as $row)
            <tr>
                <td>{{ $row->event_type }}</td>
                <td>{{ $row->event_date }}</td>
                <td>{{ $row->event_description }}</td>
                <td>{{ $row->medication_name }}</td>
                <td>{{ $row->dosage }}</td>
                <td>{{ $row->frequency }}</td>
                <td>{{ $row->allergy }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>
<span>

    {{$m_infos->links()}}
</span>



   
@endsection
