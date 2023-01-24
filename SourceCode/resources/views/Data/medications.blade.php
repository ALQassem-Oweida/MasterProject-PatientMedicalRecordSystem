@extends('user.userdash')
@section('user_content')  





<div class="table-responsive">
<table class="table table-striped">
           
    <tr>
        <th>Medication Name</th>
        <th>Dosage</th>
        <th>Frequency</th>
        <th>Allergy</th>
      </tr>
    <tbody>
        @foreach ($m_infos as $row)
            <tr>
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
