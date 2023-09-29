@extends('../../dashboard.template.client-dashboard-template')

@section('title') Customer's Info @endsection

@section('links')
  <style>
    :root {
    --theme: rgb(96, 150, 186);
    --dark-text: rgb(39, 76, 119);
    }

    .container {
      width: 100vw;
    }

    .container > :first-child {
      color: var(--dark-text);
      text-decoration: underline;
    }

    .table-container {
      padding: 20px;
    }

    tr > th, tr > td {
      padding: 10px;
      text-align: center;
      border: 2px solid var(--theme);
    }

    .actions {
      width: 7rem;
    }

    .view-customer-btn {
      font-size: 1rem;
    }
  </style>
@endsection

@section('content')
<div class="container p-5">
  <h1 class="text-uppercase">Customer's Information</h1>

  <table class="table-container mt-5">
    <thead>
      <tr>
        <th>Name</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Destination Exact Address</th>
        <th>Complete Address/Pickup Location</th>
        <th>Landmark</th>
        <th>Date Of Trip</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kyneth Esconde</td>
        <td>09321923021</td>
        <td>test@gmail.com</td>
        <td>Cainta, Rizal</td>
        <td>Brgy. Sta. Lucia Samal Bataan</td>
        <td>Near at Ernies ice cream</td>
        <td>April 12 2023</td>
        <td class="actions">
          <a class="view-customer-btn" href="{{ route('customer.info') }}">View More</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection