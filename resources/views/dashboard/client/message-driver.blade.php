@extends('../../dashboard.template.client-dashboard-template')

@section('title') Message Driver @endsection

@section('links')
<style>
  .messageDriver-container {
    height: 100vh;
    width: 100vw;
}

.messageDriver-container > .message-card {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 70vw;
    height: 80vh;
    border: 1px solid black;
    border-radius: 15px;
}

.messageDriver-container > .message-card > .driver-details > .bxs-user {
    font-size: 2.5rem;
}

.messageDriver-container > .message-card > .driver-details > .driver-name {
    font-size: 1.5rem;
    color: var(--theme);
}

.messageDriver-container > .message-card > input[type='text'] {
    border-radius: 30px;
    border: 1px solid black;
    padding: 10px;
    margin: 10px;
}

.messageDriver-container > .message-card > .send-message {
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

.status {
  top: 40px;
  left: 55px;
}

.offline {
  color: whitesmoke;
  font-weight: 600;
  background-color: gray;
  border-radius: 5px;
  padding: 5px;
}

.online {
  color: whitesmoke;
  font-weight: 600;
  background-color: green;
  border-radius: 5px;
  padding: 5px;
}

.offline::after {
  content: "• Offline";
}

.online::after {
  content: "• Online";
}

.message-container {
  display: flex;
  flex-direction: column;
  flex-grow: 3;
  flex-shrink: 0;
  gap: 10px;
}

.message-container > .driver-message-container {
  align-items: center;
  background-color: gray;
  padding: 10px;
  color: whitesmoke;
  border-radius: 5px 5px 5px 20px;
}

.message-container > .driver-message-container > p, .message-container > .user-message-container > p {
  margin: 0;
}

.message-container > .user-message-container {
  align-items: center;
  background-color: skyblue;
  text-align: right;
  padding: 10px;
  color: whitesmoke;
  border-radius: 5px 20px 5px 5px;
}
</style>
@endsection

@section('content')

<div class="messageDriver-container row justify-content-center p-5">
  <form class="message-card" action="" method="POST">
    <div class="driver-details d-flex align-items-center p-2 gap-2 position-relative">
      <i class='bx bxs-user'></i>
      <div class="driver-name">JOHN DOE DEE NALIGO</div>
      <div class="status">
        <div class="user-status online"></div>
      </div>
    </div>
    <div class="message-container">
      <div class="driver-message-container">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates fugit, reprehenderit magni veniam unde accusamus nisi magnam possimus eveniet, quas consequuntur sequi itaque illum doloremque esse eum amet voluptas at.</p>
      </div>
      <div class="user-message-container">
        <p>Meow</p>
      </div>
      <div class="user-message-container">
        <p>Meow</p>
      </div>
      <div class="user-message-container">
        <p>Meow</p>
      </div>
      <div class="driver-message-container">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates fugit, reprehenderit magni veniam unde accusamus nisi magnam possimus eveniet, quas consequuntur sequi itaque illum doloremque esse eum amet voluptas at.</p>
      </div>
    </div>
    <input type="text" name="message" id="message" placeholder="INPUT MESSAGE" autocomplete="off">
    <button class="send-message bx bx-up-arrow-alt"></button>
  </form>
</div>

@endsection