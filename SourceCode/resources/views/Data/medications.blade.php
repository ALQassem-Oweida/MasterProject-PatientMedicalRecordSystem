@extends('user.userdash')
@section('user_content')
    <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Medications</strong></h1>

    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-12 d-flex p-3">
            <div class="card flex-fill p-2">
                <div class="card-header">

                </div>

                <div class="table-responsive">
                    <table class="table table-hover my-0">

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

                    {{ $m_infos->links() }}
                </span>
            </div>
        </div>




    </div>
@endsection
