@extends('../../dashboard.template.client-dashboard-template')

@section('title') Message Driver @endsection

@section('links')
<style>
  .messageCustomer-container {
    height: 100vh;
    width: 100vw;
}

.messageCustomer-container > .message-card {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 70vw;
    height: 80vh;
    border: 1px solid black;
    border-radius: 15px;
}

.messageCustomer-container > .message-card > .customer-details > .bxs-user {
    font-size: 2.5rem;
}

.messageCustomer-container > .message-card > .customer-details > .customer-name {
    font-size: 1.5rem;
    color: var(--theme);
}

.messageCustomer-container > .message-card > input[type='text'] {
    border-radius: 30px;
    border: 1px solid black;
    padding: 10px;
    margin: 10px;
}

.messageCustomer-container > .message-card > .send-message {
    font-size: 1.2rem;
    position: absolute;
    bottom: 18px;
    right: 45px;
    background-color: var(--theme);
    color: white;
    border: none;
    padding: 5px;
    border-radius: 90%;
}
</style>
@endsection

@section('content')

<div class="messageCustomer-container row justify-content-center p-5">
  <form class="message-card" action="" method="POST">
    <div class="customer-details d-flex align-items-center p-2 gap-2">
      <i class='bx bxs-user'></i>
      <div class="customer-name">KYNETH ESCONDE</div>
    </div>
    <input type="text" name="message" id="message" placeholder="INPUT MESSAGE" autocomplete="off">
    <button class="send-message bx bx-up-arrow-alt"></button>
  </form>
</div>

@endsection