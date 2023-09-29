@extends('../../dashboard.template.client-dashboard-template')

@section('title') Drivers Account @endsection

@section('links')
  <style>
    :root {
    --theme: rgb(96, 150, 186);
    --dark-text: rgb(39, 76, 119);
    }

    .container > :first-child {
      color: var(--dark-text);
      text-decoration: underline;
    }

    .table-container {
      border: 2px solid var(--dark-text);
    }

    tr > th, tr > td {
      text-align: center;
      border: 2px solid var(--dark-text);
      padding: 10px;
      color: var(--dark-text);
    }

    .actions {
      display: flex;
      gap: 10px;
      padding: 20px;
      border: none;
    }
  </style>
@endsection

@section('content')
<div class="container p-5">
  <h1 class="text-uppercase">Driver's Account</h1>

  <table class="table-container mt-5">
    <thead>
      <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Birthplace</th>
        <th>Nationality</th>
        <th>Contact No.</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kyneth Esconde</td>
        <td>Male</td>
        <td>25</td>
        <td>Cainta, Rizal</td>
        <td>Filipino</td>
        <td>09321244123</td>
        <td>kynethescone@gmail.com</td>
        <td class="actions">
          <button class="btn btn-success">Approve</button>
          <button class="btn btn-danger">Reject</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection