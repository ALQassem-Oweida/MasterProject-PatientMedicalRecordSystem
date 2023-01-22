@extends('doctor.master_doctor')
@section('doctor_content') 

<table class="table table-bordered border-primary">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>

        {{Auth::user()->id}}

        @foreach ($appointments as $appointment)
        <tr>
            <th scope="row">1</th>
            <td>{{$appointment->national_id}}</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
        @endforeach
       
       
      
      </tbody>
  </table>


@endsection